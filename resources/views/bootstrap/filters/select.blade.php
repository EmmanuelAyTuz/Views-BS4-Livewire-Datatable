<div x-data class="input-group input-group-sm mb-2">
    <select x-ref="select" wire:input="doSelectFilter('{{ $index }}', $event.target.value)" x-on:input="$refs.select.value=''" name="{{ $name }}" class="custom-select rounded-pill">
        <option value="">{{ __('LivewireDatatableBs4::datatable.choose') }}</option>
        @foreach($options as $value => $label)
            @if(is_object($label))
                <option value="{{ $label->id }}">{{ $label->name }}</option>
            @elseif(is_array($label))
                <option value="{{ $label['id'] }}">{{ $label['name'] }}</option>
            @elseif(is_numeric($value))
                <option value="{{ $label }}">{{ $label }}</option>
            @else
                <option value="{{ $value }}">{{ $label }}</option>
            @endif
        @endforeach
    </select>
</div>

@foreach($this->activeSelectFilters[$index] ?? [] as $key => $value)
    <span wire:click="removeSelectFilter('{{ $index }}', '{{ $key }}')" x-on:click="$refs.select.value=''" class="badge badge-sm badge-info">
        <span>{{ $this->getDisplayValue($index, $value) }}</span> @include('datatables::icons.x-circle')
    </span>
@endforeach
