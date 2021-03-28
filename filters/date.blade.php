<div x-data>
    <div class="input-group input-group-sm mb-2">
        <input x-ref="inputDateStart" type="date" wire:change="doDateFilterStart('{{ $index }}', $event.target.value)" class="form-control rounded-pill">
    
        <div class="input-group-append">
            <button x-on:click="$refs.inputDateStart.value=''" wire:click="doDateFilterStart('{{ $index }}', '')" class="btn" type="button">
                @include('datatables::icons.x-circle')
            </button>
        </div>
    </div>
    
    <div class="input-group input-group-sm mb-2">
        <input x-ref="inputDateEnd" type="date" wire:change="doDateFilterEnd('{{ $index }}', $event.target.value)" class="form-control rounded-pill">
    
        <div class="input-group-append">
            <button x-on:click="$refs.inputDateEnd.value=''" wire:click="doDateFilterEnd('{{ $index }}', '')" class="btn" type="button">
                @include('datatables::icons.x-circle')
            </button>
        </div>
    </div>
</div>
