
@foreach(data_tree($categories, 0) as $index => $item)
    <li>
        {{ $index }}
        <a href="">{{ $item->name }}</a>
    </li>
@endforeach
