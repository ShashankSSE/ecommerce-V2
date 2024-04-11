@extends('layouts.app')
@section('content')
@if(session('success'))
    
@endif
<style>
    table, th, td {
        border: 1px solid #dddddd;
        border-collapse: collapse;
        padding: 10px;
        font-size: 20px;
        line-height: 40px;
    }
</style>
<div class="addMoreUsers"> 
</div>
<table id=""  class="mdl-data-table display wrap" style="width:100%">
            @php
                $datetime = new DateTime($contactUs->created_at);
                $formattedDateTime = $datetime->format('d-M-Y h:i A');
            @endphp 
            <tr>
                <th>Id</th>
                <td>{{$contactUs->id}} </td> 
                
            </tr> 
            <tr>
                <th>Name</th>
                <td>{{$contactUs->name}} </td>  
            </tr> 
            <tr> 
                <th>Email</th>
                <td>{{$contactUs->email}} </td> 
            </tr>  
            <tr>
                <th>Message</th>
                <td>{{ $contactUs->message }}</td>
            </tr>
            <tr>
                <th style="    width: 150px;">Created On</th> 
                <td>{{$formattedDateTime}} </td> 
            </tr>
    </table>
    
@endsection
@push('scripts')
<script>
     
</script>
@endpush