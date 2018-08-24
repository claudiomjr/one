@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="background:#E9E4F0;">
                <div class="card-header">Information</div>

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
					      <!-- <th scope="col">Document</th> -->
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">1</th>
					      <td>{{Auth::user()->fullname}}</td>
					      <td>{{Auth::user()->email}}</td>
					      <td>{{Auth::user()->country->name}}</td>
					      <td>{{Auth::user()->status->name}}</td>
					      <!-- <td>{{Auth::user()->document_path}}</td> -->
					    </tr>
					    <tr>
					  </tbody>
					</table>

                </div>
                <div class="card-footer" style="float: right !important;">
					
                </div>

            </div>
            <div style="height: 30px"></div>
            <!-- <div class="row">
			  <div class="col-sm-6">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">Special title treatment</h5>
			        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
			        <a href="#" class="btn btn-primary">Go somewhere</a>
			      </div>
			    </div>
			  </div>
			  <div class="col-sm-6">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">Special title treatment</h5>
			        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
			        <a href="#" class="btn btn-primary">Go somewhere</a>
			      </div>
			    </div>
			  </div>
			</div> -->
			<div class="card">
				  <div class="card-header">
				    Next Steps
				  </div>
				  <div class="card-body">
				    <p class="card-text">1. Register for ONE FORUM, all strategic discussions and voting will take place there.
				    <a href="https://forum.one-fund.io/" target="_blank">(LINK)</a></p>
				    <p class="card-text">2. Be part of our Airdrop and Bounty campaign and get free One Share Tokens.
				    <a href="#" target="_blank">(LINK)</a></p>
				    <p class="card-text">3. Wait until our public sale begins. Learn more how to get the best bonus for ICO.
				    <a href="#" target="_blank">(LINK)</a></p>
				  </div>
			</div>
        </div>
    </div>
</div>
@endsection