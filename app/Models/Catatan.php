<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    protected $table = 'catatan';

    protected $fillable =[
        'user_id',
        'nama',
        'tanggal',
        'waktu',
        'lokasi',
        'suhu',
        'image',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'catatan', 'user_id');
    }
}
