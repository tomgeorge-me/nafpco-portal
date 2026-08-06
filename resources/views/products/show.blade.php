@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <section style="padding-block: 48px 24px;">
        <div class="container">
            <a href="{{ route('products.index') }}" style="font-family: var(--font-mono); font-size:.82rem; color:var(--ink-soft);">&larr; Back to products</a>
        </div>
    </section>

    <section style="padding-top:0; padding-bottom:24px;">
        <div class="container grid grid--product-show" style="align-items:start;">
            <div class="card-media" style="border-radius:var(--radius); border:1px solid var(--paper-line);">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
            </div>
            <div>
                <span class="card-tag">{{ $product->category_label }}</span>
                <h1>{{ $product->name }}</h1>
                @if ($product->unit)
                    <p style="font-family: var(--font-mono); font-size:.82rem; color:var(--ink-soft);">Sold per {{ $product->unit }}</p>
                @endif
                <p>
                    @if (!empty($product->description))
                        {!! $product->description !!}
                    @else
                        Details on this product are being added — get in touch for full specifications.
                    @endif
                </p>

                <div style="display:flex; gap:12px; margin-top:24px; flex-wrap:wrap;">
                    <a href="{{ route('contact', ['product' => $product->slug]) }}" class="btn btn--primary">Enquire about this product</a>
                    <a href="{{ route('products.index', ['category' => $product->category]) }}" class="btn btn--outline-light">More {{ $product->category_label }}</a>
                </div>
            </div>
        </div>
    </section>

    @if ($related->isNotEmpty())
        <section class="on-parchment-2">
            <div class="container">
                <div class="section-head">
                    <span class="eyebrow">You might also like</span>
                    <h2>More {{ $product->category_label }}</h2>
                </div>
                <div class="grid grid--3">
                    @foreach ($related as $item)
                        @include('partials.product-card', ['product' => $item])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
