@extends('back.layout')
@section('content')
<div class="card">
  <div class="card-body col-lg-9">
  <h5 class="card-title">Edit <span>| <?php if($data->tipe == 1){echo 'Tugas';} else{echo 'Materi';} ?></span></h5>
    @if (session('errorSheet'))
    <div class="alert alert-danger my-2">
        {{ session('errorSheet') }}
    </div>
    @endif
    <!-- General Form Elements -->
    <form action="/back/tugas/update/{{$data->idTugas}}/<?php if($data->file == null){echo "kosong";}else{echo $data->file;}  ?>" method="POST" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
          <input required type="text" value="{{ $data->judul }}" name="judul" class="form-control" autocomplete="off">
        </div>
      </div>
      <input type="hidden" name="tipe" value="{{ $data->tipe }}">
      @if($data->tipe == 1)
      <?php
      $date=date_create($data->deadline);
      ?>
      <div class="row mb-3" id="deadline">
        <label for="inputText" class="col-sm-2 col-form-label">Deadline</label>
        <div class="col-sm-10">
            <input type="datetime-local" value={{ date_format($date,'Y-m-d').'T'.date_format($date,'H:i') }} name="deadline" class="form-control" autocomplete="off">
        </div>
    </div>
      @endif
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Materi (opsional)</label>
        <div class="col-sm-10">
          <textarea name="materi" class="tinymce-editor form-control">{{ $data->materi }}</textarea>
        </div>
      </div>
      @if($data->tipe == 1)
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">ID Spreadsheet</label>
        <div class="col-sm-10">
          <input type="text" name="url" value="{{ $data->url }}" class="form-control" autocomplete="off">
        </div>
      </div>
      @endif
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
