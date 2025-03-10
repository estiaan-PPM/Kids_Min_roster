<x-layout>
    <x-slot:heading>
        {{ $kid['name']}} {{ $kid['surname'] }}
    </x-slot:heading>
    <a href="/kid/{{ $kid->id }}/edit" class="block py-4 px-6 border-gray-200 rounded-lg">
        <ul>
            <li><em>Allergies:</em> <strong>{{ $kid['allergies'] }}</strong></li>
            <li><em>Age:</em> <strong>{{ $kid['age'] }}</strong></li>
            <li><em>Class:</em> <strong>{{ $kid['age_group'] }}</strong></li>
            <li><em>Date of Birth:</em> <strong>{{ date('j M Y', strtotime($kid['birth_date'])) }}</strong></li>
            <li><em>Gender:</em> <strong>{{ $kid['gender'] }}</strong></li>
            <li><em>Home Language:</em> <strong>{{ $kid['home_language'] }}</strong></li>
            <li><em>Guardian:</em> <strong>{{ $kid->guardian->name_1 }}</strong></li>
            <li><em>Contact:</em> <strong>{{ $kid->guardian->cellphone_number_1 }}</strong></li>
            <li><em>email:</em> <strong>{{ $kid->guardian->email_1 }}</strong></li>
            @if($kid->guardian->name_2)
                <li><em>Guardian:</em> <strong>{{ $kid->guardian->name_2 }}</strong></li>
            @endif
        
            @if($kid->guardian->cellphone_number_2)
                <li><em>Contact:</em> <strong>{{ $kid->guardian->cellphone_number_2 }}</strong></li>
            @endif
        
            @if($kid->guardian->email_2)
                <li><em>Email:</em> <strong>{{ $kid->guardian->email_2 }}</strong></li>
            @endif
        
            @if($kid['other'])
                <li><em>What you might want to know:</em> <strong>{{ $kid['other'] }}</strong></li>
            @endif

        </ul>
    </a>
</x-layout>
