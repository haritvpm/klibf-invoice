@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    @if ($bookfest)
                    <a class="btn btn-info" href="{{ route('frontend.member-funds.export') }}">
                     Download  Report 
                    </a>
                    @else
                    No active bookfest    
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection