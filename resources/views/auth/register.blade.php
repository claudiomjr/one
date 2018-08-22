@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background:#E9E4F0;">
                <div class="card-header">{{ __('whitelist for the One Share ICO') }} - basic information for the KYC - Know Your Customers</div>

                <div class="card-body">
                    <div>
                        <div class="alert alert-info" role="alert">
  <h4 class="alert-heading">Important informations</h4>
  <p>Only investors who register for the whitelist and have their registration approved can participate in the ICO of One Share.</p>
  <p>Some countries ban their citizens from participating in ICO: learn more before investing. <a href="https://www.bitcoinmarketjournal.com/ico-regulations/" class="text-info">Read More</a></p>
<p>

KYC is necessary to avoid future problems with regulation of our activities or to list One Share in some exchanges that require.</p>
<p>
After registering for the whitelist, we highly recommend you to register for the ONE FORUM with the same email registered here. <a href="https://forum.one-fund.io">Read More</a></div>
                    </div>
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="fullname" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" value="{{ old('fullname') }}" required autofocus>

                                @if ($errors->has('fullname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" data-date-format="yyyy-mm-dd" type="text" data-provide="datepicker" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" required>

                                @if ($errors->has('date_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country your live') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="country_id" name="country_id">
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Document with photo') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="document_path" id="document_path" class="form-control{{ $errors->has('document_path') ? ' is-invalid' : '' }}" accept="image/*,application/pdf" required/>
                                <!-- <div class="alert alert-secondary" role="alert">
                                  ex: Passport, national ID, Driver License,etc.
                                </div> --> 
                            
                                @if ($errors->has('document_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('document_path') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark ">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">

    $('#date_of_birth .datepicker({  

       format: 'yyyy-mm-dd',

     });  

</script>  
</div>
@endsection
