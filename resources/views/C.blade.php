<x-layout>
    <x-slot:heading>
        11-13s class
    </x-slot:heading>

    <div>
        @foreach ($kids as $kid)
            {{-- <li>{{ $kid['name'] }}: Age {{ $kid['age'] }} {{ $kid['allergies'] == 'none' ? '' : Allergies {{ $kid['allergies'] }} }} </li> --}}
                <a href="/11-13/{{ $kid['name']}}" class="block py-4 px-6 border-gray-200 rounded-lg">
                    <div>
                        <strong>{{ $kid['name'] }}:</strong> Age {{ $kid['age'] }}, Allergies {{ $kid['allergies'] }} 
                    </div>
                </a>
        @endforeach
        </div>

    <h1>Welcome to the 11-13s</h1> 
</x-layout>