@extends("peserta.layout")
@section("content")
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title page-title">Tugas dan Materi</h4>
                        <div class="nk-block-des text-soft">
                            <p>Tugas dan Materimu sejumlah {{count($data)}}</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <table class="nk-tb-list is-separate nk-tb-ulist">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col text-center"><span class="sub-text">Judul</span></th>

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
                                <a href="{{route('peserta.task',['id'=>$d->idTugas])}}" class="project-title">
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
                                    </div>
                                </a>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                @if($d->tipe==1)
                                        @if(!isset($d->collect))
                                        <span class="badge badge-dim badge-warning"><em class="icon ni ni-clock"></em><span>{{$d->diffDeadline}}</span></span>
                                        @elseif($d->collect < $d->deadline)
                                        <span class="badge badge-dim badge-success"><em class="icon ni ni-check-circle"></em><span>Dikumpulkan</span></span>
                                        @else
                                        <span class="badge badge-dim badge-danger"><em class="icon ni ni-cross-circle"></em><span>Terlambat</span></span>
                                        @endif
                                @else
                                <span class="badge badge-dim badge-primary"><em class="icon ni ni-check-circle"></em><span>None</span></span>
                                @endif
                            </td>
                        </tr><!-- .nk-tb-item -->
                        @endforeach
                    </tbody>
                </table><!-- .nk-tb-list -->

            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@endsection
