<x-layout>
    <x-slot:heading>
        {{ $kid['name']}}
    </x-slot:heading>
    <a href="/kid/{{ $kid->name }}/edit" class="block py-4 px-6 border-gray-200 rounded-lg">
        <ul>
            <li><em>Allergies:</em> <strong>{{ $kid['allergies'] }}</strong></li>
            <li><em>Age:</em> <strong>{{ $kid['age'] }}</strong></li>
            <li><em>Date of Birth:</em> <strong>{{ date('j M Y', strtotime($kid['birth_date'])) }}</strong></li>
            <li><em>Parent:</em> <strong>{{ $kid->guardian->name_1 }}</strong></li>
            <li><em>Contact:</em> <strong>{{ $kid->guardian->cellphone_number_1 }}</strong></li>
            <li><em>Parent:</em> <strong>{{ $kid->guardian->name_2 }}</strong></li>
            <li><em>Contact:</em> <strong>{{ $kid->guardian->cellphone_number_2 }}</strong></li>

        </ul>
    </a>
</x-layout>
