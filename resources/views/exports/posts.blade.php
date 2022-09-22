<table>
    <thead>
    <tr>
        <th>分類</th>
        <th>標題</th>
        <th>簡單內容</th>
        <th>內容</th>
        <th>狀態</th>
        <th>排序</th>
        <th>圖檔</th>
        <th>創建於</th>
        <th>更新於</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->category->title }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content_small }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->getStatusName() }}</td>
            <td>{{ $post->sort }}</td>
            <td>{{ $post->pic }}</td>
            <td>{{ $post->created_at->format('Y-m-d') }}</td>
            <td>{{ $post->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>