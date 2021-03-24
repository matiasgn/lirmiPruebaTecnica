
@extends('layouts')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header bg-primary text-white "><i class="fas fa-info-circle"></i> Usuarios</h5>
            <div class="card-body">
                <user-component></user-component>
            </div>
        </div>
    </div>
@endsection
