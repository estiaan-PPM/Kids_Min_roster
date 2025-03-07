<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kid;
use App\Models\Guardians;



Route::get('/', function () {
    return view('home');
});

Route::get('/create', function() {
    return view('Kids.create');
});

Route::post('/create', function() {

    $processedData = validateAndProcessGuardian(request());

    Kid::create([
        'name' => request('child-name'),
        'guardians_id' => $processedData['guardianId'],
        'birth_date' => request('d-o-b'),
        'allergies' => request('allergies'),
        'age_group' => $processedData['class'],
        'age' => $processedData['age'],

    ]);

    return redirect('/');
});

Route::get('/class/{group}', function ($group) {
    $kids = Kid::where('age_group', $group)->orderBy('name')->get();

    return view('Kids.index', [
        'kids' => $kids           
    ]);
});

Route::get('/kid/{name}', function($name){
    $kid = Kid::where('name', $name) -> first();
    return view('Kids.show', ['kid' => $kid]);
});

Route::get('/kid/{name}/edit', function($name){
    $kid = Kid::where('name', $name) -> first();
    return view('Kids.edit', ['kid' => $kid]);
});

//Update
Route::patch('/kid/{name}',function($name){
    dd(request()->path());
    //validate
    $processedData = validateAndProcessGuardian(request());

    //authorize
    
    //update the kid
    $kid = Kid::where('name', $name) -> first();
    if($kid){    
        $kid->update([
            'name' => request('child-name'),
            'guardians_id' => $processedData['guardianId'],
            'birth_date' => request('d-o-b'),
            'allergies' => request('allergies'),
            'age_group' => $processedData['class'],
            'age' => $processedData['age'],
        ]);
    } 

    //persist
    //redirect to the kid page
    return redirect('/kid/' . $kid->name);
});



//Destroy
Route::delete('/kid/{name}', function($name){

    $kid = Kid::where('name', $name)->first();
    $kid->delete();

    return redirect('/');


});

function validateAndProcessGuardian($request)
{
    // Validation rules
    $rules = [
        "child-name" => ['required', 'min:2'],
        "allergies" => ["required"],
        "d-o-b" => ['required', 'date_format:Y-m-d'],
        "cell-1" => ['required', 'regex:/^\d{3}-\d{3}-\d{4}$/'],
        "g-name-1" => ['nullable', 'min:2'],
        "email-1" => ['nullable', 'email'],
    ];

    // Check if a Guardian exists with the same cellphone number
    $guardian = Guardians::where('cellphone_number_1', $request->input('cell-1'))
        ->orWhere('cellphone_number_2', $request->input('cell-1'))
        ->first();

    // If a Guardian does not exist, make g-name-1 and email-1 required
    if (!$guardian) {
        $rules['g-name-1'] = ['required', 'min:2'];
        $rules['email-1'] = ['required', 'email'];
    }

    // Validate the request using the dynamic rules
    $validatedData = $request->validate($rules);

    // Process guardian data
    if (!$guardian) {
        $guardian = Guardians::create([
            'name_1' => $request->input('g-name-1'),
            'name_2' => $request->input('g-name-2'),
            'cellphone_number_1' => $request->input('cell-1'),
            'cellphone_number_2' => $request->input('cell-2'),
        ]);
    }

    // Get the guardian ID
    $guardianId = $guardian->id;

    // Process date of birth and determine class
    $dob = $request->input('d-o-b');
    $current_date = date('Y-m-d');
    $current_year = date('Y');

    // Convert the date of birth into a DateTime object
    $dobDateTime = new DateTime($dob);
    
    // Calculate the age
    $age = $dobDateTime->diff(new DateTime($current_date))->y;

    // Calculate the class age based on the current year
    $class_age = (new DateTime("$current_year-01-01"))->diff($dobDateTime)->y;

    // Determine the class based on the class age
    if ($class_age < 7) {
        $class = '3-6';
    } elseif ($class_age < 11) {
        $class = '7-10';
    } else {
        $class = '11-13';
    }

    // Return all the processed data
    return [
        'validatedData' => $validatedData,
        'guardian' => $guardian,
        'guardianId' => $guardianId,
        'age' => $age,
        'class' => $class
    ];
}