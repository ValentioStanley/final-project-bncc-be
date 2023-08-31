<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'kategoriID',
        'namaBarang',
        'hargaBarang',
        'jumlahBarang',
        'fotoBarang',
    ];

        /**
     * Get the category that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(Category::class, 'kategoriID', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'itemID', 'id');
    }

}
