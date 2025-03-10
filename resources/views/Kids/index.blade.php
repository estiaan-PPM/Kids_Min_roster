<x-layout>
    <x-slot:heading>
        {{$kids->first()->age_group}} Class
    </x-slot:heading>

    <div>
        @foreach ($kids as $kid)
            {{-- <li>{{ $kid['name'] }}: Age {{ $kid['age'] }} {{ $kid['allergies'] == 'none' ? '' : Allergies {{ $kid['allergies'] }} }} </li> --}}
                <a href="/kid/{{ $kid->id }}" class="block py-4 px-6 border-gray-200 rounded-lg">
                    <div>
                        <strong>{{ $kid->name }}:</strong>
                        <ul style="margin-left: 10px; list-style: none; padding: 0; display: flex; gap: 10px; flex-wrap: wrap;">
                            <li>Allergies: {{ $kid->allergies }}</li>
                            <li>Age: {{ $kid->age }}</li>
                            <li>Guardian: {{ $kid->guardian->name_1 }}</li>
                            <li>Contact: {{ $kid->guardian->cellphone_number_1 }}</li>
                        </ul>
                    </div>
                </a>
        @endforeach
        </div>

</x-layout>