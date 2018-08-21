@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">User</div>

                <div class="card-body">
               @if ((Auth::user()->status->name) == 'Submitted')
               		<div class="alert alert-info" role="alert">
					 	Wait. We are validating your information.
					</div>
               @endif
                 	
                	
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
					    <tr>
					      <th scope="row">1</th>
					      <td>{{Auth::user()->fullname}}</td>
					      <td>{{Auth::user()->email}}</td>
					      <td>{{Auth::user()->country->name}}</td>
					      <td>{{Auth::user()->status->name}}</td>
					      <td>{{Auth::user()->document_path}}</td>
					    </tr>
					    <tr>
					  </tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection