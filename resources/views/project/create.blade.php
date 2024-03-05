@props(['project' => null]);
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white">{{ $project ? "Project".$project->title : "Nieuw project" }}</h2>
    </x-slot>
    <div class="pageWidth">
        <form class="flex flex-col w-72 mx-auto" action="{{ $project ? route('project.update', $project) : route('project.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($project ? "PUT" : "POST")
            <label class="text-white" for="title">Titel:</label>
            <input type="text" name="title" id="title" value="{{ $project ? old('title', $project->title) : " "}}">

            <label class="text-white" for="description">Beschrijving</label>
            <textarea class=" max-h-52" type="text" name="description" id="description">{{ $project ? old('description', $project->description) : "" }}</textarea>

            <label class="text-white" for="">Teamleden</label>
            <x-checklist :items="$users" ></x-checklist>

            <x-primary-button class="my-3 w-fit" type="submit">
                {{ $project ? "Opslaan" : "Aanmaken" }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
