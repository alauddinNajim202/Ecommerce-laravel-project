@extends('layouts.template')
@section('page_title', 'Add Product')


@section('content')



<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-info fw-light">Page/</span> Add Product </h4>
    <div class="col-xxl">
        <div class="card mb-4  text-light">

          <div class="card-header bg-dark mb-4 d-flex align-items-center justify-content-center">
            <h5 class="mb-0 text-success text-center ">Add new product</h5>
          </div>

          <div class="card-body">
            <form action="{{ route('admin.storeproduct')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="product_name">Product Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="price">Product Price</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price" placeholder="1200" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="quantity">Product Quantity</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="120" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="product_short_des">Product short description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="product_short_des" name="product_short_des" rows="3"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="product_long_des">Product long description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="product_long_des" name="product_long_des" rows="3"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="product_category_id">Product category name</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="product_category_id" name="product_category_id" aria-label="Default select example">
                            <option selected>Select Product Category</option>

                        @foreach ($categories as $category)
                            <option value=" {{$category->id}} ">{{$category->category_name}}</option>
                        @endforeach

                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="product_subcategory_id">Product sub category name</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="product_subcategory_id" name="product_subcategory_id" aria-label="Default select example">
                            <option selected>Select Product Sub Category </option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                            @endforeach


                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="product_img">Upload Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="product_img" name="product_img" />
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

