<x-layout>
    <x-slot:heading>
        Attendance Lists
    </x-slot:heading>

    <!-- Column Selector Dropdown -->
    <form action="/attendance" method="GET">
        <select name="selected_column" class="border border-gray-300 rounded-md px-3 py-1.5 w-64 text-gray-900">
            <option value="">Select Column</option> <!-- Default Option -->
            @foreach($columns as $column)
                <option value="{{ $column }}" {{ $column == $selectedColumn ? 'selected' : '' }}>
                    {{ $column }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Filter</button>
    </form>

    <!-- Displaying Kids Based on Selected Column -->
    <div>
        <div class="flex justify-between items-center p-4 border border-transparent rounded-lg">    
            <p>There were {{$kids->count()}} children in attendance on the selected day.</p>
        </div>
        @forelse ($kids as $kid)
            <div class="flex justify-between items-center p-4 border border-transparent rounded-lg hover:border-gray-300 hover:bg-gray-100 transition duration-200">
                <a href="/kid/{{ $kid->id }}" class="block">
                    <p>
                        <strong>{{ $kid->name }}:</strong>  
                        <em>Class:</em> <span style="font-weight: 600">{{ $kid->age_group }}</span>   
                        <em>Guardian:</em> <span style="font-weight: 600">{{ $kid->guardian->name_1 }}</span>
                    </p>
                </a>
            </div>
        @empty
            <p>No kids found for the selected column.</p>
        @endforelse
    </div>
</x-layout>
