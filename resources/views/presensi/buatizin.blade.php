@extends('layouts.presensi')
@section('header')

<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Form Izin</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
@endsection
@section('content')
<div class="row" style="margin-top:70px">
    <div class="col">
        <form method="POST" action="/presensi/buatizin" id="frmIzin" autocomplete="off">
            @csrf
        <div class="form-group" style="margin-bottom: 10px;">
            <input type="text" id="tgl_izin" name="tgl_izin" class="form-control" placeholder="Tanggal">
        </div>        
        <div class="form-group">
          <select name="status" id="status" class="form-control">
            <option value="">Izin / Sakit</option>
            <option value="i">Izin</option>
            <option value="s">Sakit</option>
          </select>
        </div>
        <div class="form-group">
          <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control" placeholder="Keterangan"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary w-100">Kirim</button>
        </div>
      </form>
    </div>
  </div>
  
   
@endsection
@push('myscript')
<script>
    $(function() {
      $("#tgl_izin").datepicker({
        dateFormat: "dd/mm/yy"
      });

      $("#tgl_izin").change(function(e) {
    var tgl_izin = $(this).val();
    var tgl = $(this).val(); // Misal: "31/07/2025"
    var parts = tgl.split("/");
    var tgl_izin = parts[2] + "-" + parts[1] + "-" + parts[0]; // Jadi: "2025-07-31"

    $.ajax({
    type: 'POST',
    url: '/presensi/cekpengajuanizin',
    data: {
        _token: '{{ csrf_token() }}',
        tgl_izin: tgl_izin
    },
    cache: false,
    success: function(respond) {
        if (respond == 1) {
            Swal.fire({
                title: 'Oops !',
                text: 'Anda Sudah Melakukan Input Pengajuan Izin Pada Tanggal Tersebut !',
                icon: 'warning'
            }).then((result) => {
                $("#tgl_izin").val("");
            });
        }
    }
});


});


  
      $("#frmIzin").submit(function () {
        var tgl_izin = $("#tgl_izin").val();
        var status = $("#status").val();
        var keterangan = $("#keterangan").val();
  
        if (tgl_izin == "") {
            Swal.fire({
                    title: 'Oops !',
                    text: 'Tanggal harus diisi',
                    icon: 'warning'
                });
          return false;
        } else if (status == "") {
            Swal.fire({
                    title: 'Oops !',
                    text: 'Status harus diisi',
                    icon: 'warning'
                });
          return false;
        } else if (keterangan == "") {
            Swal.fire({
                    title: 'Oops !',
                    text: 'Keterangan harus diisi',
                    icon: 'warning'
                });
          return false;
        }
      });
    });
  </script>
@endpush