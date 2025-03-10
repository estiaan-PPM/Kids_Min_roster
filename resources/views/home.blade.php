<x-layout>
    <x-slot:heading>
        Welcome to Kids Min!
    </x-slot:heading>

    {{-- <h1>Hello from the Home Page!</h1>  --}}
    <div class="flex items-center justify-start gap-x-6">
      @php
          $columnName = 'test_' . \Carbon\Carbon::now()->format('Y_m_d');
        //   dd(!$columnName);
        // dd(isset($kid->$columnName));
      @endphp

        @if(isset($kid->$columnName))
        <a href="/run-migration" 
            class="text-sm/6 font-semibold text-gray-900 hover:text-blue-700">
            New Attendance List
        </a>
        @endif

      <a href="/attendance" 
      class="text-sm/6 font-semibold text-gray-900">
        Retrieve Attendance List
    </a>
    </div>
    <div class="search-container mt-6">
      <form action="/" method="GET">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Search.." 
              class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 
              placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
          <button type="submit"><i class="fa fa-search"></i></button>
      </form>
  </div>
  
  <div class="flex justify-between items-center p-4 border border-transparent rounded-lg">    
    <p>There were currently {{$kids->where($columnName, "present")->count()}} children in attendance today.</p>
  </div>

  <div>
    @foreach ($kids as $kid)
      <div class="flex justify-between items-center p-4 border border-transparent rounded-lg hover:border-gray-300 hover:bg-gray-100 transition duration-200">
          <a href="/kid/{{ $kid->id }}" class="block">
              <p>
                  <strong>{{ $kid->name }}:</strong>  
                  <em>Class:</em> <span style="font-weight: 600">{{ $kid->age_group }}</span>  
                  <em>Birthday:</em> <span style="font-weight: 600">{{ date('j M Y', strtotime($kid['birth_date'])) }}</span>  
                  <em>Guardian:</em> <span style="font-weight: 600">{{ $kid->guardian->name_1 }}</span>
              </p>
          </a>

          <form method="POST" action="/update-attendance">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="{{ $kid->id }}">
            <input type="hidden" name="search" value="{{ request('search') }}">
        
            <button type="submit" 
                class="text-sm font-semibold px-3 py-1 rounded-md 
                    @if(!is_null($kid->$columnName)) 
                        bg-green-500 text-white
                    @else 
                         bg-gray-200 text-gray-500 hover:bg-gray-600 
                    @endif">
                Sign In
            </button>
        </form>
        
      </div>
      @endforeach
  </div>

</x-layout>