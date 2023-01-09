@extends('back.layout')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Tabel Data <span>| Absen</span></h5>
            <a class="btn btn-outline-primary mb-3" href="{{ route('admin.absen.create') }}">Tambah data baru</a>

            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Mulai</th>
                        <th scope="col">Selesai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ?>
                    @foreach($data as $a)
                    <tr>
                        <th scope="row"><a href="#">{{$count;}}</a></th>
                        <td>{{$a->judul}}</td>
                        <td>{{$a->mulai}}</td>
                        <td>{{$a->selesai}}</td>
                        <td class="text-primary">
                            <a class="btn btn-outline-primary btn-sm" href='{{route("admin.absen.edit",["data"=>$a])}}'><i class="bi bi-info-circle"></i></a>
                            <a class="btn btn-outline-primary btn-sm" href='{{route("admin.absen.edit",["data"=>$a])}}'><i class="bi bi-pen"></i></a>

                            <form class="d-inline" action='{{route("admin.absen.destroy",["absensi"=>$a])}}' method="post">
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
