@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
                <div class="w3-panel w3-green w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"
                            class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                    <p>{!! $message !!}</p>
                </div>
                <?php Session::forget('success');?>
            @endif
            @if ($message = Session::get('error'))
                <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"
                            class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                    <p>{!! $message !!}</p>
                </div>
                <?php Session::forget('error');?>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"
                        action="{{ route('paypal') }}">
                        @csrf
                        <h2 class="w3-text-blue">Payment Form</h2>
                        <p>Demo PayPal form - Integrating paypal in laravel</p>
                        <p>
                            <label class="w3-text-blue"><b>Enter Amount</b></label>
                            <input class="w3-input w3-border" name="amount" type="text">
                        </p>
                        <button class="btn btn-primary">Pay with PayPal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
