<x-layout>
    <x-slot:heading>
        {{ $kid['name']}}
    </x-slot:heading>

    <p>Allergies: {{ $kid['allergies']}}</p>
    <p>Age: {{ $kid['age']}}</p>
</x-layout>
