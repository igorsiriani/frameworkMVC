<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function statusStudies() {
        return $this->select('status', DB::raw('count(*) as total'))->groupBy('status')->orderByRaw("FIELD(status , 'Em atraso', 'Em andamento', 'Finalizado') ASC")->get();
    }

}
