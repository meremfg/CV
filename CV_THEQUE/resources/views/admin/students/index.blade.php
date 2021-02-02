@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Students Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.students.create') }}"> Create New Students</a>
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
   <th>CNE</th>
   <th>Nom</th>
   <th>Prenom</th>
   <th>Email</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($users as $user)
  <tr>
    <td>{{ $user->cne }}</td>
    <td>{{ $user->nom }}</td>
    <td>{{ $user->prenom }}</td>
    <td>{{ $user->user->email }}</td>
    <td>
       <a class="btn btn-primary" href="{{ route('admin.students.edit',$user->cne) }}">Editer</a>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.students.destroy', $user->user_id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


<p class="text-center text-primary"><small>CVTHEQUE</small></p>
@endsection
