@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Model</div>

                <div class="card-body">
                	<table class="table table-sm">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Full Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Country</th>
					      <th scope="col">Status</th>
					      <th scope="col">Document</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($users as $user)
					    <tr>
					      <th scope="row">1</th>
					      <td>{{$user->fullname}}</td>
					      <td>{{$user->email}}</td>
					      <td>{{$user->country->name}}</td>
					      <td>{{$user->status->name}}</td>
					      <td><img src="<?php echo asset("storage/app/{{$user->document_path}}")?>"></img></td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection