<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket';

    protected $fillable = [
        'ticket_id',
        'ticket_number',
        'title',
        'subject',
        'form',
        'ticket_open',
        'ticket_close',
        'license_id',
        'created_by',
        'update_by',
        'status',
        'ball_position'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->ticket_id = 'TK' . str_pad(static::count() + 1, 3, '0', STR_PAD_LEFT);
        });
    }
    public function getDataLicense()
    {
        return $this->join('license', 'ticket.license_id', '=', 'license.license_id')
            ->join('product', 'license.product_id', '=', 'product.product_id')
            ->join('customer', 'license.customer_id', '=', 'customer.customer_id')
            ->select('ticket.*', 'product.product', 'customer.customer')
            ->get();


    }
//    public function getDataLicensedetail()
//    {
//        return $this->join('license', 'ticket.license_id', '=', 'license.license_id')
//            ->join('product', 'license.product_id', '=', 'product.product_id')
//            ->join('customer', 'license.customer_id', '=', 'customer.customer_id')
//            ->select('ticket.*', 'product.product', 'customer.customer','license.pic')
//            ->get();
//
//
//    }

    public function getDataLicensedetail($id)
    {
        return $this->join('license', 'ticket.license_id', '=', 'license.license_id')
            ->join('product', 'license.product_id', '=', 'product.product_id')
            ->join('customer', 'license.customer_id', '=', 'customer.customer_id')
            ->join('user','license.pic','=','user.user_id')
            ->where('ticket.id', $id) // Filter berdasarkan ID yang diberikan
            ->select('ticket.*', 'product.product', 'customer.customer','user.name')
            ->first(); // Mengambil satu entri tunggal, bukan sebuah koleksi
    }


}
