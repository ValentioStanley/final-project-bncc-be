<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'itemID',
        'nomorInvoice',
        'namaBarang',
        'kuantitas',
        'alamatPengiriman',
        'kodePos',
        'subHarga',
        'totalHarga',
    ];

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'order_item', 'orderID', 'itemID');
    }

    /**
     * The item that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'order_item', 'orderID', 'itemID');
    }
}
