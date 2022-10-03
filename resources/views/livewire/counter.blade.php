<div style="text-align:center">
    <h1>{{ $msg }}</h1>
    <input type="text" wire:model.defer="msg">
    <h2>{{ $count }}</h2>
    <button wire:click="increment">請點我</button>
    <button wire:click="resetFilter">重設屬性</button>
</div>
