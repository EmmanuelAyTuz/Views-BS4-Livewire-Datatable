<div x-data="{
    edit: false,
    edited: false,
    init() {
        window.livewire.on('fieldEdited', (id) => {
            if (id === '{{ $rowId }}') {
                this.edited = true;
                setTimeout(() => {
                    this.edited = false;
                }, 5000);
            }
        });
    },
}" x-init="init()" :key="{{ $rowId }}">
    <div x-show="!edit">
        <button class="btn btn-sm btn-light rounded-pill text-left" x-bind:class="{ 'text-green': edited }" x-on:click="edit = true; $nextTick(() => { $refs.inputEditable.focus() })">
            {!! $value !!}
        </button>
    </div>

    <div class="input-group input-group-sm" x-cloak x-show.transition.in="edit">
         <input class="border border-primary rounded-pill form-control" x-ref="inputEditable" value="{!! strip_tags($value) !!}" wire:change="edited($event.target.value, '{{ $key }}', '{{ $column }}', '{{ $rowId }}')" x-on:click.away="edit = false" x-on:blur="edit = false" x-on:keydown.enter="edit = false" />
    </div>
</div>
