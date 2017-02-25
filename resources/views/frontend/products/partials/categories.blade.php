@if (count($product->categories))
    <ul>
        @foreach ($product->categories as $category)
            <li><a href="{{ route('frontend.categories.show', $category->id) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
@endif