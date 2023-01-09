@extends('back.layout')
@section('content')
<div class="card">
  <div class="card-body col-lg-6">
  <h5 class="card-title">Insert <span>| Absen</span></h5>

    <!-- General Form Elements -->
    <form action="{{route('admin.absen.store')}}" method="POST">
      @csrf
      <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Judul Absensi</label>
        <div class="col-sm-9">
          <input required type="text" name="judul" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Mulai</label>
        <div class="col-sm-9">
          <input required type="datetime-local" name="mulai" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Selesai</label>
        <div class="col-sm-9">
          <input required type="datetime-local" name="selesai" class="form-control" autocomplete="off">
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
<script>
    const mulaiInput = document.querySelector('input[name="mulai"]');
    const selesaiInput = document.querySelector('input[name="selesai"]');
    const setNow = () => {
        const now = new Date();
        const year = now.getFullYear();
        let month = now.getMonth() + 1;
        if (month < 10) {
            month = '0' + month;
        }
        let day = now.getDate();
        if (day < 10) {
            day = '0' + day;
        }
        let hour = now.getHours();
        let hourSampai = hour+4
        if (hour < 10) {
            hour = '0' + hour;
        }
        if (hourSampai < 10) {
            hourSampai = '0' + hourSampai;
        }
        let minute = now.getMinutes();
        if (minute < 10) {
            minute = '0' + minute;
        }
        const nowString = `${year}-${month}-${day}T${hour}:${minute}`;
        const nowString2 = `${year}-${month}-${day}T${hourSampai}:${minute}`;
        mulaiInput.value = nowString;
        selesaiInput.value =nowString2;
    }
    setNow()
</script>
@endsection
