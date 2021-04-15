<div>
    @if($beforeTableSlot)
        <div class="mt-8">
            @include($beforeTableSlot)
        </div>
    @endif
    
    <div class="mb-1">
        <div class="input-group mb-2">
            @if($this->searchableColumns()->count())
                <div class="input-group-prepend" id="loading-search">
                    <span class="btn">
                        @include('datatables::icons.search')
                    </span>
                </div>

                <input wire:model.debounce.500ms="search" class="form-control rounded-pill mr-1" placeholder="Search in {{ $this->searchableColumns()->map->label->join(', ') }}"/>
            @endif

            <div class="input-group-append" id="export-excel">
                @if($exportable)
                    <div class="ml-2" x-data="{ init() { window.livewire.on('startDownload', link => window.open(link,'_blank')) } }" x-init="init">
                        <button wire:click="export" class="btn btn-outline-success">
                            @include('datatables::icons.excel', ['text' => 'Export'])
                        </button>
                    </div>
                @endif
            </div>

            <div class="input-group-append" id="hideable-select">
                @if($hideable === 'select')
                    @include('datatables::hide-column-multiselect')
                @endif
            </div>

            <div class="input-group-append" id="simple-pagination">
                {{ $this->results->links('datatables::paginators.simple') }}
            </div>

            <div class="input-group-append" id="button-close">
                <button wire:click="$set('search', null)" class="btn">
                    @include('datatables::icons.x-circle', ['classIcon' => 'text-red'])
                </button>
            </div>
        </div>
    </div>

    <div class="mb-1">
        <div class="p-2">
            <div class="d-flex justify-content-center">
                <div wire:loading>
                    <span>
                        @include('datatables::icons.loading', ['text' => 'Loading...'])
                    </span>
                </div>
            </div>
            @switch($hideable)
                @case('buttons')
                    @foreach($this->columns as $index => $column)
                        @if ($column['type'] !== 'checkbox')
                            <span class="badge badge-primary m-2" wire:click.prefech="toggle('{{ $index }}')">
                                {{ str_replace('_', ' ', $column['label']) }}
                                @if($column['hidden'])
                                    @include('datatables::icons.eye-slash')
                                @else
                                    @include('datatables::icons.eye')
                                @endif
                            </span>
                        @endif
                    @endforeach
                    @break                 
            @endswitch
        </div>
    </div>

    <div class="card rounded-lg shadow bg-white table-responsive">
        <table class="table table-sm table-striped table-hover">
            @unless($this->hideHeader)
                <thead class="thead-light">
                    <tr>
                        @foreach($this->columns as $index => $column)
                            @if($column['type'] === 'checkbox')
                                <th>
                                    <span>Select All</span>
                                    <div class="custom-control custom-switch">
                                        <input id="select-all" type="checkbox" class="custom-control-input" wire:click="toggleSelectAll" @if(count($selected) === $this->results->total()) checked @endif />
                                        <label for="select-all" class="custom-control-label"></label>
                                    </div>
                                </th>
                            @endif

                            @if ($column['filterable'] && !$column['hidden'])
                                <th>
                                    @if(is_iterable($column['filterable']))
                                        <div wire:key="{{ $index }}">
                                            @include('datatables::filters.select', ['index' => $index, 'name' => $column['label'], 'options' => $column['filterable']])
                                        </div>
                                    @else
                                        <div wire:key="{{ $index }}">
                                            @include('datatables::filters.' . ($column['filterView'] ?? $column['type']), ['index' => $index, 'name' => $column['label']])
                                        </div>
                                    @endif
                                </th>
                            @else
                                @if($column['type'] !== 'checkbox')
                                    @switch($hideable)
                                        @case('inline')
                                            <th></th>
                                            @break
                                        @case('select')
                                            @unless ($column['hidden'])
                                            <th></th>
                                            @endunless
                                            @break
                                        @case('buttons')
                                            @unless ($column['hidden'])
                                            <th></th>
                                            @endunless
                                            @break
                                        @default
                                            <th></th> 
                                            @break
                                    @endswitch
                                @endif
                            @endif
                        @endforeach
                    </tr>

                    <tr>
                        @foreach($this->columns as $index => $column)
                            @if($column['type'] === 'checkbox')
                                <th class="text-left text-xs">
                                    {{ count($selected) }}
                                </th>
                            @else
                                @switch($hideable)
                                    @case('inline')
                                        @include('datatables::headers.inline', ['column' => $column, 'sort' => $sort])
                                        @break
                                    @case('select')
                                        @include('datatables::headers.select', ['column' => $column, 'sort' => $sort])
                                        @break
                                    @case('buttons')
                                        @include('datatables::headers.buttons', ['column' => $column, 'sort' => $sort])
                                        @break
                                    @default
                                        @include('datatables::headers.default', ['column' => $column, 'sort' => $sort])
                                        @break
                                @endswitch
                            @endif
                        @endforeach
                    </tr>
                </thead>
            @endif
                <tbody>
                    @forelse($this->results as $result)
                        <tr class="{{ isset($result->checkbox_attribute) && in_array($result->checkbox_attribute, $selected) ? 'table-warning' : '' }}">
                            @foreach($this->columns as $column)
                                @if($column['hidden'])
                                    @switch($hideable)
                                        @case('inline')
                                            <th></th>
                                            @break
                                        @case('')
                                            <th></th>
                                            @break
                                    @endswitch
                                @elseif($column['type'] === 'checkbox')
                                    <th>@include('datatables::checkbox', ['value' => $result->checkbox_attribute])</th>
                                @else
                                    <th class="@if($column['align'] === 'right') text-right @elseif($column['align'] === 'center') text-center @else text-left @endif">
                                        {!! $result->{$column['name']} !!}
                                    </th>
                                @endif
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <th class="text-center" colspan="{{ count($this->columns) }}">
                                <small>There's Nothing to show at the moment</small>
                            </th>
                        </tr>
                    @endforelse
                </tbody>
        </table>

        @unless($this->hidePagination)
            <div class="row pl-3 pr-3">
                <div class="col-md-4">
                    @include('datatables::paginators.per-page')
                </div>
                <div class="col-md-4">
                    {{ $this->results->links('datatables::paginators.bootstrap') }}
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <small>
                        Results {{ $this->results->firstItem() }} - {{ $this->results->lastItem() }} of {{ $this->results->total() }}
                    </small>
                </div>
            </div>
        @endif
    </div>

    @if($afterTableSlot)
        <div class="mt-8">
            @include($afterTableSlot)
        </div>
    @endif

</div>
