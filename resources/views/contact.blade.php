@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <section style="padding-block: 56px 24px;">
        <div class="container">
            <span class="eyebrow">Get in touch</span>
            <h1>Contact {{ config('company.short_name') }}</h1>
            <p class="lede" style="color:var(--ink-soft); max-width:60ch;">
                Questions about a product, wholesale orders, or joining as a farmer member &mdash;
                send a note and someone from the team will follow up.
            </p>
        </div>
    </section>

    <section style="padding-top:0;">
        <div class="container grid grid--2" style="align-items:start;">
            <div>
                @if (session('status') === 'sent')
                    <div class="form-status">Thanks — your enquiry has been received. We'll get back to you shortly.</div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" novalidate>
                    @csrf

                    {{-- Honeypot field: real visitors never see or fill this in --}}
                    <div class="honeypot" aria-hidden="true">
                        <label for="website">Leave this field empty</label>
                        <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                    </div>

                    @if ($product)
                        <input type="hidden" name="product_slug" value="{{ $product->slug }}">
                        <div class="form-status" style="background:#f4ecd8; border-color:var(--turmeric); color:var(--ink);">
                            Enquiring about: <strong>{{ $product->name }}</strong>
                        </div>
                    @endif

                    <div class="form-field">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                        @error('name') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="grid grid--2" style="gap:18px;">
                        <div class="form-field">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @error('email') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-field">
                            <label for="phone">Phone (optional)</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
                            @error('phone') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="subject">Subject (optional)</label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}">
                    </div>

                    <div class="form-field">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="6" required>{{ old('message') }}</textarea>
                        @error('message') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn--primary">Send enquiry</button>
                </form>
            </div>

            <div>
                <div class="card" style="padding:28px;">
                    <h3 style="margin-bottom:16px;">Registered office</h3>
                    <p>
                        {{ config('company.address.line1') }}<br>
                        {{ config('company.address.line2') }}<br>
                        {{ config('company.address.city') }}, {{ config('company.address.district') }} District<br>
                        {{ config('company.address.state') }} &mdash; {{ config('company.address.pincode') }}
                    </p>
                    @if (config('company.contact.email'))
                        <p style="margin-top:16px;">
                            <strong>Email:</strong><br>
                            <a href="mailto:{{ config('company.contact.email') }}" style="color:var(--chili);">{{ config('company.contact.email') }}</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
