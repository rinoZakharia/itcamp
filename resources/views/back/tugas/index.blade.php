@extends('back.layout')
@section('content')
<div class="col-12">
  <div class="card recent-sales overflow-auto">

    <div class="card-body">
      <h5 class="card-title">Tabel Data <span>| Tugas</span></h5>
      <a class="btn btn-outline-primary mb-3" href="{{ url('/back/tugas/create') }}">Tambah data baru</a>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Tipe</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1 ?>
          @foreach($data as $a)
          <tr>
            <th scope="row"><a href="#">{{$count;}}</a></th>
            <td>{{$a->judul}}</td>
            <td><?php if($a->tipe == 1){echo 'Tugas';} else{echo 'Materi';} ?></td>
            <td class="text-primary"><a class="btn btn-outline-primary btn-sm" href="/back/tugas/{{$a->idTugas}}/edit"><i class="bi bi-pen"></i></a></td>
            <td class="text-primary">
              <form action="/back/tugas/delete/{{$a->idTugas}}/<?php if($a->file == null){echo "kosong";}else{echo $a->file;}  ?>" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
              </form>
            </td>
            @if ($a->tipe == 1)
            <td><a class="btn btn-success btn-sm" href="{{ url('/back/penilaian/'.$a->idTugas) }}">Lihat Jawaban</a></td>
            @else
            <td><button disabled="disabled" class="btn btn-secondary btn-sm">None</button></td>
            @endif
          </tr>
          <?php $count++ ?>
          @endforeach
        </tbody>
      </table>

    </div>

  </div>
</div>
@endsection