@extends("peserta.layout")
@section("content")
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Tugas dan Materi</h3>
                        <div class="nk-block-des text-soft">
                            <p>You have total 95 projects.</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <table class="nk-tb-list is-separate nk-tb-ulist">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">Judul</span></th>
                            <th class="nk-tb-col tb-col-xxl"><span class="sub-text">Status</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Deadline</span></th>

                        </tr><!-- .nk-tb-item -->
                    </thead>
                    <tbody>
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
                            <td class="nk-tb-col tb-col-xxl">
                                <span>Open</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="badge badge-dim badge-warning"><em class="icon ni ni-clock"></em><span>5 Days Left</span></span>
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
