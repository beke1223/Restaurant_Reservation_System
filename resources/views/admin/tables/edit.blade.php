<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 bg-black p-5 rounded-lg mb-5 w-full text-white">
        <h1 class="text-lg font-serif font-semibold">Tables</h1>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.tables.index') }}"
                    class="text-white px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">Table List</a>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="m-2 p-2 bg-slate-100 rounded">
                        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                            <form method="POST" action="{{ route('admin.tables.update',$table->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="sm:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                                    <div class="mt-1">
                                        <input type="text" id="name" name="name" value="{{$table->name}}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                    </div>
                                    @error('name')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="guest_number" class="block text-sm font-medium text-gray-700"> Guest
                                        Number </label>
                                    <div class="mt-1">
                                        <input type="number" id="guest_number" name="guest_number" value="{{$table->guest_number}}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                    </div>
                                    @error('guest_number')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6 pt-5">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <div class="mt-1 w-full">

                                        <select name="status" id="status" class="w-full">
                                        @foreach(App\Enum\TableStatusEnum::cases() as $status)
                                            <option value="{{$status->value}}"  @selected($table->status->value==$status->value)
                                                class="bg-gray-200 hover:bg-gray-300 p-1 rounded my-1">
                                            {{$status->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                    @error('status')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="sm:col-span-6 pt-5">
                                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                    <div class="mt-1">
                                        <select id="location" name="location" class="form-multiselect block w-full mt-1">
                                            @foreach (App\Enum\TableLocationEnum::cases() as $location)
                                                <option value="{{ $location->value }}" 
                                                    @selected($table->location->value==$location->value)
                                                    >{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('location')
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
