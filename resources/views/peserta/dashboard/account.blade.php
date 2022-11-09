@extends("peserta.layout")
@section("content")
<div class="nk-block">
    <div class="card">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Data Diri</h4>
                        <div class="nk-block-des">
                            <p>Personalisasi data diri anda</p>
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="data-head mb-2">
                    <h6 class="overline-title">Akunku</h6>
                </div>
                <form method="POST" action="{{route("peserta.change.account")}}">
                    @csrf
                    <div class="row mx-1">
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label class="form-label" for="nama">Nama</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="nama" class="form-control form-control-lg" id="nama" placeholder="Masukan Nama anda" value="{{$user->nama}}">
                                </div>
                                @error('nama')
                                <small class="text-danger mt-2">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label class="form-label" for="instansi">Instansi</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control form-control-lg" id="instansi" name="instansi" placeholder="Masukan Instansi Anda" value="{{$user->instansi}}">
                                </div>
                                @error('instansi')
                                <small class="text-danger mt-2">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>

                        <div class=" col-md-6">
                            <div class="preview-block mt-3">
                                <span class="form-label mb-5">Jenis Kelamin</span>
                                <div class="g-4 align-center flex-wrap pt-2">
                                    <div class="g">
                                        <div class="custom-control custom-control-lg custom-radio">
                                            <input type="radio" value="Laki-laki" class="custom-control-input" name="kelamin" @if($user->kelamin == "Laki-laki")
                                            checked="checked"
                                            @endif id="customRadio7">
                                            <label class="custom-control-label" for="customRadio7">Pria</label>
                                        </div>
                                    </div>
                                    <div class="g">
                                        <div class="custom-control custom-control-lg custom-radio">
                                            <input type="radio" value="Perempuan" class="custom-control-input" @if($user->kelamin == "Perempuan")
                                            checked="checked"
                                            @endif
                                            name="kelamin" id="customRadio6">
                                            <label class="custom-control-label" for="customRadio6">Wanita</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label class="form-label" for="telp">Nomor Telepon <small>(Opsional)</small></label>
                                <div class="form-control-wrap">
                                    <input value="{{$user->telp}}" name="telp" type="text" class="form-control form-control-lg" id="telp" placeholder="Input placeholder">
                                </div>
                                @error('telp')
                                <small class="text-danger mt-2">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- make button save -->
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Ubah Profil</button>
                            </div>
                        </div>

                    </div><!-- data-list -->
                </form>
                <div class="data-head mt-4">
                    <h6 class="overline-title">Ganti Password</h6>
                </div>
                <form action="{{route('peserta.change.password')}}" method="POST">
                    @csrf
                    <div class="row mx-1">
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <div class="form-label-group">
                                    <label class="form-label" for="new_password">Password Baru</label>
                                </div>
                                <div class="form-control-wrap">
                                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="new_password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" class="form-control form-control-lg" name="new_password" id="new_password" placeholder="Masukan password baru anda">
                                </div>
                                @error('new_password')
                                <small class="text-danger mt-2">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div><!-- .nk-block -->
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <div class="form-label-group">
                                    <label class="form-label" for="confirm_password">Konfirmasi Password</label>
                                </div>
                                <div class="form-control-wrap">
                                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="confirm_password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" class="form-control form-control-lg" name="confirm_password" id="confirm_password" placeholder="Masukan ulang password baru anda">
                                </div>
                                @error('confirm_password')
                                <small class="text-danger mt-2">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div><!-- .nk-block -->
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <div class="form-label-group">
                                    <label class="form-label" for="old_password">Password Lama</label>
                                </div>
                                <div class="form-control-wrap">
                                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="old_password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" class="form-control form-control-lg" name="old_password" id="old_password" placeholder="Masukan password lama anda">
                                </div>
                                @error('old_password')
                                <small class="text-danger mt-2">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div><!-- .nk-block -->
                        <div class="col-md-12">
                            <!-- make button save -->
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
