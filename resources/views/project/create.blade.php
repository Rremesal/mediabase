@props(['project' => null, 'members' => null])
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white">{{ $project ? 'Project: ' . $project->title : 'Nieuw project' }}</h2>
    </x-slot>
    <div class="pageWidth">
        <div class="flex">
            <form class="flex flex-col w-72 mx-auto"
                action="{{ $project ? route('project.update', $project) : route('project.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method($project ? 'PUT' : 'POST')
                <label class="text-white" for="title">Titel:</label>
                <input type="text" name="title" id="title"
                    value="{{ $project ? old('title', $project->title) : ' ' }}">
                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <label class="text-white" for="description">Beschrijving</label>
                <textarea class=" max-h-52" type="text" name="description" id="description">{{ $project ? old('description', $project->description) : '' }}</textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <label class="text-white" for="">Teamleden</label>
                <div class="text-white p-2 h-52 overflow-y-scroll">
                    @foreach ($users as $user)
                        <div class="flex gap-1">
                            <input type="checkbox" value="{{ $user->id }}" name="teammembers[]">
                            <label>{{ $user->name }}</label>
                        </div>
                    @endforeach
                </div>

                <x-primary-button class="my-3 w-fit" type="submit">
                    {{ $project ? 'Opslaan' : 'Aanmaken' }}
                </x-primary-button>
            </form>
            @if (isset($members))
                <div class="text-white">
                    <header class="text-xl font-bold">Huidige teamleden</header>
                    @foreach ($members as $member)
                        <form method="POST" action="{{ route('userproject.destroy', [$project, $member]) }}">
                            @csrf
                            @method('DELETE')
                            <div class="grid grid-cols-2 py-1">
                                <div class="mx-2">{{ $member->name }}</div>
                                <x-primary-button class="w-fit bg-red-500">Delete</x-primary-button>
                            </div>
                        </form>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
