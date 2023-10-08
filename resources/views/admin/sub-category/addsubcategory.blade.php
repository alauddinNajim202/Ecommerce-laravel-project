@extends('layouts.template')

@section('page_title', 'Add Sub category')

@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-info fw-light">Page/</span> Add sub category </h4>
    <div class="col-xxl">
        <div class="card mb-4  text-light">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0 text-success ">Add new sub category</h5>
            <small class="text-muted float-end">input information</small>
          </div>
                @if ($errors->any())
                <div class="alert alert-danger ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </ul>
                    </div>
                @endif

          <div class="card-body">
            <form action=" {{route('admin.storesubcategory')}} " method="POST">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 text-warning col-form-label" for="subcategory_name">Sub Category Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="subcategory_name" id="subcategory_name" placeholder="Sub category Name" />
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-2 text-warning col-form-label" for="category_id">Category Name</label>
                    <div class="col-sm-10">

                        <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                            <option selected> <strong>select Category</strong> </option>
                            @foreach ($category as $category )
                                <option value="{{$category->id }}">{{ $category->category_name }}</option>
                            @endforeach

                        </select>

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

