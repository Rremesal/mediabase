@props(['items' => null])

<section>
    <div class="p-1 flex flex-col overflow-y-scroll">
        <select multiple name="teammembers[]">
            @foreach ($items as $item)
                <option value="{{ $item->id }}" {{ old('teammembers') ? 'selected' :'' }}>{{ $item->name }}</option>
            @endforeach
    </select>
</div>
</section>
