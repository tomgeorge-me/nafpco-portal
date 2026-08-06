@extends('layouts.app')

@section('title', 'Farmer Connectivity')

@section('content')

    <section style="padding-block: 56px 40px;">
        <div class="container">
            <span class="eyebrow">Farmer connectivity</span>
            <h1>Owned by the growers who supply it.</h1>
            <p class="lede" style="color:var(--ink-soft); max-width:60ch;">
                As a farmer producer company, {{ config('company.short_name') }} exists to
                connect local growers in and around {{ config('company.address.district') }}
                directly to processing and market &mdash; cutting out layers of middlemen
                and keeping more of each harvest's value with the people who grew it.
            </p>
        </div>
    </section>

    <section style="padding-top:0;">
        <div class="container grid grid--3">
            <div class="card">
                <div class="card-body">
                    <span class="card-tag">01 &middot; Grow</span>
                    <h3>Local cultivation</h3>
                    <p>Member farmers grow spice, grain and fruit crops suited to Idukki's hill terrain and climate.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-tag">02 &middot; Process</span>
                    <h3>Local processing</h3>
                    <p>Raw produce is processed close to the farm &mdash; into spices, baked goods and beverages &mdash; keeping quality and freshness intact.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-tag">03 &middot; Market</span>
                    <h3>Direct market access</h3>
                    <p>Finished products reach buyers under the company's own catalog, with returns flowing back to the farmer members who supplied it.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="on-parchment-2">
        <div class="container" style="max-width:70ch;">
            <h2>Are you a farmer in the region?</h2>
            <p>
                If you grow spices, fruit, or other regional produce near
                {{ config('company.address.city') }} and are interested in supplying
                or joining as a member, get in touch and we'll follow up.
            </p>
            <a href="{{ route('contact') }}" class="btn btn--primary">Get in touch</a>
        </div>
    </section>

@endsection
