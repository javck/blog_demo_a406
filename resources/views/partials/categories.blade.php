<div class="sidebar-item categories">
    <ul>
      @foreach ($categories as $category)
        <li><a href="{{ url('/categories/' . $category->id) }}">{{ $category->title }} <span>({{$category->posts_count}})</span></a></li>
      @endforeach
    </ul>
  </div><!-- End sidebar categories-->