<x-app-layout>
    <div class="demo"></div>
    <img id="myimage" class="w-32" src="https://assets-global.website-files.com/5d978cdf269be44b6ee24cf7/5dae291d951b51fb6b9cf5c5_emojis1.png" alt="">
    <form id="image-form" enctype="multipart/form-data" method="POST" action="{{ route("image.store") }}">
        @csrf
        <div class="my-3 w-full flex justify-center">
            <input class="mx-2" id="filename" type="text">
            <button class=" text-white text-sm rounded px-5 py-1 bg-customblue" type="submit" id="submit">Submit</button>
        </div>
    </form>


</x-app-layout>
