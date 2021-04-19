<div>
    @if($value)
        @include('datatables::icons.check-circle-fill', ['classIcon' => 'text-green text-lg'])
    @else
        @include('datatables::icons.x-circle-fill', ['classIcon' => 'text-red text-lg'])
    @endif
</div>
