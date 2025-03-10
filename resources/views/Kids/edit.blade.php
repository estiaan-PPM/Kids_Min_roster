<x-layout>
    <x-slot:heading>
        Edit Child: {{$kid->name}}
    </x-slot:heading>

    <p>Please modify any information where necessary.</p>
    <form method="POST" action="/kid/{{$kid->id}}">
        @csrf
        @method('PATCH')
        
        <div class="space-y-12">      
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="mt-10 text-base/9 font-semibold text-gray-900">Child Information</h2>
      
            <div class="mt-0 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Name of Child</label>
                <div class="mt-2">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="text" name="child-name" id="child-name" autocomplete="given-name" value ="{{$kid->name}}" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-700 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>

                @error('child-name')
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="sm:col-span-3">
                <label for="surname" class="block text-sm/6 font-medium text-gray-900">Surname</label>
                <div class="mt-2">
                  {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                  <input type="text" name="child-surname" id="child-surname" autocomplete="last-name" value ="{{ $kid->surname }}" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-700 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>

                @error('child-surname')
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="sm:col-span-4">
                <label for="d-o-b" class="block text-sm/6 font-medium text-gray-900">Date of Birth</label>
                <div class="mt-2">
                  <input id="d-o-b" name="d-o-b" type="date" autocomplete="01/01/2020" value ="{{ $kid->birth_date }}" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>

                @error('d-o-b')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
              </div>

              <fieldset>
                <legend class="text-sm font-semibold text-gray-900">Gender</legend>
                <div class="mt-2 flex gap-x-6">
                    <!-- Male Radio Button -->
                    <div class="flex items-center gap-x-2">
                        <input id="male" name="gender" type="radio" value="Male"
                            class="size-4 appearance-none rounded-full border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 focus:outline-indigo-600"
                            {{ old('gender', $kid->gender) == 'Male' ? 'checked' : '' }}>
                        <label for="male" class="text-sm font-medium text-gray-900">Male</label>
                    </div>
            
                    <!-- Female Radio Button -->
                    <div class="flex items-center gap-x-2">
                        <input id="female" name="gender" type="radio" value="Female"
                            class="size-4 appearance-none rounded-full border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 focus:outline-indigo-600"
                            {{ old('gender', $kid->gender) == 'Female' ? 'checked' : '' }}>
                        <label for="female" class="text-sm font-medium text-gray-900">Female</label>
                    </div>
                </div>
            </fieldset>
             

              <div class="sm:col-span-3">
                <label for="home-language" class="block text-sm/6 font-medium text-gray-900">Home Language</label>
                <div class="mt-2">
                  <input type="text" name="home-language" id="home-language" autocomplete="" value ="{{ $kid->home_language }}" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>

                @error('home-language')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
              </div>
      
              <div class="sm:col-span-3">
                <label for="allergies" class="block text-sm/6 font-medium text-gray-900">Allergies</label>
                <div class="mt-2">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="text" name="allergies" id="allergies" autocomplete="" value ="{{$kid->allergies}}" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>

                @error('allergies')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
              </div>
      
              <div class="col-span-full">
                <label for="other" class="block text-sm/6 font-medium text-gray-900">Other special instructions:</label>
                  <div class="mt-2">
                    <textarea name="other" id="other" rows="3" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ $kid->other }}</textarea>
                  </div>
              </div>             
            </div>


            <h2 class="mt-10 text-base/9 font-semibold text-gray-900">Guardian Information</h2>
      
            <div class="mt-0 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="name-1" class="block text-sm/6 font-medium text-gray-900">Name</label>
                  <div class="mt-2">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" name="g-name-1" id="g-name-1" value ="{{$kid->guardian->name_1}}" autocomplete="given-name" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-700 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                  </div>

                  @error('g-name-1')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                  @enderror
                </div>
        
                <div class="sm:col-span-3">
                  <label for="name-2" class="block text-sm/6 font-medium text-gray-900">Name</label>
                  <div class="mt-2">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" name="g-name-2" id="g-name-2" value ="{{$kid->guardian->name_2}}" autocomplete="given-name" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                  </div>
                </div>
        
                <div class="sm:col-span-3">
                    <label for="email-1" class="block text-sm font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input id="email-1" name="email-1" type="email" value ="{{ $kid->guardian->email_1 }}" autocomplete="email" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>

                    @error('email-1')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                  </div>
                  
                  <div class="sm:col-span-3">
                    <label for="email-2" class="block text-sm font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input id="email-2" name="email-2" type="email" value="{{ $kid->guardian->email_2 }}" autocomplete="email" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                  </div>

                  <div class="sm:col-span-3">
                    <label for="cell-1" class="block text-sm font-medium text-gray-900">Cellphone Number</label>
                    <div class="mt-2">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="cell-1" name="cell-1" type="tel" value ="{{$kid->guardian->cellphone_number_1}}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" 
                        placeholder="123-456-7890" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" required>
                    </div>

                    @error('cell-1')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                  </div>
                  
                  <div class="sm:col-span-3">
                    <label for="cell-2" class="block text-sm font-medium text-gray-900">Cellphone Number</label>
                    <div class="mt-2">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="cell-2" name="cell-2" type="tel" value ="{{$kid->guardian->cellphone_number_2}}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" 
                        placeholder="123-456-7890" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                  </div>
                  
                                
              </div>
          </div>
          {{-- <div class="mt-10">
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500 italic">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
          </div> --}}
          
        </div>
      
        <div class="mt-6 flex items-center justify-between gap-x-6">
          <div class="flex items-center">
            <button 
              form="delete-form"
              type="delete" 
              class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                Delete
            </button>
          </div>
          <div class="flex items-center gap-x-6">  
            <a href="/kid/{{$kid->id}}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <div>
              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
          </div>
        </div>
      </form>

      <form method="POST" action="/kid/{{$kid->id}}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
      </form>
      
</x-layout>