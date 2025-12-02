<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'image',
        'status',
        'admin_response'
    ];

    // Relasi: Tiket dimiliki oleh User (Siswa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Tiket termasuk dalam Kategori tertentu
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}