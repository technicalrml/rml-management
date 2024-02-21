<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'product',
        'support_email'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->product_id = 'PR' . str_pad(static::count() + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
