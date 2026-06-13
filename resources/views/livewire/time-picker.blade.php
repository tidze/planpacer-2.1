<div>
    <div class="flex gap-2 items-center">
        <select wire:model.live="selectedHour" class="border rounded px-2 py-1">
            @foreach($hours as $hour)
                <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}">{{ $hour }}</option>
            @endforeach
        </select>

        <span>:</span>

        <select wire:model.live="selectedMinute" class="border rounded px-2 py-1">
            @foreach($minutes as $minute)
                <option value="{{ $minute }}">{{ $minute }}</option>
            @endforeach
        </select>

        <select wire:model.live="selectedPeriod" class="border rounded px-2 py-1">
            <option value="AM">AM</option>
            <option value="PM">PM</option>
        </select>
    </div>
</div>