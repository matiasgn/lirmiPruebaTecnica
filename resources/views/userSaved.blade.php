
@extends('layouts')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header bg-primary text-white "><i class="fas fa-info-circle"></i>Usuarios Guardados</h5>
            <div class="card-body">
                <saved-user-component></saved-user-component>
            </div>
        </div>
    </div>
@endsection
