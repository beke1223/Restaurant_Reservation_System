<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 bg-black p-5 rounded-lg mb-5 w-full text-white">
        <h1 class="text-lg font-serif font-semibold">Menu</h1>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.index') }}"
                    class="text-white px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">Menu List</a>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="m-2 p-2 bg-slate-100 rounded">
                        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                            <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="sm:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                                    <div class="mt-1">
                                        <input type="text" id="name" name="name" value="{{ $menu->name }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                    </div>
                                    @error('name')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="image" class="block text-sm font-medium text-gray-700"> Image
                                    </label>
                                    <div class="mt-1">
                                        <input type="file" id="image" name="image"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                    </div>
                                    @error('image')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6 pt-5">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Price</label>
                                    <div class="mt-1">
                                        <input type="number" min="0.00" step="0.01" max="1000.0"
                                            value="{{ $menu->price }}" id="price" name="price"
                                            class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-400 @enderror" />
                                    </div>
                                    @error('description')
                                        <div class="text-sm text-r253644ed-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6 pt-5">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Description</label>
                                    <div class="mt-1">
                                        <textarea id="description" rows="3" name="description"
                                            class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-400 @enderror">{{ $menu->description }}</textarea>
                                    </div>
                                    @error('description')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6 pt-5">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Categories</label>
                                    <div class="mt-1 w-full">

                                        <select name="categories[]" multiple id="categories" class="form-multiselect block mt-1 w-full">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" 
                                                    class="w-full border-b-2 hover:bg-gray-300 py-1 rounded my-1" @selected($menu->categories->contains($category))>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('description')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-6 p-4">
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</x-admin-layout>
