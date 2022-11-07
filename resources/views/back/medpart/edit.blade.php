@extends('back.layout')
@section('content')
<div class="card">
  <div class="card-body col-lg-6">
  <h5 class="card-title">Update <span>| Media Partner</span></h5>
    <!-- General Form Elements -->
    <form action="/back/medpart/update/{{$data->idMed}}/{{$data->gambarMed}}" method="POST" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="row mb-3">
        <div class="col-sm-12">
          <img src="{{ url('/storage/media/'.$data->gambarMed) }}" style="height: 150px;" alt="">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Nama Media</label>
        <div class="col-sm-9">
          <input required type="text" name="namaMed" class="form-control" value="{{$data->namaMed}}" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-3 col-form-label">Upload gambar</label>
        <div class="col-sm-9">
          <input class="form-control" name="gambarMed" type="file" id="formFile">
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