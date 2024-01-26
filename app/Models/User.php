<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nama',
        'foto',
    ];

    public function cacatan()
    {
        return $this->belongsToMany(Catatan::class,  'users', 'id');
    }
}
