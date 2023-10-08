@extends('frontend.layouts.templete')


@section('main_content')


<!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">

                  <div class="container mt-4">
                     <h1 class="fashion_taital">All Category</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-4 " >
                                    <div class="box_main bg-dark "  >
                                        <h4 class="shirt_text text-light"> {{$product->product_name}} </h4>
                                        <p class="price_text text-light ">Price  <span style="color: #0beb52;">Taka - {{$product->price}} </span></p>
                                        <div class="tshirt_img"><img src="{{$product->product_img}}"></div>
                                        <div class="btn_main">
                                            <div class="buy_bt text-light ">
                                                <form action=" {{route('addproducttocart', $product->id)}} " method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$product->id}}" name="product_id" >
                                                    <input type="hidden" value="{{$product->price}}" name="price" >
                                                    <input type="hidden" value="1" name="quantity" >
                                                    <input class="btn btn-warning"  type="submit" value="Buy Now">
                                              </form>
                                            </div>
                                            <div class="seemore_bt text-light"><a class="text-light" href="{{ route('singleproduct', [$product->id, $product->slug])}}">See More</a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                     </div>

               </div>



         </div>
      </div>
      <!-- fashion section end -->



@endsection
