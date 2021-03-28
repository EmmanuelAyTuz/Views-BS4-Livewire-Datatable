<div class="btn-group" role="group" aria-label="simple-pagination">
    <!-- Previous Page Link -->
    <a class="btn btn-light pt-2" @unless ($paginator->onFirstPage()) wire:click="previousPage" @endunless>
        <span class="text-md @if ($paginator->onFirstPage()) {{ 'text-gray' }} @else {{ '' }} @endif">
            @include('datatables::icons.arrow-left')
        </span>
    </a>

    <!-- Next Page Link -->
    <a class="btn btn-light pt-2" @if ($paginator->hasMorePages()) wire:click="nextPage" @endif>
        <span class="text-md @if ($paginator->hasMorePages()) {{ '' }} @else {{ 'text-gray' }} @endif">
            @include('datatables::icons.arrow-right')
        </span>
    </a>
</div>
