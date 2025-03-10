<x-layout>
    <x-slot:heading>
        {{$kids->first()->age_group}} Class
    </x-slot:heading>
    <p>Attendance today: {{ $kids->count() }} </p>

    <div>
        @foreach ($kids as $kid)
        <div class="flex justify-between items-center p-4 border border-transparent rounded-lg hover:border-gray-300 hover:bg-gray-100 transition duration-200">
            {{-- <li>{{ $kid['name'] }}: Age {{ $kid['age'] }} {{ $kid['allergies'] == 'none' ? '' : Allergies {{ $kid['allergies'] }} }} </li> --}}
            <a href="/kid/{{ $kid->id }}" class="block">
                <p>
                    <strong class="text-lg sm:text-xl">{{ $kid->name }}:</strong>    
                    <em>Birthday:</em> <span style="font-weight: 600">{{ date('j M Y', strtotime($kid['birth_date'])) }}</span>  
                    <em>Guardian:</em> <span style="font-weight: 600">{{ $kid->guardian->name_1 }}</span>
                    <em>Allergies:</em> <span style="font-weight: 600">{{ $kid->allergies }}</span>
                    <em>Home Language:</em> <span style="font-weight: 600">{{ $kid->home_language }}</span>

                </p>
            </a>
        </div>
        @endforeach
        </div>

</x-layout>