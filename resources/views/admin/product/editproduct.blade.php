@extends('layouts.template')
@section('page_title', 'Edit Product')


@section('content')



<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-info fw-light">Page/</span> Edit Product </h4>
    <div class="col-xxl">
        <div class="card mb-4  text-light">

          <div class="card-header bg-dark mb-4 d-flex align-items-center justify-content-center">
            <h5 class="mb-0 text-success text-center ">Edit product</h5>
          </div>

          <div class="card-body">
            <form action="{{ route('admin.updateproduct')}}" method="POST" enctype="multipart/form-data" >
                @csrf

                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="product_name">Product Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{$product->product_name}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="price">Product Price</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="quantity">Product Quantity</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="product_short_des">Product short description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="product_short_des" name="product_short_des" rows="3">{{$product->product_short_des}} </textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="product_long_des">Product long description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="product_long_des" name="product_long_des" rows="3">{{$product->product_long_des}}  </textarea>
                    </div>
                </div>


              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
</div>



@endsection

