<div x-data class="input-group input-group-sm mb-2">
    <input x-ref="inputSearch" type="text" class="rounded-pill form-control"
        wire:change="doTextFilter('{{ $index }}', $event.target.value)"
        x-on:change="$refs.inputSearch.value = ''"
        placeholder="{{ __('LivewireDatatableBs4::datatable.type_find') }}" />
</div>

@foreach($this->activeTextFilters[$index] ?? [] as $key => $value)
    <span wire:click="removeTextFilter('{{ $index }}', '{{ $key }}')" class="badge badge-sm badge-info">
        <span>{{ $this->getDisplayValue($index, $value) }}</span> @include('datatables::icons.x-circle')</i>
    </span>
@endforeach
