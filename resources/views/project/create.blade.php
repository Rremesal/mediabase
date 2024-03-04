<x-app-layout>
    <div class="pageWidth">
        <form action="{{ route('project.store')}}" method="POST" enctype="multipart/form-data">

            <label for="title">Titel:</label>
            <input type="text" name="title" id="title">

            <label for="description">Beschrijving</label>
            <input type="text" name="description" id="description">

            <button type="submit">
                Opslaan
            </button>
        </form>
    </div>
</x-app-layout>