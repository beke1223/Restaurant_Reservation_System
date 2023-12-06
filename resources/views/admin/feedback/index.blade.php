<x-admin-layout>
    <div>
        <div class="w-full bg-black text-white rounded p-5">

            <h1 class="text-xl font-semibold font-serif center">Feedback</h1>
        </div>
        <div class="mt-3">
            <div class="flex flex-col gap-2">
                @foreach ($feedback as $fb)
               <a href="">
                   <div class="p-3 border">{{$fb->message}}</div>    
                </a> 
                @endforeach
            </div>
        </div>
    </div>
</x-admin-layout>