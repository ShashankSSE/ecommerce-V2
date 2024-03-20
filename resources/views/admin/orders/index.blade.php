@extends('layouts.app')
@section('content')
@if(session('success'))

@endif
<style>
.modal-footer {
    justify-content: center !important;
}

.modal-dialog {
    max-width: 1200px !important;
    margin: 30px auto;
}
</style>
<table id="dataTable" class="mdl-data-table display wrap" style="width:100%">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Order Id</th>
            <th>Payment Id</th>
            <th>Buyer Name</th>
            <th>Buyer Email</th>
            <th>Buyer Mobile</th>
            <th>Buyer Full Address</th>
            <th>Price</th>
            <th>Status</th>
            <th>Created On</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->unique_Id }}</td>
            <td>{{ $order->transaction_id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->mobile }}</td>
            <td>{{ $order->state }} {{ $order->city }} {{ $order->pin }} {{ $order->address }}</td>
            <td>{{ ($order->price)/100 }}</td>
            <td>{!! ($order->payment_status == "Failed") ? "<p
                    style='background: #ff000047;color: black;display: flex;justify-content: center;border-radius: 10px;font-weight: 600;'>
                    Failed</p>" : (($order->payment_status == "created") ? "<p
                    style='background: #f6e84e6e;color: black;display: flex;justify-content: center;border-radius: 10px;font-weight: 600;'>
                    Cancled</p>" : "<p
                    style='background:#00800033; color:black; display: flex;justify-content: center;border-radius: 10px;font-weight: 600;'>
                    Paid</p>") !!}</td>

            <td>{{ $order->created_at }}</td>
            <td>
                <div class="actions">
                    <a href="javascript:void(0)" onclick="getOrderItems('{{$order->unique_Id}}')">
                        <div id=""><i class="mdi mdi-eye"></i> View Order</div>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
            </div>
            <div class="modal-body">
                <table id="dataTable" class="mdl-data-table display wrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Qty</th>
                            <th>Attribute</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="orderItems">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModel()">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
function getOrderItems(order_id) {
    // alert(order_id);
    $('#exampleModal').modal('show'); // Show the modal
    $('#modalTitle').html("Order Id: " + order_id);
    $.ajax({
        url: "{{ route('admin.orderItems', ['order_id' => ':order_id']) }}".replace(':order_id', order_id),
        type: 'GET',
        success: function(response) {
            console.log(response); // You can replace this with any other action
            if (response.status) {
                var tbody = document.getElementById('orderItems');
                tbody.innerHTML = ''; // Empty the content of the row
                response.orderItem.forEach(function(item, index) {


                    var row = document.createElement('tr');
                    var attributes = JSON.parse(item.attributes);

                    // Access the size and color properties
                    var size = attributes.size;
                    var color = attributes.color;
                    // Populate the table row with item data
                    row.innerHTML = `
                                <td>${index+1}</td>
                                <td>${item.product_name}</td>
                                <td><img src="${item.image}" alt="${item.product_name}" style="width: 100px;"></td>
                                <td>${item.qty}</td>
                                <td>Size: ${size}, Color: ${color}</td>
                                <td>${item.price}</td>

                            `;

                    // Append the table row to the tbody
                    tbody.appendChild(row);
                });
                // $("#success").html(response.message);     
            } else {
                alert("Something went wrong!");
            }
        },
        error: function(error) {
            console.log(error);
        },
    });

}

function closeModel() {
    $('#exampleModal').modal('hide'); // Show the modal
}
</script>
@endpush