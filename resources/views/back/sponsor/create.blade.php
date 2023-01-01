@extends('back.layout')
@section('content')
<div class="card">
  <div class="card-body col-lg-6">
  <h5 class="card-title">Insert <span>| Sponsor</span></h5>

    <!-- General Form Elements -->
    <form action="/back/sponsor/store" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Nama Sponsor</label>
        <div class="col-sm-9">
          <input required type="text" name="namaSponsor" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Url Sponsor</label>
        <div class="col-sm-9">
          <input required type="text" name="urlSponsor" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Ukuran Gambar</label>
        <div class="col-sm-9">
          <select name="ukuranSponsor" class="form-select" aria-label="Default select example">
            <option value="col-3">Small (s)</option>
            <option value="col-4">Medium (m)</option>
            <option value="col-6">Large (l)</option>
            <option value="col-12">Extra Large (xl)</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-3 col-form-label">Upload gambar</label>
        <div class="col-sm-9">
          <input required class="form-control" name="gambarSponsor" type="file" id="formFile">
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
