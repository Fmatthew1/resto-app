<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.reservations.store') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Table Index</a>
            </div>
          
           <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="max-w-md mx-auto">
                <form method="POST" action="{{ route('admin.reservations.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 font-bold mb-2">First Name</label>
                    <input id="first_name" type="text" name="first_name"
                    class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:border-blue-500">
                  </div>
                      @error('first_name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 font-bold mb-2">Last Name</label>
                    <input id="last_name" type="text" name="last_name"
                    class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:border-blue-500">
                  </div>
                      @error('last_name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="sm:col-span-6 pt-5 mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email"
                    class="appearance-none border border-gray-300 rounded w-full py-4 px-6 leading-tight focus:outline-none focus:border-blue-500">
                  </div>
                      @error('email')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="mb-4">
                    <label for="tel_number" class="block text-gray-700 font-bold mb-2">Phone Number</label>
                    <input id="tel_number" type="tel_number" name="tel_number" class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:border-blue-500">
                  </div>
                      @error('tel_number')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="mb-4">
                    <label for="res_date" class="block text-gray-700 font-bold mb-2">Reservation Date</label>
                    <input id="res_date" type="datetime-local" name="res_date"
                    class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:border-blue-500">
                  </div>
                      @error('res_date')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="mb-4">
                    <label for="guest_number" class="block text-gray-700 font-bold mb-2">Guest Number</label>
                    <input id="guest_number" type="number" name="guest_number"
                    class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:border-blue-500">
                  </div>
                      @error('guest_number')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="sm:col-span-6 pt-5 mb-4">
                    <label for="status" class="block text-gray-700 font-bold mb-2">Table</label>
                    <div class="mt-1">
                      <select id="table_id" name="table_id" class="multi-select block w-full mt-1">
                        
                        @foreach ($tables as $table)
                          <option value="{{ $table->id}}">{{ $table->name }} ({{ $table->guest_number }} Guests)</option> 
                        @endforeach
                      
                      </select>
                    </div>
                        @error('table_id')
                          <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Store</button>
                  </div>
                </form>
              </div>
            </div> 
        </div>
    </div>
</x-admin-layout>
              
                
              


                
