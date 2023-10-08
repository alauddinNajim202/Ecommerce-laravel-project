@extends('layouts.template')
@section('page_title', 'list  category')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-info fw-light">Page/</span> List Of category </h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header text-center bg-warning">Category details information </h5>


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
                <th>Category Name</th>
                <th>Sub-category </th>
                <th>Slug </th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                @foreach ($categorys as $category)
                    <tr>
                        <td> {{$category->id}} </td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->sub_category_count}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm " href="{{ route('admin.editcategory', $category->id) }}">Edit</a>
                            <a class="btn btn-danger btn-sm mx-2" href="{{ route('admin.deletecategory', $category->id)}} ">Delete</a>
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

