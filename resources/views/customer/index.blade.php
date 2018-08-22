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

					<div class="btn-group" style="i:padding: 10px !important;">
						<!-- <a href="https://twitter.com/OneshareO" target="_blank">
							<i class="fa fa-facebook-square" style="font-size:36px"></i>
						</a> -->
						<a href="https://twitter.com/OneshareO" target="_blank">
							<i class="fa fa-twitter-square" style="font-size:36px;padding-right: 10px;"></i>
						</a>
						<a href="https://medium.com/@oneshareofficial" target="_blank">
							<i class="fa fa-medium" style="font-size:36px;padding-right: 10px;"></i>
						</a>
						<a href="https://t.me/onefund" target="_blank">
							<i class="fa fa-telegram" style="font-size:36px;padding-right: 10px;"></i>
						</a>

						<a href="https://bitcointalk.org/index.php?action=profile;u=2340013;sa=summary" target="_blank">
							<i class="fa fa-bitcoin" style="font-size:36px;padding-right: 10px;"></i>
						</a>
						<a href="https://www.reddit.com/user/one_share" target="_blank">
							<i class="fa fa-reddit" style="font-size:36px;padding-right: 10px;"></i>
						</a>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection