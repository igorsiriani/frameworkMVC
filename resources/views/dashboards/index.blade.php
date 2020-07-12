@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <div class="container">
        <div style="padding-left: 4vw;">
            <h1>Estudos</h1>
            @foreach($result as $status => $total)
                <div class="col-md-3 col-sm-12 {{ $status == 'Finalizado' ? 'finalizado' : ($status == 'Em atraso' ? 'emAtraso' : 'emAndamento') }} dashboardCard">
                    <h5 class="dashboardTitle">{{ $status }}</h5>
                    <p class="dashboardContent">{{ $total }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
