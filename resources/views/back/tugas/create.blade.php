@extends('back.layout')
@section('content')
<div class="card">
  <div class="card-body col-lg-9">
  <h5 class="card-title">Insert <span>| Tugas & Materi</span></h5>

    <!-- General Form Elements -->
    <form action="/back/tugas/store" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
          <input required type="text" name="judul" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Tipe (Tugas / Materi)</label>
        <div class="col-sm-10">
          <select name="tipe" class="form-select" aria-label="Default select example">
            <option value="1">Tugas</option>
            <option value="2">Materi</option>
          </select>
        </div>
      </div>
    <div class="row mb-3" id="deadline">
        <label for="inputText" class="col-sm-2 col-form-label">Deadline</label>
        <div class="col-sm-10">
            <input type="datetime-local" name="deadline" class="form-control" autocomplete="off">
        </div>
    </div>
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Materi (opsional)</label>
        <div class="col-sm-10">
          <textarea name="materi" class="tinymce-editor form-control"></textarea>
        </div>
      </div>
      <div id="spreadsheet" class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">ID Spreadsheet</label>
        <div class="col-sm-10">
          <input type="text" name="url" class="form-control" autocomplete="off">
        </div>
      </div>
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
@section('script')
<script>
    const spinnerTipe = document.querySelector('select[name="tipe"]');
    const deadline = document.querySelector('#deadline');
    const deadlineInput = document.querySelector('input[name="deadline"]');
    const spreadsheet = document.querySelector('#spreadsheet');
    const inputSpreadsheet = document.querySelector('input[name="url"]');

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
        if (hour < 10) {
            hour = '0' + hour;
        }
        let minute = now.getMinutes();
        if (minute < 10) {
            minute = '0' + minute;
        }
        const nowString = `${year}-${month}-${day}T${hour}:${minute}`;
        deadlineInput.value = nowString;
    }
    setNow();
    spinnerTipe.addEventListener('change', function() {
        if (this.value == 1) {
            deadline.style.display = 'flex';
            spreadsheet.style.display = 'flex';
            // add require input spreadsheet
            inputSpreadsheet.setAttribute('required', 'required');
            setNow();
        } else {
            deadline.style.display = 'none';
            spreadsheet.style.display = 'none';
            // remove require input spreadsheet
            inputSpreadsheet.removeAttribute('required');
            setNow();
        }
    });
</script>
@endsection
