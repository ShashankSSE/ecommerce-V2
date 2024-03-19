@extends('components.app')
@section('title', 'Payment Status')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')
<div class="container" style="margin-bottom:100px;">
    <div class="row">
        <div class="col-sm-12"> 
            <table cellpadding="0" cellspacing="0" cols="1"  align="center" style="max-width: 600px;"> 
                <!-- This encapsulation is required to ensure correct rendering on Windows 10 Mail app. -->
                <tr >
                    <td
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        <!-- Seperator Start --> 
                        <!-- Seperator End -->

                        <!-- Generic Pod Left Aligned with Price breakdown Start -->
                        <table align="center" cellpadding="0" cellspacing="0" cols="3" bgcolor="white"
                            class="bordered-left-right"
                            style=" max-width: 600px; width: 100%;"> 
                            <tr align="center">
                                <td width="36"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                                <td class="text-primary"
                                    style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    @if($paymentSuccess)
                                        <img src="http://dgtlmrktng.s3.amazonaws.com/go/emails/generic-email-template/tick.png"
                                            alt="GO" width="50"
                                            style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                                    @else
                                        <img src="{{asset('assets/img/close.png')}}"
                                            alt="GO" width="50"
                                            style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                                    @endif
                                </td>
                                <td width="36"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>
                            <tr height="17">
                                <td colspan="3"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>
                            <tr align="center">
                                <td width="36"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                                <td class="text-primary"
                                    style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <h1
                                        style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 700; line-height: 34px; margin-bottom: 0; margin-top: 0;">
                                        @if($paymentSuccess)
                                            Payment received
                                        @else
                                            Payment failed
                                        @endif
                                    </h1>
                                </td>
                                <td width="36"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>
                            <tr height="30">
                                <td colspan="3"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>
                            <tr align="left">
                                <td width="36"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                                <td
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <p
                                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                        Hi {{auth()->user()->name}},
                                    </p>
                                </td>
                                <td width="36"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>
                            <tr height="10">
                                <td colspan="3"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>
                            <tr align="left">
                                <td width="36"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                                <td
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <p
                                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                        Your transaction was successful!</p>
                                    <br>
                                    <p
                                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; ">
                                        <strong>Payment Details:</strong><br />

                                        Amount: {{$paymentStatus->amount / 100}} {{$paymentStatus->currency}}<br />
                                        Payment Mode: {{$paymentStatus->method}}<br /></p>
                                    <br>
                                    <p
                                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                        We advise to keep this order id for future reference. {{$paymentStatus->order_id}}<br />
                                    </p>
                                </td>
                                <td width="36"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>
                            <tr height="30">
                                <td
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                                <td
                                    style="border-bottom: 1px solid #D3D1D1; color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                                <td
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>
                            <tr height="30">
                                <td colspan="3"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>
                            <tr align="center">
                                <td width="36"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                                <td
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <p
                                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                        <strong>Transaction Id: {{$paymentStatus->id}}</strong></p>
                                    <p
                                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                        Order date: {{ date('Y-m-d H:i:s', $paymentStatus->created_at) }}</p>
                                    <p
                                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                    </p>
                                </td>
                                <td width="36"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>

                            <tr height="50">
                                <td colspan="3"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>

                        </table>
                        <!-- Generic Pod Left Aligned with Price breakdown End -->

                        <!-- Seperator Start -->
                        <table cellpadding="0" cellspacing="0" cols="1"  align="center"
                            style="max-width: 600px; width: 100%;">
                            <tr >
                                <td height="50"
                                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                </td>
                            </tr>
                        </table>
                        <!-- Seperator End -->

                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>

@endsection