@extends('layouts.template')

@section('page_title', 'Order - pending ')

@section('content')


<h2 class="text-center mt-4"> Pending Order</h2>

<div class="container" style="height: auto">
    <div class="row  d-flex justify-content-center">
        <div class="col-lg-12">
            <table class="table table-light rounded mt-3">
                <thead>
                  <tr class = "text-center">
                    <th scope="col">User ID</th>
                    <th scope="col">Shipping Information</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Product quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>




                    @foreach ($pending_order as $pending_order )
                        <tr class="text-center">
                            <th scope="row"> {{$pending_order->id}} </th>
                            <th scope="row" class = "text-start">
                                <ul>
                                    <li>City : {{ $pending_order->Shipping_cityName}}</li>
                                    <li>Postal Code : {{ $pending_order->Shipping_postalcode}}</li>
                                    <li>Phone number : {{ $pending_order->Shipping_phoneNumber}}</li>

                                </ul>
                            </th>
                            <th scope="row"> {{$pending_order->product_id}} </th>
                            <th scope="row"> {{$pending_order->price}} </th>
                            <th  scope="row"> {{$pending_order->quantity}} </th>
                            <th  class="text-success"  scope="row"> {{$pending_order->status}} </th>
                            <th > <a class="btn btn-sm btn-info" href="">Confirm Order</a> </th>

                        </tr>

                    @endforeach



                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection

