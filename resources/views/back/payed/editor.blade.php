@extends('back.layout')
@section('content')
<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <form method="POST" action="{{route('admin.save.editor')}}">
        @csrf
    <div class="card-body">
      <h5 class="card-title">Pemberitahuan <span>Peserta</span></h5>
      <input type="hidden" name="key" value="{{$config->key}}">
      <textarea name="value" class="tinymce-editor">
        {{$config->value}}
       </textarea>
       @error("value")
           <small class="text-danger">Harap isi teks</small>
       @enderror
       <!-- button save -->
        <button class="btn btn-sm mt-3 btn-primary">Simpan Perubahan</button>
    </div>
    </form>


  </div>
</div>
@endsection
