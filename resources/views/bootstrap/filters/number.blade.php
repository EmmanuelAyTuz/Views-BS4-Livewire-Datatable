<div x-data>
    <div class="input-group input-group-sm mb-2">
        <input x-ref="inputNumberStart" type="number" wire:input.debounce.500ms="doNumberFilterStart('{{ $index }}', $event.target.value)" class="form-control rounded-pill" placeholder="{{ __('LivewireDatatableBs4::datatable.min') }}">
    
        <div class="input-group-append">
            <button x-on:click="$refs.inputNumberStart.value = ''" wire:click="doNumberFilterStart('{{ $index }}', '')" class="btn" type="button">
                @include('datatables::icons.x-circle')
            </button>
        </div>
    </div>
    
    <div class="input-group input-group-sm mb-2">
        <input x-ref="inputNumberEnd" type="number" wire:input.debounce.500ms="doNumberFilterEnd('{{ $index }}', $event.target.value)"
        class="form-control rounded-pill" placeholder="{{ __('LivewireDatatableBs4::datatable.max') }}">
    
        <div class="input-group-append">
            <button x-on:click="$refs.inputNumberEnd.value = ''" wire:click="doNumberFilterEnd('{{ $index }}', '')" class="btn" type="button">
                @include('datatables::icons.x-circle')
            </button>
        </div>
    </div>
</div>
