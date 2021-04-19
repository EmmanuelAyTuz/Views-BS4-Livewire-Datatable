<div class="btn-group ml-2" role="group" aria-label="simple-pagination">
    <!-- Previous Page Link -->
    <a class="btn btn-light pt-2" @unless ($paginator->onFirstPage()) wire:click="previousPage" @endunless data-toggle="tooltip" data-placement="top" title="{{ __('LivewireDatatableBs4::datatable.prev') }}">
        <span class="text-md @if ($paginator->onFirstPage()) {{ 'text-gray' }} @else {{ '' }} @endif">
            @include('datatables::icons.arrow-left')
        </span>
    </a>

    <!-- Next Page Link -->
    <a class="btn btn-light pt-2" @if ($paginator->hasMorePages()) wire:click="nextPage" @endif data-toggle="tooltip" data-placement="top" title="{{ __('LivewireDatatableBs4::datatable.next') }}">
        <span class="text-md @if ($paginator->hasMorePages()) {{ '' }} @else {{ 'text-gray' }} @endif">
            @include('datatables::icons.arrow-right')
        </span>
    </a>
</div>
