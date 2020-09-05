@extends('layouts.app_new')

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
					<p><h4 style="font-size:18px">User Details</h4></p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					<p>Name : {{$details->name}}</p>
				
					<p>Email : {{$details->email}}</p>
					
                    <p>{{ __('You are logged in!') }}</p>
					
                </div>
            </div>
        </div>
    </div>



@endsection
