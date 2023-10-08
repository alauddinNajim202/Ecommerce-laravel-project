@extends('frontend.layouts.templete')

@section('main_content')


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <style>

/*****************globals*************/
body {
    font-family: 'open sans';
    overflow-x: hidden; }

  img {
    max-width: 100%; }

  .preview {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
        -ms-flex-direction: column;
            flex-direction: column; }
    @media screen and (max-width: 996px) {
      .preview {
        margin-bottom: 20px; } }

  .preview-pic {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
            flex-grow: 1; }

  .preview-thumbnail.nav-tabs {
    border: none;
    margin-top: 15px; }
    .preview-thumbnail.nav-tabs li {
      width: 18%;
      margin-right: 2.5%; }
      .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block; }
      .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0; }
      .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0; }

  .tab-content {
    overflow: hidden; }
    .tab-content img {
      width: 100%;
      -webkit-animation-name: opacity;
              animation-name: opacity;
      -webkit-animation-duration: .3s;
              animation-duration: .3s; }

  .card {
    margin-top: 50px;
    background: #eee;
    padding: 3em;
    line-height: 1.5em; }

  @media screen and (min-width: 997px) {
    .wrapper {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex; } }

  .details {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
        -ms-flex-direction: column;
            flex-direction: column; }

  .colors {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
            flex-grow: 1; }

  .product-title, .price, .sizes, .colors {
    text-transform: UPPERCASE;
    font-weight: bold; }

  .checked, .price span {
    color: #ff9f1a; }

  .product-title, .rating, .product-description, .price, .vote, .sizes {
    margin-bottom: 15px; }

  .product-title {
    margin-top: 0; }

  .size {
    margin-right: 10px; }
    .size:first-of-type {
      margin-left: 40px; }

  .color {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
    height: 2em;
    width: 2em;
    border-radius: 2px; }
    .color:first-of-type {
      margin-left: 20px; }

  .add-to-cart, .like {
    background: #ff9f1a;
    padding: 1.2em 1.5em;
    border: none;
    text-transform: UPPERCASE;
    font-weight: bold;
    color: #fff;
    -webkit-transition: background .3s ease;
            transition: background .3s ease; }
    .add-to-cart:hover, .like:hover {
      background: #b36800;
      color: #fff; }

  .not-available {
    text-align: center;
    line-height: 2em; }
    .not-available:before {
      font-family: fontawesome;
      content: "\f00d";
      color: #fff; }

  .orange {
    background: #ff9f1a; }

  .green {
    background: #85ad00; }

  .blue {
    background: #0076ad; }

  .tooltip-inner {
    padding: 1.3em; }

  @-webkit-keyframes opacity {
    0% {
      opacity: 0;
      -webkit-transform: scale(3);
              transform: scale(3); }
    100% {
      opacity: 1;
      -webkit-transform: scale(1);
              transform: scale(1); } }

  @keyframes opacity {
    0% {
      opacity: 0;
      -webkit-transform: scale(3);
              transform: scale(3); }
    100% {
      opacity: 1;
      -webkit-transform: scale(1);
              transform: scale(1); } }
    .preview-pic img{
        width:420px;
        height:350px;
    }

    .card{
        box-shadow : 5px 5px 4px 3px black;
    }

    .card:hover{
        box-shadow : 5px 5px 4px 3px rgb(42, 223, 106);
    }
    .header strong{
        box-shadow :  0px 4px rgb(42, 223, 106);
    }
    </style>

  </head>

  <body>

	<div class="container">

        <div class="text-center text-dark mb-4">
            <h2 class="display-3 header" > <strong>Product Details</strong> </h4>
        </div>

		<div class="card mb-5">
			<div class="container-fliud mt-2">
				<div class="wrapper row">
					<div class="preview col-md-6">

						<div class="preview-pic tab-content">
						  <div class="tab-pane active text-center" id="pic-1"><img src="{{asset($products->product_img)}}"  /></div>
						  <div class="tab-pane" id="pic-2"><img src="{{asset($products->product_img)}}" /></div>
						  <div class="tab-pane" id="pic-3"><img src="{{asset($products->product_img)}}" /></div>
						  <div class="tab-pane" id="pic-4"><img src="{{asset($products->product_img)}}" /></div>
						  <div class="tab-pane" id="pic-5"><img src="{{asset($products->product_img)}}" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src=" {{asset($products->product_img)}} " /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src=" {{asset($products->product_img)}} " /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src=" {{asset($products->product_img)}} " /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src=" {{asset($products->product_img)}} " /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src=" {{asset($products->product_img)}} " /></a></li>
						</ul>

					</div>
					<div class="details col-md-6">
						<h3 class="product-title"> {{$products->product_name}} </h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description"> {{$products->product_long_des}} </p>
						<h4 class="price">current price: <span> {{$products->price}} </span></h4>
						<p class="vote"><strong>Availabe Quantity : </strong> <strong> {{$products->quantity}}  </strong> </p>

						<h5 class="colors">Product Category:	{{$products->product_category_name}}	</h5>
						<div class="action">


              <form action=" {{route('addproducttocart')}} " method="post">
                    @csrf
                    <input type="hidden" value="{{$products->id}}" name="product_id" >
                    <input type="hidden" value="{{$products->price}}" name="price" >
                    <input type="hidden" value="1" name="quantity" >
                    <div class="form-group">
                    <label for="quantity">How many?</label>
                    <input type="number" value="quantity" name="quantity" min="1"  placeholder="1">
                    </div>

                    <input class="btn btn-warning"  type="submit" value="Add To Cart">
              </form>


						</div>
					</div>
				</div>
			</div>
		</div>

    <hr>

        <div class="text-dark mb-4">
            <h2 class=" " > <strong>Related category items ... </strong> </h4>
        </div>

        <div class="container-fluid mb-5 ">

            <div class="fashion_section_2">

                <div class="row">
                    @foreach ($related_product as $product)
                        <div class="col-lg-4 col-sm-4  " >
                            <div class="box_main bg-dark card1 ">
                                 <h4 class="shirt_text text-danger"> {{$product->product_name}} </h4>
                                 <p class="price_text text-light ">Price :  <span style="color: #0beb52;"> {{$product->price}} /= </span></p>
                                 <div class="tshirt_img"><img src="{{asset($product->product_img)}}" >
                                     <h5 class="mt-3 text-light "> {{$product->product_short_des }}</h5>
                                 </div>

                                <div class="btn_main ">
                                    <div class="buy_bt text-light ">
                                        <form action=" {{route('addproducttocart')}} " method="post">
                                            @csrf
                                            <input type="hidden" value="{{$product->id}}" name="product_id" >
                                            <input type="hidden" value="{{$product->price}}" name="price" >
                                            <input type="hidden" value="1" name="quantity" >
                                            <input class="btn btn-warning"  type="submit" value="Add To Cart">
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
        </div>

	</div>
  </body>
</html>

@endsection
