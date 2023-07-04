<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.tables.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Table Index</a>
            </div>
          
           <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="max-w-md mx-auto">
                <form method="POST" action="{{ route('admin.tables.store') }}">
                  @csrf
                  <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input id="name" type="text" name="name"
                    class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:border-blue-500">
                  </div>
                      @error('name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="mb-4">
                    <label for="guest_number" class="block text-gray-700 font-bold mb-2">Guest number</label>
                    <input id="guest_number" type="number" name="guest_number" class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:border-blue-500">
                  </div>
                      @error('guest_number')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="sm:col-span-6 pt-5 mb-4">
                    <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
                    <div class="mt-1">
                      <select id="status" name="status" class="multi-select block w-full mt-1">
                        
                          @foreach (App\Enums\TableStatus::cases() as $status)
                            <option value="{{ $status->value }}">{{ $status->name }}</option> 
                          @endforeach
                      
                      </select>
                    </div>
                        @error('status')
                          <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="sm:col-span-6 pt-5 mb-4">
                    <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                    <div class="mt-1">
                      <select id="location" name="location"
                      class="multi-select block w-full mt-1">
                          @foreach (App\Enums\TableLocation::cases() as $location)
                            <option value="{{ $location->value }}">{{ $location->name }}</option> 
                          @endforeach
                        </select>
                      </div>
                          @error('location')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="flex justify-end">
                      <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Submit</button>
                    </div>
                  </form>
                </div>
              </div> 
          </div>
      </div>
  </x-admin-layout>
                          
                      
                
                
              


                
