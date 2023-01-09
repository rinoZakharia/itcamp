@extends('back.layout')
@section('content')
<div class="card">
  <div class="card-body col-lg-6">
  <h5 class="card-title">Edit <span>| Absen</span></h5>

    <!-- General Form Elements -->
    <form action="{{route("admin.absen.update",["absensi"=>$data])}}" method="POST">
      @method("put")
      @csrf
      <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Judul Absensi</label>
        <div class="col-sm-9">
          <input required type="text" name="judul" value="{{$data->judul}}" class="form-control" autocomplete="off">
        </div>
      </div>
      <?php
      $mulai=date_create($data->mulai);
      $selesai=date_create($data->selesai);
      ?>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Mulai</label>
        <div class="col-sm-9">
          <input required type="datetime-local" value="{{ date_format($mulai,'Y-m-d').'T'.date_format($mulai,'H:i') }}" name="mulai" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Selesai</label>
        <div class="col-sm-9">
          <input required type="datetime-local" value="{{ date_format($selesai,'Y-m-d').'T'.date_format($selesai,'H:i') }}" name="selesai" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Submit Form</button>
        </div>
      </div>

    </form><!-- End General Form Elements -->

  </div>
</div>
@endsection
