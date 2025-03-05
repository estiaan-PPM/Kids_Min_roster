<x-layout>
    <x-slot:heading>
        3-6s class
    </x-slot:heading>

    <ul>
        @foreach ($kids as $kid)
            {{-- <li>{{ $kid['name'] }}: Age {{ $kid['age'] }} {{ $kid['allergies'] == 'none' ? '' : Allergies {{ $kid['allergies'] }} }} </li> --}}
            <li>
                <a href="/3-6/{{ $kid['name']}}">
                    <strong>{{ $kid['name'] }}:</strong> Age {{ $kid['age'] }}, Allergies {{ $kid['allergies'] }} 
            </li>
        @endforeach
    </ul>

    <h1>Welcome to the 3-6s</h1> 
</x-layout>