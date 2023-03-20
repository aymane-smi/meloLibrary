<div class="w-full hidden mt-2" id="step2-edit">
    <select class="p-3 w-full bg-white border-3 rounded-md text-black text-center border-[#15181b] outline-none"
        name="band">
        @if($bands)
            @foreach ($bands as $band)
                <option value="{{ $band->id}}" @selected($band->id === $artist->band_id)>
                    {{ $band->name }}
                </option>
            @endforeach
        @endif
    </select>
    <button class="w-full p-2 mt-3 rounded-md bg-orange-500 text-white" wire:click='save()'>edit new artist</button>
</div>
