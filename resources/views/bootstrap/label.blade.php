<div
    class="@if($column['align'] === 'right') text-right @elseif($column['align'] === 'center') text-center @else text-left @endif {{ $this->cellClasses($row, $column) }}">
    {!! $column['content'] ?? '' !!}
</div>
