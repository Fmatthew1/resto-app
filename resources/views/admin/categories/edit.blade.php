<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2 bg-white rounded">
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Category Index</a>
            </div>
          
           <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="max-w-md mx-auto">
                <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input id="name" name="name" type="text" value="{{ $category->name }}" class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:border-blue-500">
                  </div>
                      @error('name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                    <div>
                      <img class="w-32 h-32" src="{{ Storage::url($category->image) }}"
                    </div>
                    <input id="image" name="image" type="file" class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:border-blue-500 bg-white rounded required">
                  </div>
                      @error('image')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="sm:col-span-6 pt-5 mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea id="description" name="description" class="appearance-none border border-gray-300 rounded w-full py-4 px-6 leading-tight focus:outline-none focus:border-blue-500" placeholder="Enter description">
                      {{ $category->description }}
                    </textarea>
                  </div>
                      @error('description')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                      @enderror
                  <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Update</button>
                  </div>
                </form>
              </div>
            </div> 
        </div>
    </div>
</x-admin-layout>
                  
                
              


                
