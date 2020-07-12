<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    public $perPage = 5;

    public $fillable = [
        'description',
        'date_init',
        'date_finish',
        'status',
        'area_id'
    ];

    public function area() {
//        return $this->belongsTo(Area::class, 'area_id', 'id');
        return $this->belongsTo(Area::class);
    }

    public function status() {
//        return $this->belongsTo(Area::class, 'area_id', 'id');
        return $this->belongsTo(Status::class);
    }
}
