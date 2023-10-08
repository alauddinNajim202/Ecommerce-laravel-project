@extends('frontend.layouts.templete')

@section('main_content')
<div class="container mb-5">

    <div class=" ">
       <div class="row bg-light p-5 rounded">

               <div class="col-lg-4 col-sm-4 p-3 " >
                   <div>
                       <ul style="font-size: 20px;">
                        <li class="my-2"> <a  href=" {{ route('userprofile') }} ">Dashboard</a> </li>
                        <li class="my-2"> <a  href=" {{route('pendingorder')}} ">Order Loading</a> </li>
                        <li class="my-2"> <a  href="{{route('history')}} ">History</a> </li>
                        <li>              <a  href="">Log Out</a> </li>
                       </ul>
                   </div>
               </div>

               <div class="col-lg-8 col-sm-4  " >
                <div>
                     @yield('profile_content')
                </div>
            </div>

       </div>
    </div>
</div>
@endsection
