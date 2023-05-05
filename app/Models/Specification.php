<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'bedroom',
        'bathroom',
        'surface_area',
        'building_area',
        'floor',
        'type_id',
    ];
}
