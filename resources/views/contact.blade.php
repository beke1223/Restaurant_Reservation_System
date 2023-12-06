<x-guest-layout>

    <div class="container mx-auto p-8">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">Success alert!</span> {{ session()->get('success') }}
            </div>
        @endif
        <h1 class="text-3xl font-bold mb-4">Contact Us</h1>

        <p class="text-gray-600">Have a question or feedback? Reach out to us!</p>

        <div class="mt-8 max-w-lg mx-auto">
            <form action="{{ route('contact.store') }}" method="POST" class="bg-white shadow-md rounded p-4">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input type="text" name="name" id="name" class="w-full border rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" class="w-full border rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                    <textarea name="message" id="message" rows="5" class="w-full border rounded p-2" required></textarea>
                </div>

                <div class="">
                    <button type="submit"
                        class=" font-bold  bg-green-500 text-white hover:text-green-500 hover:bg-white p-3 px-4 rounded">Send
                        Message</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
