<a href="{{ route('products.show', $product->slug) }}" class="card">
    <div class="card-media">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy">
    </div>
    <div class="card-body">
        <span class="card-tag">{{ $product->category_label }}</span>
        <h3>{{ $product->name }}</h3>
        @if ($product->description)
            <p>{{ \Illuminate\Support\Str::limit($product->description, 50) }}</p>
        @endif
        <span class="more">Enquire for price &rarr;</span>
    </div>
</a>
