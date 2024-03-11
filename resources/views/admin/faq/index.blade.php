@extends('layouts.app')
@section('content')
@if(session('success'))
    
@endif
<style>
    .addMorePages{
        position: absolute;
        left: 50%;
        z-index:9999;
    }
</style>
<div class="addMorePages">
    <a href="{{route('faq.create')}}" class="btn btn-primary btn-sm">Add +</a>
</div>
<table id="dataTable"  class="mdl-data-table display wrap" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Question</th>
                <th>Answere</th>
                <th>Status</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $faq->question }}</td>
                    <td>{!! $faq->answere !!}</td>
                    <td >
                        @if($faq->is_active)
                        <a href="#" onclick="faqStatusUpdate({{$faq->id}})">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        @else
                        <a href="#" onclick="faqStatusUpdate({{$faq->id}})">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        @endif
                    </td>
                    <td>{{ $faq->created_at }}</td>
                    <td>{{ $faq->created_by }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('faq.edit',['id' => $faq->id]) }}">
                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                            </a>  
                            <a href="#" onclick="showDeleteConfirmation({{$faq->id}})">
                                <div id="inactive"><i class="mdi mdi-delete"></i></div>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $faqs->links() }}
@endsection
@push('scripts')
<script>
    function showDeleteConfirmation(categoryId) {
        Swal.fire({
            html: "<div class='title'><h2>Are you sure you wanted to delete<br>this category?</h2></div>",
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                popup: 'my-popup'
            },
            icon: "question",
            didOpen: (popup) => {
                popup.querySelector('.swal2-confirm').addEventListener('click', function() {
                    // Perform the delete action here, e.g., via AJAX
                    faqDestroy(categoryId);
                    Swal.close();
                });
                popup.querySelector('.swal2-cancel').addEventListener('click', function() {
                    Swal.close();
                });
            }
        });
    }
        function faqStatusUpdate (id) { 
            $("#error").hide();
            $.ajax({
                url: "{{ route('faq.status.update', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "FAQ has been Updated successfully!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }else{
                        alert("Something went wrong!");
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
        function faqDestroy(id){
            $("#error").hide();
            $.ajax({
                url: "{{ route('faq.destroy', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "Faq has been Deleted successfully!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }else{
                        alert("Something went wrong!");
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
</script>
@endpush