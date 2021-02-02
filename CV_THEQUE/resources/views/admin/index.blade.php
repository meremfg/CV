@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    Welcome Admin
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('admin.students') }}">Gérer les étudiants</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.recruteurs') }}">Gérer les recruteurs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
