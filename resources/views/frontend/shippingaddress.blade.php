@extends('frontend.layouts.templete')

@section('main_content')

<h1 class="text-center my-3">Provide Your Shipping Address</h1>

<div class="container bg-info p-5 mb-4">

            <form action=" {{route('addshippingaddress')}} " method="POST">
                @csrf
                <div class="row d-flex justify-content-center text-light">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input required class="form-control" type="text" name="first_name" id="">
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone number</label>
                            <input required class="form-control" type="text" name="phone_number" id="">
                        </div>

                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input required class="form-control" type="text" name="postal_code" id="">
                        </div>

                        <div class="form-group mt-5">
                            <input required class="form-control btn btn-secondary " type="submit" value="NEXT" >
                        </div>

                    </div>

                    <div class="col-lg-5">
                            <div class="form-group">
                                <label  for="last_name">Last name</label>
                                <input required class="form-control" type="text" name="last_name" id="">
                            </div>
                            <div class="form-group">
                                <label for="city_name">City Name</label>
                                <input required class="form-control" type="text" name="city_name" id="">
                            </div>



                    </div>



                </div>


            </form>

</div>
@endsection
