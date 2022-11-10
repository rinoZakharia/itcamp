@extends('back.layout')
@section('content')
<div class="card">
  <div class="card-body col-lg-6">
  <h5 class="card-title">Update <span>| Sponsor</span></h5>
    <!-- General Form Elements -->
    <form action="/back/sponsor/update/{{$data->idSponsor}}/{{$data->gambarSponsor}}" method="POST" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="row mb-3">
        <div class="col-sm-12">
          <img src="{{ url('/uploads/sponsor/'.$data->gambarSponsor) }}" style="height: 150px;" alt="">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Nama Sponsor</label>
        <div class="col-sm-9">
          <input required type="text" name="namaSponsor" value="{{ $data->namaSponsor }}" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Ukuran Gambar</label>
        <div class="col-sm-9">
          <select name="ukuranSponsor" class="form-select" aria-label="Default select example">
            <option value="s" @if($data->ukuranSponsor == "s") selected @endif>Small (s)</option>
            <option value="m" @if($data->ukuranSponsor == "m") selected @endif>Medium (m)</option>
            <option value="l" @if($data->ukuranSponsor == "l") selected @endif>Large (l)</option>
            <option value="xl" @if($data->ukuranSponsor == "xl") selected @endif>Extra Large (xl)</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-3 col-form-label">Upload gambar</label>
        <div class="col-sm-9">
          <input class="form-control" name="gambarSponsor" type="file" id="formFile">
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