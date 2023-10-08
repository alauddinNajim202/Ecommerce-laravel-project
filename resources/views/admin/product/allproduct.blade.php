@extends('layouts.template')
@section('page_title', 'list Product')


@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-info fw-light">Page/</span> List Of Products </h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header bg-warning text-primary text-center">Products details information </h5>

          {{--  session message  --}}
            @if (session()->has('message'))
                <div class="alert alert-success " >
                    {{session()->get('message')}}
                </div>
            @endif

        <div class="table-responsive text-nowrap">
          <table class="table table-hover table-striped text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Short Des</th>
                <th>Product Price</th>
                <th>Product img</th>
                <th>Quantity</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                @foreach ($products as $product )
                    <tr>
                        <td> {{$product->id}}  </td>
                        <td> {{$product->product_name}} </td>
                        <td> {{$product->product_short_des}} </td>
                        <td> {{$product->price}} </td>
                        <td>
                            <img src="{{asset($product->product_img)}}" alt="" srcset="" width="50px" height="40px">
                            <a class="btn btn-success text-dark btn-sm ms-1" href=" {{route('admin.imageproduct', $product->id )}} ">update image</a>

                        </td>
                        <td> {{$product->quantity}} </td>
                        <td>
                            <a class="btn btn-primary btn-sm ms-1" href="{{route('admin.editproduct', $product->id)}}">Edit</a>
                            <a class="btn btn-danger btn-sm ml-1" href="{{ route('admin.deleteproduct', $product->id) }} ">Delete</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
          </table>
        </div>
    </div>
      <!--/ Hoverable Table rows -->
</div>

@endsection

