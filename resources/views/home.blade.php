<x-layout>
    <x-slot:heading>
        Welcome to Kids Min!
    </x-slot:heading>

    {{-- <h1>Hello from the Home Page!</h1>  --}}
    <div class="flex items-center justify-start gap-x-6">
      <button type="button" class="text-sm/6 font-semibold text-gray-900">New Attendance List</button>
      <button type="button" class="text-sm/6 font-semibold text-gray-900">Retrieve Attendance List</button>
    </div>
    <div class="search-container mt-6">
      <form action="/" method="GET">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Search.." 
              class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 
              placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
          <button type="submit"><i class="fa fa-search"></i></button>
      </form>
  </div>
  

  <div>
    @foreach ($kids as $kid)
      <div class="flex justify-between items-center p-4 border border-transparent rounded-lg hover:border-gray-300 hover:bg-gray-100 transition duration-200">
          <a href="/kid/{{ $kid->name }}" class="block">
              <p>
                  <strong>{{ $kid->name }}:</strong>  
                  <em>Class:</em> <span style="font-weight: 600">{{ $kid->age_group }}</span>  
                  <em>Birthday:</em> <span style="font-weight: 600">{{ date('j M Y', strtotime($kid['birth_date'])) }}</span>  
                  <em>Guardian:</em> <span style="font-weight: 600">{{ $kid->guardian->name_1 }}</span>
              </p>
          </a>
          <button type="button" class="text-sm font-semibold text-gray-900 px-3 py-1 bg-gray-200 rounded-md">
              Sign In
          </button>
      </div>
      @endforeach
  </div>

</x-layout>