@extends('frontend.layouts.templete')

@section('main_content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <style>

    </style>

</head>
<body>

    <div class="container-fluid mb-5 ">
        <h1 class="fashion_taital mt-5"> {{$categories->category_name}} </h1>
        <div class="fashion_section_2">
           <div class="row">
               @foreach ($products as $product)
                   <div class="col-lg-4 col-sm-4  " >
                       <div class="box_main bg-dark card1 ">
                            <h4 class="shirt_text text-danger"> {{$product->product_name}} </h4>
                            <p class="price_text text-light ">Price :  <span style="color: #0beb52;"> {{$product->price}} /= </span></p>
                            <div class="tshirt_img"><img src="{{asset($product->product_img)}}" >
                                <h5 class="mt-3 text-light "> {{$product->product_short_des }}</h5>
                            </div>

                           <div class="btn_main ">
                                <div class="buy_bt text-light ">
                                    <form action=" {{route('addproducttocart', $product->id)}} " method="post">
                                        @csrf

                                         <input type="hidden" value="{{$product->id}}" name="product_id" >
                                            <input type="hidden" value="{{$product->price}}" name="price" >
                                            <input type="hidden" value="1" name="quantity" >
                                        <input class="btn btn-warning"  type="submit" value="Buy Now">
                                    </form>
                                </div>
                               <div class="seemore_bt text-light "><a class="text-light" href="{{ route('singleproduct', [$product->id, $product->slug])}} ">See More</a></div>
                           </div>
                       </div>
                   </div>
               @endforeach
           </div>
        </div>
    </div>

</body>
</html>
@endsection
