<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 bg-black p-5 rounded-lg mb-5 w-full text-white">
        <h1 class="text-lg font-serif font-semibold">Reservation</h1>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservation.create') }}"
                    class="text-white px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">New Reservation</a>
            </div>
            <table class="min-w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Name</th>
                        <th
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Number of Guest</th>
                        <th
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Email</th>
                        <th
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Table</th>
                        <th
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Reservation Date</th>
                        <th
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservation as $res)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $res->first_name }}&nbsp;{{$res->last_name}}</td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$res->guest_number}}
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $res->email }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $res->table->name }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $res->res_date }}</td>
                            <td
                                class="py-6 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-3 ">

                                <a href="{{ route('admin.reservation.edit', $res->id) }}"
                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-lg">Edit</a>
                                <form method="POST" action="{{ route('admin.reservation.destroy', $res->id) }}"
                                    class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                    onsubmit="return confirm('are you sure ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
