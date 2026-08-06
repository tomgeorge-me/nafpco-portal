<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    public function create(Request $request): View
    {
        $product = null;

        if ($request->filled('product')) {
            $product = Product::query()
                ->publicVisible()
                ->where('slug', $request->query('product'))
                ->first();
        }

        return view('contact', ['product' => $product]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Honeypot: a hidden field real visitors never fill in.
        if ($request->filled('website')) {
            return redirect()->route('contact')->with('status', 'sent');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'product_slug' => ['nullable', 'string', 'exists:inventory_items,slug'],
        ]);

        $productId = null;

        if (! empty($validated['product_slug'])) {
            $productId = Product::query()
                ->publicVisible()
                ->where('slug', $validated['product_slug'])
                ->value('id');
        }

        $enquiry = Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'inventory_item_id' => $productId,
            'ip_address' => $request->ip(),
        ]);

        $notifyEmail = config('company.contact.email');

        if ($notifyEmail) {
            Mail::raw(
                "New enquiry from {$enquiry->name} ({$enquiry->email}):\n\n{$enquiry->message}",
                function ($mail) use ($notifyEmail, $enquiry) {
                    $mail->to($notifyEmail)
                        ->subject('New website enquiry: '.($enquiry->subject ?: 'General enquiry'));
                }
            );
        }

        return redirect()->route('contact')->with('status', 'sent');
    }
}
