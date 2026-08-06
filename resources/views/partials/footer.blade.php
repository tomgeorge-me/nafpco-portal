<footer class="site-footer">
    <div class="container">
        <div class="grid grid--3">
            <div>
                <h4>{{ config('company.short_name') }}</h4>
                <p style="color:#cfc4a0; margin-top:12px;">{{ config('company.legal_name') }}</p>
                <p style="color:#9b9070; font-family: var(--font-mono); font-size:.82rem;">
                    CIN: {{ config('company.cin') }}<br>
                    Incorporated {{ \Illuminate\Support\Carbon::parse(config('company.incorporated_on'))->format('d M Y') }}
                </p>
            </div>
            <div>
                <h4>Registered Office</h4>
                <p style="color:#cfc4a0; margin-top:12px;">
                    {{ config('company.address.line1') }}<br>
                    {{ config('company.address.line2') }}<br>
                    {{ config('company.address.city') }}, {{ config('company.address.district') }}<br>
                    {{ config('company.address.state') }} {{ config('company.address.pincode') }}
                </p>
            </div>
            <div>
                <h4>Explore</h4>
                <ul style="list-style:none; padding:0; margin-top:12px; display:flex; flex-direction:column; gap:8px;">
                    <li><a href="{{ route('products.index') }}">Products</a></li>
                    <li><a href="{{ route('farmers') }}">Farmer connectivity</a></li>
                    <li><a href="{{ route('about') }}">About the company</a></li>
                    <li><a href="{{ route('contact') }}">Contact / Enquire</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} {{ config('company.legal_name') }}. All rights reserved.</span>
            <span>Status: {{ config('company.status') }} &middot; {{ config('company.entity_type') }}</span>
        </div>
    </div>
</footer>
