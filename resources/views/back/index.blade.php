@extends('back.layout')
@section('content')
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-6 col-md-6">
          <div class="card info-card sales-card">



            <div class="card-body">
              <h5 class="card-title">Terkonfirmasi</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$countBayar}}</h6>


                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Customers Card -->
        <div class="col-xxl-6 col-xl-12">

          <div class="card info-card customers-card">



            <div class="card-body">
              <h5 class="card-title">Peserta</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$countUser}}</h6>


                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->

    </div><!-- End Right side columns -->

  </div>
</section>
@endsection
