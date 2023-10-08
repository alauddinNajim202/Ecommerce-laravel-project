@extends('frontend.layouts.user_profile_templete')

@section('profile_content')

    {{--  session message  --}}
    @if (session()->has('message'))
    <div class="alert alert-success " >
        {{session()->get('message')}}
    </div>
    @endif


    <div class="container" style="height: auto">
        <div class="row text-center d-flex justify-content-center">
            <div class="col-lg-10">
                <table class="table table-light rounded mt-3">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>




                        @foreach ($pending_order as $pending_order )
                            <tr>
                                <th scope="row"> {{$pending_order->id}} </th>
                                <th scope="row"> {{$pending_order->price}} </th>
                                <th scope="row"> {{$pending_order->quantity}} </th>
                                <th class="text-success" scope="row"> {{$pending_order->status}} </th>

                            </tr>

                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
