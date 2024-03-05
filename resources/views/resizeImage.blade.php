<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
    
            .upload-box {
                text-align: center;
                border: 2px solid #000;
                padding: 20px;
            }
    
            img {
                max-width: 50%;
                height: auto;
                margin-bottom: 10px;
            }
    
            .button-container {
                display: flex;
                gap: 10px;
            }
    
            button {
                flex: 1;
                padding: 10px;
                font-size: 16px;
            }
        </style>
        <title>Centered Box with Images and Buttons</title>
</head>
<body>
    @if ($message = Session::get('succes'))
        <b>Original image</b>
        <img src="/images/{{ Session::get('imageName') }}" alt="">
        <b>Thumbnail image</b>
        <img src="/thumbnails/{{ Session::get('imageName') }}" alt="">
    @endif

    <form action="{{route('resizeImagePost')}}" enctype="multipart/form-data" method="POST">
        @csrf
            </br>
            <input type="file" name="image" required>
            </br>
            <button type="submit" class="btn btn-succses">Upload Image</button>
    </form>
</body>