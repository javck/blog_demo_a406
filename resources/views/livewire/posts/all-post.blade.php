<div>
    <h1>{{ $posts[$index]->title }}</h1>
    category_id
    <input type="text" wire:model="posts.{{ $index }}.category_id" /><br>
    content_small
    <input type="text" wire:model="posts.{{ $index }}.content_small" /><br>
    content
    <textarea wire:model="posts.{{ $index }}.content" ></textarea><br>
    sort
    <input type="text" wire:model="posts.{{ $index }}.sort" /><br>
    狀態:<span>{{ $this->status }}</span><br>
    <button wire:click="left"><-</button>
    <button wire:click="right">-></button>
    <button wire:click="hello('Jack')">Hello</button>
    <button wire:click="$emit('Event1')">事件觸發</button>
    <h3>{{ $message }}</h3>
</div>