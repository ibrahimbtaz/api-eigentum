<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'units';
    protected $fillable = [
        'title',
        'description',
        'price',
        'rent',
        'image-1',
        'image-2',
        'image-3',
        'image-4',
        'image-plan',
        'bloc',
        'certificate',
        'specification_id',
        'properties_id',
    ];
}
