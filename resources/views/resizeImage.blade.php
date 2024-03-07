<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Centered Box with Images and Buttons</title> 

        
    </head>

    <body>
        @if ($message = Session::get('succes'))
            <b>Original image</b>
            <img src="/images/{{ Session::get('imageName') }}" alt="">
            <b>Thumbnail image</b>
            <img src="/thumbnails/{{ Session::get('imageName') }}" alt="">
        @endif

        <form action="{{ route('resizeImagePost') }}" enctype="multipart/form-data" method="POST">
            @csrf
            </br>
            <input class="text-black text-sm rounded px-5 py-1 border-spacing-5" type="file" name="image" required>
            <button class="text-white text-sm rounded px-5 py-1 bg-customblue" type="submit">Upload Image</button>
        </form>
    </body>
</x-app-layout>
