<x-layout>
    <x-slot:heading>
        Welcome to Kids Min
    </x-slot:heading>

    <p>Please fill in the following details so that we can take care of your child.</p>
    <form method="POST" actions="/">
        @csrf
        
        <div class="space-y-12">      
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="mt-10 text-base/9 font-semibold text-gray-900">Child Information</h2>
      
            <div class="mt-0 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Name of Child</label>
                <div class="mt-2">
                  {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                  <input type="text" name="child-name" id="child-name" autocomplete="given-name" value ="{{ old('child-name') }}" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-700 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>

                @error('child-name')
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
              </div>
      
              <div class="sm:col-span-3">
                <label for="allergies" class="block text-sm/6 font-medium text-gray-900">Allergies</label>
                <div class="mt-2">
                  <input type="text" name="allergies" id="allergies" autocomplete="" value ="{{ old('allergies') }}" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>

                @error('allergies')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
              </div>
      
              <div class="sm:col-span-4">
                <label for="d-o-b" class="block text-sm/6 font-medium text-gray-900">Date of Birth</label>
                <div class="mt-2">
                  <input id="d-o-b" name="d-o-b" type="date" autocomplete="01/01/2020" value ="{{ old('d-o-b') }}" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>

                @error('d-o-b')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
              </div>              
            </div>


            <h2 class="mt-10 text-base/9 font-semibold text-gray-900">Guardian Information</h2>
      
            <div class="mt-0 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="name-1" class="block text-sm/6 font-medium text-gray-900">Name</label>
                  <div class="mt-2">
                    <input type="text" name="g-name-1" id="g-name-1" value ="{{ old('g-name-1') }}" autocomplete="given-name" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-700 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                  </div>

                  @error('g-name-1')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                  @enderror
                </div>
        
                <div class="sm:col-span-3">
                  <label for="name-2" class="block text-sm/6 font-medium text-gray-900">Name</label>
                  <div class="mt-2">
                    <input type="text" name="g-name-2" id="g-name-2" autocomplete="given-name" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                  </div>
                </div>
        
                <div class="sm:col-span-3">
                    <label for="email-1" class="block text-sm font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                      <input id="email-1" name="email-1" type="email" value ="{{ old('email-1') }}" autocomplete="email" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>

                    @error('email-1')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                  </div>
                  
                  <div class="sm:col-span-3">
                    <label for="email-2" class="block text-sm font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                      <input id="email-2" name="email-2" type="email" autocomplete="email" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                  </div>

                  <div class="sm:col-span-3">
                    <label for="cell-1" class="block text-sm font-medium text-gray-900">Cellphone Number</label>
                    <div class="mt-2">
                        <input id="cell-1" name="cell-1" type="tel" value ="{{ old('cell-1') }}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" 
                        placeholder="123-456-7890" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" required>
                    </div>

                    @error('cell-1')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                  </div>
                  
                  <div class="sm:col-span-3">
                    <label for="cell-2" class="block text-sm font-medium text-gray-900">Cellphone Number</label>
                    <div class="mt-2">
                        <input id="cell-2" name="cell-2" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" 
                        placeholder="123-456-7890" class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                  </div>
                  
                                
              </div>
          </div>
          {{-- <div class="mt-10">
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500 italic">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
          </div> --}}
          
        </div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
      
</x-layout>