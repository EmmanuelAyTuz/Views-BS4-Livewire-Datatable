<th scope="col">
    @include('datatables::common.sorter')
    <button type="button" class="btn btn-sm text-sm p-0 mt-0" wire:click.prefetch="toggle('{{ $index }}')">
        @if($column['hidden'])
            @include('datatables::icons.eye')
        @else
            @include('datatables::icons.eye-slash')
        @endif
    </button>
</th>