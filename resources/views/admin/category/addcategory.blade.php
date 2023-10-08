@extends('layouts.template')
@section('page_title', 'Add category')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-info fw-light">Page/</span> Add category </h4>
    <div class="col-xxl">
        <div class="card mb-4 bg-secondary text-light">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0 text-success ">Add new category</h5>
            <small class="text-muted float-end">input information</small>
          </div>
          <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger ">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        </div>
                    @endif

            <form action=" {{ route('admin.storecategory') }} " method="POST">

                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 text-warning col-form-label" for="category_name">Category Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" />
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

