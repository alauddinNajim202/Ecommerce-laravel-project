@extends('layouts.template')

@section('page_title', 'Dashboard - E-commerce')
@section('content')


<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6 mt-4">
								<h1>Dashboard</h1>
							</div>
							<div class="col-sm-6">

							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-4 col-6">
								<div class="small-box p-3 card">
									<div class="inner">
										<h3> {{$category}} </h3>
										<p>Total category</p>
									</div>
									<div class="icon">
										<i class="ion ion-bag"></i>
									</div>

								</div>
							</div>

							<div class="col-lg-4 col-6">
								<div class="small-box  p-3 card">
									<div class="inner">
										<h3> {{$sub_category}} </h3>
										<p>Total sub-category</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>

								</div>
							</div>

							<div class="col-lg-4 col-6">
								<div class="small-box p-3 card">
									<div class="inner">
										<h3>{{ $product}}</h3>
										<p>Total product</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>

								</div>
							</div>
						</div>


                        <div class="row mt-4">
							<div class="col-lg-4 col-6">
								<div class="small-box p-3 card">
									<div class="inner">
										<h3> {{$order}} </h3>
										<p>Total Orders</p>
									</div>
									<div class="icon">
										<i class="ion ion-bag"></i>
									</div>

								</div>
							</div>

							<div class="col-lg-4 col-6">
								<div class="small-box  p-3 card">
									<div class="inner">
										<h3>{{$user}} </h3>
										<p>Total User</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>

								</div>
							</div>

							<div class="col-lg-4 col-6">
								<div class="small-box p-3 card">
									<div class="inner">
										<h3>${{$cart}} </h3>
										<p>Total Sale</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>

								</div>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->



@endsection

