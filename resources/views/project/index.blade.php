<x-app-layout>

    <link href="{{ asset('css/project.css') }}" rel="stylesheet">
    <section class="pageWidth mt-2">
        <article class="my-2">
            <main class="flex justify-end">
                <x-primary-button><a href="{{ route('project.create') }}">Nieuw project</a></x-primary-button>
            </main>
        </article>
        <div class="table-header">
            <div class="col">Title</div>
            <div class="col">description</div>
        </div>
        @foreach ($projects as $project)
            <article class="project-table grid grid-cols-3 grid-rows-1 rounded px-3">
                <header class="project-title"> <b>{{$project->title}}</b> </header>
                <main class="project-desc">
                    <h1 class="text-wrap w-90 col-span-3">{{$project->description}}</h1>
                </main>
                <form class="flex items-center justify-end" method="POST" action="{{ route('project.destroy', $project) }}">
                    @csrf
                    @method("DELETE")
                    <x-primary-button><a href="{{ route('project.show', $project) }}">Openen</a></x-primary-button>
                    <x-secondary-button class=" h-fit mx-1"><a class="h-full w-full" href="{{ route('project.edit', $project) }}">Wijzigen</a></x-primary-button>
                    <x-primary-button class="h-fit bg-red-500 text-white hover:bg-red-400">Verwijderen</x-primary-button>
                </form>
            </article>
        @endforeach
    </section>
</x-app-layout>
