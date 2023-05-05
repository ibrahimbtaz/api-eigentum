<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Developer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'email',
        'password',
        'company',
        'address',
        'owner',
        'license',
        'phone_number',
    ];
}
