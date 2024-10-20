@extends('backend.master')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title text-secondary">Pending Order List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-secondary">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Invoice Number</th>
                  <th>Product</th>
                  <th>Customer Info</th>
                  <th>Customer Name</th>
                  <th>Order Status</th>
                  <th>Action</th>                
                </tr>
                </thead>
                <tbody>
                @foreach ($pendingOrders as $order)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$order->InvoiceId}}</td>
                  <td>
                    @foreach ( $order->orderdetalis as $detalis)
                    <img src="{{asset('backend/images/product/'.$detalis->product->image)}}" height="50" width="50">
                    {{$detalis->qty}}X{{$detalis->product->name}} <br>
                    @endforeach
                  </td>

                  <td>
                    Name: {{$order->c_name}} <br>
                    Phone: {{$order->c_phone}} <br>
                    Address: {{$order->c_address}} <br>
                  </td>
                  <td>{{$order->courier_name??"Not Selected"}}</td>
                  <td>{{$order->status}}</td>
                  <td>
                    <a href="{{url('/admin/order/status-cancelled/'.$order->id)}}" class="btn btn-danger">Cancel</a>
                    <a href="{{url('/admin/order/status-confirmed/'.$order->id)}}" class="btn btn-primary">Confirm</a>
                    <a href="{{url('/admin/order/status-delivered/'.$order->id)}}" class="btn btn-success">Delivered</a>
                    <a href="{{url('/admin/order/details/'.$order->id)}}" class="btn btn-info">Details</a>
                  </td>
                  
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</section>

@endsection

@push('script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush