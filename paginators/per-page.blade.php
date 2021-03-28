<div class="input-group input-group-sm mb-2">
    {{-- Check if there is any data --}}
    @if($this->results[1])
        <div class="form-group">
            <select name="perPage" class="form-control custom-select rounded" wire:model="perPage">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="99999999">All</option>
            </select>
        </div>
    @endif
</div>
