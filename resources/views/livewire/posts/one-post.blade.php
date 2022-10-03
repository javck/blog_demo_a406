<div>
    <h1>{{ $post->title }}</h1>
    category_id
    <input type="text" wire:model="post.category_id" /><br>
    content_small
    <input type="text" wire:model="post.content_small" /><br>
    content
    <textarea wire:model="post.content" ></textarea><br>
    sort
    <input type="text" wire:model="post.sort" /><br>
</div>
