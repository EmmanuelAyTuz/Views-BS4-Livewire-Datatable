<div x-data class="input-group input-group-sm mb-2">
    <select x-ref="boolean" name="{{ $name }}" class="custom-select rounded-pill" wire:input="doBooleanFilter('{{ $index }}', $event.target.value)" x-on:input="$refs.boolean.value=''">
        <option value=""></option>
        <option value="0">No</option>
        <option value="1">Yes</option>
    </select>
</div>

@isset($this->activeBooleanFilters[$index])
    @if($this->activeBooleanFilters[$index] == 1)
        <span wire:click="removeBooleanFilter('{{ $index }}')" class="badge badge-sm badge-success">
            @include('datatables::icons.x-circle', ['text' => 'Yes'])
        </span>
    @elseif(strlen($this->activeBooleanFilters[$index]) > 0)
        <span wire:click="removeBooleanFilter('{{ $index }}')" class="badge badge-sm badge-danger">
            @include('datatables::icons.x-circle', ['text' => 'No'])
        </span>
    @endif
@endisset
