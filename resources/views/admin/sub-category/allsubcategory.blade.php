@extends('layouts.template')

@section('page_title', 'list sub category')

@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-info fw-light">Page/</span> List Of Sub category </h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header text-center bg-secondary">Sub category details information </h5>
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
                <th>Sub category </th>
                <th>Category </th>
                <th>Product </th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                @foreach ($subcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->id}}</td>
                        <td> {{$subcategory->subcategory_name}} </td>
                        <td> {{$subcategory->category_name}} </td>
                        <td> {{$subcategory->product_count}} </td>
                        <td>
                            <a class="btn btn-primary btn-sm ms-1" href="{{ route('admin.editsubcategory', $subcategory->id ) }}">Edit</a>
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.deletesubcategory', $subcategory->id) }}">Delete</a>
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

