@extends('layouts.front')
@section('content')
        <div class="card">
            <div class="header">
                <h2>Payment</h2>
            </div>
            <div class="body">
                {!! Form::open(['route'=>'payment.store','method'=>'post']) !!}
                @include('includes.errors')
                <div class="form-group form-float">
                    <div class="form-line">
                        {!! Form::text('registration_token', $reg_token, ['class'=>'form-control','required'=>'']) !!}
                        <label class="form-label">Registration Token*</label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="">
                        <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Payment Method*</label>
                        {!! Form::radio('payment_method', 1, null, ['class'=>'radio-col-deep-purple','id'=>'radio_12']) !!}
                        <label for="radio_12">Bkash</label>
                        {!! Form::radio('payment_method', 2, null, ['class'=>'radio-col-deep-purple','id'=>'radio_13']) !!}
                        <label for="radio_13">Rocket</label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        {!! Form::text('transaction_number', null, ['class'=>'form-control','required'=>'']) !!}
                        <label class="form-label">Transaction Number*</label>
                    </div>
                </div>

                <div class="form-group form-float">
                    <div class="form-line">
                        {!! Form::text('txn_id', null, ['class'=>'form-control','required'=>'']) !!}
                        <label class="form-label">TXN ID*</label>
                    </div>
                </div>

                <div class="pull-right">
                    <input class="btn btn-primary" type="submit" name="" value="Submit">
                </div>
                {!! Form::close() !!}

                <br><br>
                
                <h4 class="text-danger">{{ config('app.reg_token_alert') }}</h4>

                <ul><b>Payment Instruction</b>
                    <li>bKash Merchant Number is 017xx-xxxxxx</li>
                    <li>Rocket Merchant Number is 017xx-xxxxxx</li>
                    <li>Input Transaction number in Transaction Number box which the mobile number that you make the payment</li>
                    <li>Input only Transaction ID in Transaction Details box which you will get via sms from bKash & Rocket</li>
                    <li>For Cash/Bank Transaction, input details in Transaction Details include date, receipt number, transaction number</li>
                </ul>
            </div>
        </div>
@endsection
