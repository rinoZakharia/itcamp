@extends("peserta.layout")
@section("content")
<div class="nk-block-head nk-block-head-sm mt-2">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title page-title">Daftar Absensi</h4>
            <div class="nk-block-des text-soft">
                <p>Daftar Absensi sejumlah {{count($data)}}</p>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
    <table class="nk-tb-list is-separate nk-tb-ulist">
        <thead>
            <tr class="nk-tb-item nk-tb-head">
                <th class="nk-tb-col"><span class="sub-text">Judul</span></th>
                <th class="nk-tb-col tb-col-mb text-center"><span class="sub-text">Deadline</span></th>
            </tr><!-- .nk-tb-item -->
        </thead>
        <tbody>
            @if(count($data) == 0)
            <tr class="nk-tb-item nk-tb-head">
                <td colspan="2" class="text-center"><span class="sub-text my-3  text-danger">Tidak ada tugas</span></td>
            </tr>
            @endif
            @foreach($data as $d)
            <tr class="nk-tb-item">
                <td class="nk-tb-col">
                    <a href="{{route('peserta.absen',['data'=>$d])}}" class="project-title">
                        <?php
                        // get initial two word
                        $words = explode(" ", $d->judul);
                        $acronym = "";
                        foreach ($words as $w) {
                            $acronym .= $w[0];
                        }
                        // substring to 2 word
                        $acronym = substr($acronym, 0, 2);
                        ?>
                        <div class="user-avatar sq bg-purple"><span>{{$acronym}}</span></div>
                        <div class="project-info">
                            <h6 class="title">{{$d->judul}}</h6>
                            <!-- <div class="d-block d-md-none mt-1">
                                <span class="badge badge-dim badge-warning"><em class="icon ni ni-clock"></em><span>{{$d->diffDeadline}}</span></span>
                            </div> -->
                        </div>

                    </a>
                </td>
                <td class="nk-tb-col tb-col-mb text-center">
                    <span class="badge badge-dim badge-warning"><em class="icon ni ni-clock"></em><span>{{$d->diffDeadline}}</span></span>
                </td>
            </tr><!-- .nk-tb-item -->
            @endforeach
        </tbody>
    </table><!-- .nk-tb-list -->
</div><!-- .nk-block -->
@endsection
