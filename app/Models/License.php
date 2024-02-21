<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    protected $table = 'license';
    protected $fillable = [
        'license_id',
        'customer_id',
        'product_id',
        'varieties_of_products',
        'pic',
        'start_date',
        'expired_date',
        'type_of_support',
        'description',
        'created_by',
        'update_by'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($license_id) {
            // Menggunakan nomor urut dari database sebagai angka belakang
            $license_id->license_id = 'LCS' . str_pad(static::count() + 1, 3, '0', STR_PAD_LEFT);
        });
    }

    public function getData()
    {
        return $this->join('customer', 'license.customer_id', '=', 'customer.customer_id')
            ->join('product', 'license.product_id', '=', 'product.product_id')
            ->join('user', 'license.pic', '=', 'user.user_id')
            ->select('license.*', 'customer.customer_id', 'customer.customer', 'product.product_id', 'product.product','user.user_id','user.name')
            ->get();
    }

    public function getCustomer()
    {
        return $this->join('customer', 'license.customer_id', '=', 'customer.customer_id')
            ->join('product','license.product_id','=','product.product_id')
            ->select('license.*', 'customer.*','product.*')
            ->get();

    }
    public function getCustomerProduct($customer_id)
    {
        return $this->join('customer', 'license.customer_id', '=', 'customer.customer_id')
            ->join('product', 'license.product_id', '=', 'product.product_id')
            ->where('customer.customer_id', $customer_id)
            ->select('license.customer_id', 'license.product_id', 'license.license_id','license.varieties_of_products', 'customer.customer_id', 'customer.customer', 'product.product_id', 'product.product')
            ->get();
    }

    public function getCustomerProductLicense($customer_id,$product_id)
    {
        return $this->join('customer', 'license.customer_id', '=', 'customer.customer_id')
            ->join('product', 'license.product_id', '=', 'product.product_id')
            ->where('customer.customer_id', $customer_id)
            ->where('product.product_id', $product_id)
            ->select('license.customer_id', 'license.product_id', 'license.license_id', 'customer.customer_id', 'customer.customer', 'product.product_id', 'product.product')
            ->get();
    }
}
