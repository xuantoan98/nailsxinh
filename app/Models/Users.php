<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'full_name',
        'phone_number',
        'birthday',
        'address',
        'place_id',
        'role_id'
    ];

    public function place()
    {
        return $this->belongsTo(Places::class, 'place_id');
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
