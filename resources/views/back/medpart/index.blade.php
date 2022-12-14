@extends('back.layout')
@section('content')
<div class="col-12">
  <div class="card recent-sales overflow-auto">

    <div class="card-body">
      <h5 class="card-title">Tabel Data <span>| Media Partner</span></h5>
      <a class="btn btn-outline-primary mb-3" href="{{ url('/back/medpart/create') }}">Tambah data baru</a>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Url</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1 ?>
          @foreach($data as $a)
          <tr>
            <th scope="row"><a href="#">{{$count;}}</a></th>
            <td>{{$a->namaMed}}</td>
            <td>{{$a->urlMed}}</td>
            <td class="text-primary"><a class="btn btn-outline-primary btn-sm" href="/back/medpart/{{$a->idMed}}/edit"><i class="bi bi-pen"></i></a></td>
            <td class="text-primary">
              <form action="/back/medpart/delete/{{$a->idMed}}/{{$a->gambarMed}}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
          <?php $count++ ?>
          @endforeach
        </tbody>
      </table>

    </div>

  </div>
</div>
@endsection