@extends('backend.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-secondary">Order Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body text-secondary">
                    <div class="row">
                        <form action="{{url('/admin/order/update/'.$order->id)}}" method="Post" class="form-control">
                            @csrf
                            <div class="col-md-6 card">
                                <div>
                                    <label for="invoiceId">Invoice Number</label>
                                    <input type="text" name="invoiceId" class="form-control"
                                        value="{{ $order->InvoiceId }}" readonly>
                                </div>
                                <div class="mt-3">
                                    <label for="c_name">Customer Name</label>
                                    <input type="text" class="form-control" name="c_name" value="{{ $order->c_name }}">
                                </div>
                                <div class="mt-3">
                                    <label for="c_phone">Customer Phone</label>
                                    <input type="text" class="form-control" name="c_phone" value="{{ $order->c_phone }}">
                                </div>
                                <div class="mt-3">
                                    <label for="c_email">Customer Email</label>
                                    <input type="text" class="form-control" name="c_email" value="{{ $order->email }}">
                                </div>
                                <div class="mt-3">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control">{{ $order->address }}</textarea>
                                </div>
                                <div class="mt-3">
                                    <label for="area">Area</label>
                                    @php
                                        if ($order->area == 80) {
                                            $location = 'Inside Dhaka';
                                        } else {
                                            $location = 'Outside Dhaka';
                                        }
                                    @endphp
                                    <input type="text" class="form-control" name="area" value="{{ $location }}">
                                </div>

                                <div class="mt-3">
                                    <label for="courier_name">Courier</label>
                                    <select name="courier_name" id="courier_name" class="form-control"
                                        onchange="otherCoutier()">
                                        <option selected disabled>Select Courier</option>
                                        <option value="steadfast"@if ($order->courier_name == "steadfast")
                                            selected
                                        @endif>Steadfast</option>
                                        <option value="others" @if ($order->courier_name !== "steadfast" && $order->courier_name !== null) 
                                            selected
                                        @endif>Others</option>
                                    </select>
                                </div>
                                @if ($order->courier_name !== "steadfast" && $order->courier_name !== null)
                                <div class="mt-3" id="others_courier">
                                    <label for="others_courier">Others Courier</label>
                                    <textarea name="others_courier" class="form-control">{{$order->courier_name }}</textarea>
                                </div>
                                @else
                                <div class="mt-3" style="display: none" id="others_courier">
                                    <label for="others_courier">Others Courier</label>
                                    <textarea name="others_courier" class="form-control">{{$order->courier_name }}</textarea>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6 card">
                                {{-- @foreach ( $order->orderdetalis as $detalis)
                                <img src="{{asset('backend/images/product/'.$detalis->product->image)}}" height="50" width="50">
                                {{$detalis->qty}}X{{$detalis->product->name}} <br>
                                @endforeach --}}

                                <div class="mt-3"> 
                                    <label for="price">Order Price</label>
                                    <input type="text" name="price" class="form-control" value="{{$order->price}}">
                                </div>
                                <button type="submit" class="btn btn-success mt-5">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        function otherCoutier() {
            let courierName = document.getElementById('courier_name').value;

            if (courierName == 'others') {
                document.getElementById('others_courier').style.display = 'inline';
            } else {
                document.getElementById('others_courier').style.display = 'none';
            }
        }
    </script>
@endpush
