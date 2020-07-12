<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{


    protected $study;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Study $study)
    {
        $this->study = $study;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $studies = $this->study->select('status', DB::raw('count(*) as total'))->groupBy('status')->orderByRaw("FIELD(status , 'Em atraso', 'Em andamento', 'Finalizado') ASC")->get();

        // prepare empty array
        $result = array('Em atraso' => 0, 'Em andamento' => 0, 'Finalizado' => 0);
        foreach ($studies as $key => $study) {
            switch ($study->status) {
                case 'Em atraso':
                    $result['Em atraso'] = $study->total;
                    break;
                case 'Em andamento':
                    $result['Em andamento'] = $study->total;
                    break;
                case 'Finalizado':
                    $result['Finalizado'] = $study->total;
                    break;
            }
        }
//        dd($studies);
        return view('dashboards.index', compact('result'));
    }


}
