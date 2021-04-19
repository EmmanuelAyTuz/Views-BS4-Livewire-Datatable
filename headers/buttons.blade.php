@unless ($column['hidden'])
    @if($isTemplateSyntax ?? false)<th scope="col">@endif
        @include('datatables::common.sorter')
    @if($isTemplateSyntax ?? false)</th>@endif
@endif
