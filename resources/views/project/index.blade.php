<x-app-layout>
    <link href="{{ asset('css/project.css') }}" rel="stylesheet">

    <div class="pageWidth">
        {{-- @dump($projects) --}}
        @foreach ($projects as $project)

            <div class="project-table">
                <div class="project-title"> <b>{{$project->title}}</b> </div>
                <div class="project-desc">{{$project->description}}</div>
            </div>
        @endforeach 
    </div>
</x-app-layout>