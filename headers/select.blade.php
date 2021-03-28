@unless ($column['hidden'])
    <th scope="col">
        @include('datatables::common.sorter')
    </th>
@endif
