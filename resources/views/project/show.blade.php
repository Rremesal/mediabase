<x-app-layout>

    <div class="w-4/5 mx-auto flex justify-end pt-4">
        <x-primary-button class="self-end"><a class="w-full h-full" href="{{ route('image.create', ['project_id' => $project->id]) }}">Nieuwe afbeelding</a></x-primary-button>
    </div>
    <div class=" mx-auto w-4/5 flex flex-wrap gap-3">
        @foreach ($images as $image)
            <article class="project-table h-full my-2 w-52 bg-white rounded px-3">
                <header class="text-center"><b>{{ $image->name }}</b></header>
                <main class="project-desc">
                    <img class=" border border-1 w-full h-full" src="{{ asset($image->path) }}" alt="">
                </main>
                <form class="text-center py-2" method="POST" action="{{ route('image.destroy', $image) }}">
                    @csrf
                    @method('DELETE')
                    <x-primary-button class="h-fit bg-red-500 text-white hover:bg-red-400">Verwijderen</x-primary-button>
                </form>
            </article>
        @endforeach
    </div>
</x-app-layout>
