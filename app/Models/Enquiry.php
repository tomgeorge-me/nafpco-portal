<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'inventory_item_id',
        'ip_address',
    ];

    protected $attributes = [
        'status' => 'new',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'inventory_item_id');
    }
}
