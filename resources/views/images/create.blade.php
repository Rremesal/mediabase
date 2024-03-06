@props(['image' => null])
<x-app-layout>
    @if ($image !== null)
        <div class="demo"></div>
        <img id="myimage" class="w-32" src="{{ asset($image) }}" alt="">
        <form id="image-form" enctype="multipart/form-data" method="POST"
            action="{{ route('image.store', ['project_id' => isset($project_id) ? $project_id : '']) }}">
            @csrf
            <div class="my-3 w-full flex justify-center">
                <input class="mx-2" id="filename" type="text">
                <select name="project_id" id="project_id">
                    <option value="0">--- project ---</option>
                    @foreach ($projects as $project)
                        <option {{ $project_id == strval($project->id) ? 'selected' : '' }} class="text-white"
                            value="{{ $project->id }}">{{ $project->title }}</option>
                    @endforeach
                </select>
                <button class=" text-white text-sm rounded px-5 py-1 bg-customblue" type="submit"
                    id="submit">Submit</button>
            </div>
        </form>
    @else
        <div class=" w-full h-full mx-5 my-3">
            <form method="POST" enctype="multipart/form-data"
                action="{{ route('image.store', ['project_id' => $project_id]) }}">
                @csrf
                @method('POST')
                <input type="text" value="{{ $project_id }}" hidden>
                <input class="text-white" type="file" name="image">
                <x-primary-button>Uploaden</x-primary-button>
            </form>
        </div>

    @endif
</x-app-layout>
