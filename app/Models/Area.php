<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * Attributes changeable by the user
     *
     * @var array
     */
    protected $fillable = ['description', 'color'];

    protected $perPage = 5;
}
