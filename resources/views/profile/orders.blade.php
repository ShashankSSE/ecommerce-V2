@extends('components.app')
@section('title', 'Patakha | My Orders')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')
@if (session('status'))
    <div class="alert alert-dismissible alert-success">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"><i class="fa fa-times"></i></button>
    </div>
@endif
<style> 
.accordion{
    border: 1px solid #ddd;
    margin:50px;
}
.header{
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
    padding-left: 10px;
    padding-right: 50px;
}
.header .inner-header{
    display: flex;
    gap: 50px;
}
.accordion-body{
    border-top: 1px solid #ddd;
}
.header div{
    color: #6b6b6b;
}
.header div>span{
    font-weight: 600;
    font-size: 14px;
    color: black!important;
}
#dataTable{
    border-collapse: collapse;
}
#orderItems tr>td{
    /* border-bottom: 1px solid #000; */
    color: black;
    border-top: 1px solid #000;
}
</style>
<div class="container">
    <div class="row mtb">
        <h2 class="text-center">All Orders</h2>
        <div class="col-sm-12"> 
            <div class="myOrders">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach($orders as $key=>$order) 
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$key}}" aria-expanded="false" aria-controls="flush-collapse{{$key}}">
                                <div class="header">
                                    <div class="inner-header">
                                        <div>{{$key+1}}. Order Placed <br> <span>{{ \Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</span></div>
                                        <div> Total <br> <span> {{number_format(($order->price) / 100, 2)}} /-</span></div>
                                    </div>
                                    <div> Order # <br> <span> {{$order->unique_Id}}</span></div>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapse{{$key}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <table id="dataTable" class="mdl-data-table display wrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Product</th>
                                        <th>Image</th>
                                        <th>Qty</th>
                                        <th>Attribute</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="orderItems">
                                    @foreach($order->orderItems as $index=>$item) 
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$item->product_name}}</td>
                                            <td><img src="{{$item->image}}" alt="{{$item->product_name}}" style="width: 35px;"></td>
                                            <td>{{$item->qty}}</td>
                                            <td>
                                                Size: {{json_decode($item->attributes)->size}}<br>
                                                Color: {{json_decode($item->attributes)->color}}    
                                            </td>
                                            <td>{{$item->price}}</td>
                                            <td>{!! ($order->payment_status == "Failed") ? "<p
                                                style='background: #ff000047;color: black;display: flex;justify-content: center;border-radius: 10px;font-weight: 600;'>
                                                Failed</p>" : (($order->payment_status == "created") ? "<p
                                                style='background: #f6e84e6e;color: black;display: flex;justify-content: center;border-radius: 10px;font-weight: 600;'>
                                                Cancled</p>" : "<p
                                                style='background:#00800033; color:black; display: flex;justify-content: center;border-radius: 10px;font-weight: 600;'>
                                                Paid</p>") !!}
                                            </td>
                                            <td style="    display: flex;"><a style="margin:0;" href="#" class="btn btn-primary">Track Your Order</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
 <script> 
 </script>
@endsection