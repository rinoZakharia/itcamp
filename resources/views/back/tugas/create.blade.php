@extends('back.layout')
@section('content')
<div class="card">
  <div class="card-body col-lg-9">
  <h5 class="card-title">Insert <span>| Tugas & Materi</span></h5>

    <!-- General Form Elements -->
    <form action="/back/tugas/store" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
          <input required type="text" name="judul" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Tipe (Tugas / Materi)</label>
        <div class="col-sm-10">
          <select name="tipe" class="form-select" aria-label="Default select example">
            <option value="1">Tugas</option>
            <option value="2">Materi</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Materi (opsional)</label>
        <div class="col-sm-10">
          <textarea name="materi" class="tinymce-editor form-control"></textarea>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Url Video (Opsional)</label>
        <div class="col-sm-10">
          <input type="text" name="url" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">File (opsional)</label>
        <div class="col-sm-10">
          <input class="form-control" name="file" type="file" id="formFile">
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