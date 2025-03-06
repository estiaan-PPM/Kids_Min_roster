<x-layout>
    <x-slot:heading>
        {{ $kid['name']}}
    </x-slot:heading>

    <p>Allergies: {{ $kid['allergies']}}</p>
    <p>Age: {{ $kid['age']}}</p>
    <p>Parent: {{ $guard['name_1']}}</p>
    <p>Contact: {{ $guard['cellphone_number_1']}}</p>
    <p>Parent: {{ $guard['name_2']}}</p>
    <p>Contact: {{ $guard['cellphone_number_2']}}</p>
</x-layout>
