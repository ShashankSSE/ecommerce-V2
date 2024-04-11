@extends('layouts.app')
@section('content')
@if(session('success'))
    
@endif
<style>
    .addMoreUsers{
        position: absolute;
        left: 50%;
        z-index:9999;
    }
    #active {
        width: 40px;
        background: #f95f53;
        text-align: center;
        border-radius: 50%;
        font-size: 18px;
        color: white;
        padding: 5px 0px 5px 0px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="addMoreUsers"> 
</div>
<table id="dataTable"  class="mdl-data-table display wrap" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Created On</th>
                <!-- <th>Created By</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($contactUs as $key=>$item)
            @php
                $datetime = new DateTime($item->created_at);
                $formattedDateTime = $datetime->format('d-M-Y h:i A');
            @endphp
                <tr>
                    <td>{{$key+1}} </td> 
                    <td>{{$item->name}} </td> 
                    <td>{{$item->email}} </td> 
                    <td>{{ Illuminate\Support\Str::limit($item->message, 50, '...') }}</td>
                    <td>{{$formattedDateTime}} </td> 
                    <td><a href="{{ route('contact.show',['id' => $item->id]) }}"><div id="active"><i class="mdi mdi-eye"></i></div></a> </td>                      
                </tr> 
            @endforeach
        </tbody>
    </table>
    
@endsection
@push('scripts')
<script>
     
</script>
@endpush