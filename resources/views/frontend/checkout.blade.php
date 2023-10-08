@extends('frontend.layouts.templete')

@section('main_content')


     {{--  session message  --}}
        @if (session()->has('message'))
            <div class="alert alert-success " >
                {{session()->get('message')}}
            </div>
        @endif

        <h2 class="p-5">Place order and product</h2>

        <div class="container mb-3">
            <div class="row">

                <div class="col-lg-8">
                    <h3>Order place information --</h3>
                    <ul class="bg-light mt-3 p-5">
                        <li> Your Name: {{$shipping_address->first_name}}  {{$shipping_address->last_name}} </li>
                        <li> City Name:  {{$shipping_address->city_name}}   </li>
                        <li> Phone number:  {{$shipping_address->phone_number}}   </li>
                        <li> Postal code:  {{$shipping_address->postal_code}}   </li>

                    </ul>


                   <div class="col-lg-3 float-right mt-3">
                        <form action=" {{route('placeorder')}} " method="POST">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="Place Order">
                        </form>
                   </div>

                   <div class="col-lg-3 float-right mt-3">
                        <form action="" method="post">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Cancel Order">
                        </form>
                   </div>

                </div>


                <div class="col-lg-4">
                    <h3>Your Finals products Are --</h3>
                    <table class="table table-light rounded mt-3">
                        <thead>
                          <tr>

                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>

                          </tr>
                        </thead>
                        <tbody>

                            @php
                                $total = 0;
                            @endphp

                            @foreach ($items as $item )
                                <tr>
                                    @php
                                        $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');

                                    @endphp

                                    <th scope="row"> {{$product_name}} </th>
                                    <th scope="row"> {{$item->price}} </th>
                                    <th scope="row"> {{$item->quantity}} </th>

                                </tr>

                                @php
                                    $total = $total + $item->price;
                                @endphp


                            @endforeach

                            <tr >
                                <td></td>
                                <td>Total</td>
                                <td> {{$total}} </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



@endsection
