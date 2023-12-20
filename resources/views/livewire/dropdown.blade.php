<div  >
    <select wire:model="selectedOption" style=" border-radius: 0.375rem; border-width: 1px ;    border-color:rgb(210, 217, 217)" >
        <option value="">Select Category</option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>