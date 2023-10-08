@extends('frontend.layouts.templete')

@section('main_content')
    <h1 class="text-center mt-5"> Item Order Details </h1>

    {{--  session message  --}}
    @if (session()->has('message'))
        <div class="alert alert-success " >
            {{session()->get('message')}}
        </div>
    @endif

    <div class="container" style="height: auto">
        <div class="row text-center d-flex justify-content-center">
            <div class="col-lg-10">
                <table class="table table-light rounded mt-3">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>



                        @php
                            $total = 0;
                        @endphp

                        @foreach ($Items as $item )
                            <tr>
                                @php
                                    $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');
                                    $product_img = App\Models\Product::where('id',$item->product_id)->value('product_img');
                                @endphp
                                <th scope="row"> {{$item->id}} </th>
                                <th scope="row"> {{$product_name}} </th>
                                <th scope="row"> <img src="{{asset($product_img)}}" style="height: 50px" > </th>
                                <th scope="row"> {{$item->price}} </th>
                                <th scope="row"> {{$item->quantity}} </th>
                                <th scope="row"> <a class="btn btn-danger" href=" {{route('removeItem', $item->id)}} ">Remove </a> </th>

                            </tr>

                            @php
                                $total = $total + $item->price;
                            @endphp


                        @endforeach

                        <tr >
                            <td></td>

                            <td></td>
                            <td>Total</td>
                            <td> {{$total}} </td>
                            <td></td>
                            @if ($total <= 0)
                                <td> <a class="btn btn-success disabled" href="">Checkout Now</a> </td>
                            @else
                                <td> <a class="btn btn-success " href=" {{route('shippingaddress')}} ">Checkout Now</a> </td>
                            @endif
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
