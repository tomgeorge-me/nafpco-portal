@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="hero" style="padding:0;">
        @include('partials.hero-contours')
        <div class="container hero-inner">
            <span class="eyebrow eyebrow--on-dark">{{ config('company.address.district') }} District, Kerala</span>
            <h1>From Idukki's hillside farms<br>to your table.</h1>
            <p class="lede">
                {{ config('company.legal_name') }} is a registered farmer producer company
                turning local harvests — spices, baked goods and beverages — into
                products you can trust, grown and made close to home.
            </p>
            <div class="hero-actions">
                <a href="{{ route('products.index') }}" class="btn btn--primary">Browse products</a>
                <a href="{{ route('farmers') }}" class="btn btn--outline-dark">Meet the farmer network</a>
            </div>
        </div>

        <div class="ledger-strip">
            <div class="container">
                @forelse (config('company.product_categories') as $slug => $label)
                    <div class="ledger-item">
                        <span class="num">{{ $categoryCounts[$slug] ?? 0 }}</span>
                        <span class="label">{{ $label }} listed</span>
                    </div>
                @endforeach
                <div class="ledger-item">
                    <span class="num">{{ \Illuminate\Support\Carbon::parse(config('company.incorporated_on'))->format('Y') }}</span>
                    <span class="label">Incorporated</span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Current harvest</span>
                <h2>What's coming out of the plant right now</h2>
                <p>A rotating selection of what's currently listed. Full stock and seasonal availability confirmed on enquiry.</p>
            </div>

            @if ($featured->isEmpty())
                <div class="empty-state">
                    No products are marked for public listing yet. Mark items <code>is_public_visible</code> in the ERP to feature them here.
                </div>
            @else
                <div class="grid grid--3">
                    @foreach ($featured as $product)
                        @include('partials.product-card', ['product' => $product])
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="on-parchment-2">
        <div class="container grid grid--2" style="align-items:center;">
            <div>
                <span class="eyebrow">Who we are</span>
                <h2>Farmer-owned. Registered. Rooted in Idukki.</h2>
                <p>
                    Incorporated in {{ \Illuminate\Support\Carbon::parse(config('company.incorporated_on'))->format('Y') }}
                    and headquartered in {{ config('company.address.city') }}, {{ config('company.short_name') }}
                    connects local farmers directly to processing and market —
                    keeping more of the value of every harvest within the community that grew it.
                </p>
                <a href="{{ route('about') }}" class="btn btn--outline-light">Read the full company profile</a>
            </div>
            <div style="display:flex; justify-content:center;">
                @include('partials.seal')
            </div>
        </div>
    </section>

@endsection
