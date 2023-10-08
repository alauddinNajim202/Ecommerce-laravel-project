@extends('layouts.template')
@section('page_title', 'New Image || Product ')


@section('content')



<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-info fw-light">Page/</span> New Product Image  </h4>
    <div class="col-xxl">
        <div class="card mb-4  text-light">

          <div class="card-header bg-dark mb-4 d-flex align-items-center justify-content-center">
            <h5 class="mb-0 text-success text-center ">Update product image </h5>
          </div>

          <div class="card-body">
            <form action="{{ route('admin.updateproductimage')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="row mb-3">
                    <label class="col-sm-2 text-danger col-form-label" for="product_img">Previous Image</label>
                    <div class="col-sm-10">
                        <img src="{{asset($product->product_img)}}" alt="" srcset="" width="400px">
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
                  <button type="submit" class="btn btn-primary">Update New Image</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
</div>



@endsection

