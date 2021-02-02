@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Students Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.recruteurs.create') }}"> Create New Recruteur</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Nom</th>
   <th>Email</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($users as $user)
  <tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->user->name }}</td>
    <td>{{ $user->user->email }}</td>
    <td>
       <a class="btn btn-primary" href="{{ route('admin.recruteurs.edit',$user->id) }}">Editer</a>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.recruteurs.destroy', $user->user_id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


<p class="text-center text-primary"><small>CVTHEQUE</small></p>
@endsection
