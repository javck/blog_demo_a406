<nav class="navbar">
    <ul>
        @foreach($items as $item)
            @php
                $sub2menu = $item->children;
            @endphp
            @if(isset($sub2menu) && count($sub2menu) > 0)
                <li class="dropdown"><a href="{{$item->link()}}"><span>{{$item->title}}</span> <i class="bi bi-chevron-down"></i> </a>
                <ul>
                    @foreach($sub2menu as $sub2_item)
                        <li><a href="{{$sub2_item->link()}}">{{$sub2_item->title}} </a></li>
                    @endforeach
                </ul>
            @else
                <li><a href="{{$item->link()}}">{{$item->title}} </a>
            @endif
        </li>
        @endforeach
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav>