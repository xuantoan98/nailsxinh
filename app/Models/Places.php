<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Places extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'places';

    protected $primaryKey = 'place_id';

    protected $fillable = ['name', 'phone_number', 'address', 'status'];
}
