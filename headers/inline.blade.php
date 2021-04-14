<th scope="col">
    <div class="btn-group" role="group" aria-label="header-buttons">
        @include('datatables::common.sorter')
        @if($hideable === 'inline')
            <button type="button" class="btn btn-sm text-sm p-0 mt-0" wire:click.prefetch="toggle('{{ $index }}')">
                @if($column['hidden'])
                    @include('datatables::icons.eye')
                @else
                    @include('datatables::icons.eye-slash')
                @endif
            </button>
        @endif
    </div>
</th>
