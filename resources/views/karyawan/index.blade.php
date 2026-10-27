@extends('layouts.admin.tabler')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Data Karyawan
                    </h2>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl"> 
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                                <div class="col-12">
                                    <div class="container">
                                    <form action="/panel/karyawan" method="GET">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" value="{{ Request('nama_karyawan') }}">
                                            </div>
                                            <div class="col-5">
                                                <select name="kode_dept" class="form-control">
                                                    <option value="">Departemen</option>
                                                    @foreach ( $departemen as $d)
                                                    <option {{ request('kode_dept') == $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2 md-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="icon icon-tabler icon-tabler-search">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                        <path d="M21 21l-6 -6" />
                                                    </svg>
                                                    Cari
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                     
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @if (Session::get('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                    @endif
                                    @if (Session::get('warning'))
                                        <div class="alert alert-warning">
                                            {{ Session::get('warning') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="row" mt-2>
                                    <div class="col-12 mb-3">
                                        <a href="#" class="btn btn-primary" id="btnTambahkaryawan">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 5l0 14"></path>
                                                <path d="M5 12l14 0"></path>
                                            </svg>
                                            Tambah Data</a>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-12">
                                              <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center">Nomor Hp</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Divisi</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawan as $d)
                                        @php
                                        $path = Storage::url('uploads/karyawan/' . $d->foto);
                                        @endphp
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration + $karyawan->firstItem() - 1 }}</td>
                                                <td>{{ $d->nik }}</td>
                                                <td>{{ $d->nama_lengkap }}</td>
                                                <td>{{ $d->jabatan }}</td>
                                                <td>{{ $d->no_hp }}</td>
                                                <td>
                                                    @if (empty($d->foto))
                                                    <img src="{{ asset('assets/nophoto.png') }}" class="avatar" alt="">
                                                    @else
                                                    <img src="{{url($path)}}" class="avatar" alt="">
                                                    @endif
                                                    
                                                </td>
                                                <td>{{ $d->nama_dept }}</td>
        
                                                                    <div style="display: flex; justify-content: center; gap: 6px;">
                                                                        <td class="text-center align-middle" style="width: 100px;">
                
                                                                                
                                                                                    <div class="d-flex justify-content-center gap-1">
                                                                                        {{-- Tombol Edit --}}
                                                                                        <button type="button" class="btn btn-info btn-sm edit d-flex align-items-center justify-content-center"
                                                                                            nik="{{ $d->nik }}" style="width: 30px; height: 30px; padding: 0;">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                                                                fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                                                                class="icon icon-tabler icon-tabler-edit">
                                                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                                                                <path d="M16 5l3 3" />
                                                                                            </svg>
                                                                                        </button>
                                                                                
                                                                                        {{-- Tombol Delete --}}
                                                                                        <form action="/panel/karyawan/{{ $d->nik }}/delete" method="POST" style="display:inline;">
                                                                                            @csrf
                                                                                            <button type="submit" class="btn btn-danger btn-sm delete-confirm d-flex align-items-center justify-content-center"
                                                                                                style="width: 30px; height: 30px; padding: 0;">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                                                                    fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                                                                    class="icon icon-tabler icon-tabler-trash">
                                                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                                                    <path d="M4 7l16 0"></path>
                                                                                                    <path d="M10 11l0 6"></path>
                                                                                                    <path d="M14 11l0 6"></path>
                                                                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                                                                </svg>
                                                                                            </button>
                                                                                        </form>
                                                                                    </div>
                                                                            
                                                                        
                    
                                                    </div>
                                             
                                                
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $karyawan->links('vendor.pagination.bootstrap-5') }}
                            </div>
                                    </div>
                                </div>    
                      
                        </div>
                        {{-- Modal Input --}}
                        <div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Karyawan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/panel/karyawan/store" method="POST" id="frmKaryawan" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    
                                                    {{-- NIK --}}
                                                    <div class="input-icon mb-3">
                                                        <span class="input-icon-addon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-id">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                                                <path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                <path d="M15 8l2 0" />
                                                                <path d="M15 12l2 0" />
                                                                <path d="M7 16l10 0" />
                                                            </svg>
                                                        </span>
                                                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                                                    </div>
                                    
                                                    {{-- Nama Lengkap --}}
                                                    <div class="input-icon mb-3">
                                                        <span class="input-icon-addon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                                <path d="M16 19h6" />
                                                                <path d="M19 16v6" />
                                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                                            </svg>
                                                        </span>
                                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                                                    </div>
                                    
                                                    {{-- Jabatan --}}
                                                    <div class="input-icon mb-3">
                                                        <span class="input-icon-addon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-briefcase-2">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M14 2a3 3 0 0 1 3 3v1h2a3 3 0 0 1 3 3v9a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3 -3v-9a3 3 0 0 1 3 -3h2v-1a3 3 0 0 1 3 -3zm0 2h-4a1 1 0 0 0 -1 1v1h6v-1a1 1 0 0 0 -1 -1" />
                                                            </svg>
                                                        </span>
                                                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                                                    </div>
                                    
                                                    {{-- No HP --}}
                                                    <div class="input-icon mb-3">
                                                        <span class="input-icon-addon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dialpad">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M4 3h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1z" />
                                                                <path d="M18 3h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1z" />
                                                                <path d="M11 3h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1z" />
                                                                <path d="M4 10h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1z" />
                                                                <path d="M18 10h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1z" />
                                                                <path d="M11 10h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1z" />
                                                                <path d="M11 17h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1z" />
                                                            </svg>
                                                        </span>
                                                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. HP">
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-12">
                                                            <div class="form-label">Upload File</div>
                                                            <input type="file" name="foto" class="form-control">
                                                        </div>
                                                        {{-- Departemen --}}
                <div class="form-group mt-2">
                    <label class="form-label">Departemen</label>
                    <select name="kode_dept" class="form-control">
                        <option value="">Pilih Departemen</option>
                        @foreach ($departemen as $d)
                            <option {{ request('kode_dept') == $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">
                                {{ $d->nama_dept }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol Simpan --}}
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary w-100">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-send"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                        Simpan</button>
                    
                </div>

            </div>
        </div>
    </form>
</div>
@endsection                             
    <!-- Modal Edit Karyawan -->
              
<div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" role="dialog" style="display:none;style="display:none; aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Karyawan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditform">
  
        </div>
      </div>
    </div>
  </div>
  
                    
                   
   

                            @push('myscript')
                                <script>
                                    $(function() {
                                        $("#btnTambahkaryawan").click(function() {
                                            $("#modal-inputkaryawan").modal("show");
                                        });

                                        $(".edit").click(function() {
                                         var nik = $(this).attr('nik');
                                         $.ajax({
                                                type:'POST'
                                                , url: '/karyawan/edit'
                                                , cache: 'false'
                                                , data: {
                                                    _token: "{{ csrf_token(); }}"
                                                    , nik: nik
                                                }
                                                , success: function(respond){
                                                    $("#loadeditform").html(respond)

                                                }
                                            });
                                            $("#modal-editkaryawan").modal("show");
                                        });


                                        $(".delete-confirm").click(function(e) {
                                            var form = $(this).closest('form');
                                            e.preventDefault();
                                            Swal.fire({
                                                title: 'Data akan dihapus!',
                                                text: "Apakah Anda Yakin?",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya Hapus'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    form.submit();
                                                    Swal.fire(
                                                        'Sukses!',
                                                        'Data anda telah terhapus',
                                                    )
                                                }
                                            })
                                        });

                                        $("#frmKaryawan").submit(function() {
                                            var nik = $("#nik").val();
                                            var nama_lengkap = $("#nama_lengkap").val();
                                            var jabatan = $("#jabatan").val();
                                            var no_hp = $("#no_hp").val();
                                            var kode_dept = $("frmkaryawan").find("#kode_dept").val();
                                            if (nik == "") {
                                                Swal.fire({
                                                    title: 'Data',
                                                    text: 'NIK Harus Diisi !',
                                                    icon: 'warning',
                                                    confirmButtonText: 'Ok'
                                                }).then((result) => {
                                                    $("#nik").focus();
                                                });

                                                return false;
                                            } else if (nama_lengkap == "") {
                                                Swal.fire({
                                                    title: 'Data',
                                                    text: 'Nama Harus Diisi !',
                                                    icon: 'warning',
                                                    confirmButtonText: 'Ok'
                                                }).then((result) => {
                                                    $("#nama_lengkap").focus();
                                                });

                                                return false;
                                            } else if (jabatan == "") {
                                                Swal.fire({
                                                    title: 'Data',
                                                    text: 'Jabatan Harus Diisi !',
                                                    icon: 'warning',
                                                    confirmButtonText: 'Ok'
                                                }).then((result) => {
                                                    $("#jabatan").focus();
                                                });

                                                return false;
                                            } else if (no_hp == "") {
                                                Swal.fire({
                                                    title: 'Data',
                                                    text: 'Nomor Telepon Diisi !',
                                                    icon: 'warning',
                                                    confirmButtonText: 'Ok'
                                                }).then((result) => {
                                                    $("#no_hp").focus();
                                                });

                                                return false;
                                            } else if (kode_dept == "") {
                                                Swal.fire({
                                                    title: 'Data',
                                                    text: 'Departemen Harus Diisi !',
                                                    icon: 'warning',
                                                    confirmButtonText: 'Ok'
                                                }).then((result) => {
                                                    $('')("#kode_dept").focus();
                                                });

                                                return false;
                                                
                                            }
                                        });
                                    });
                                </script>
                            @endpush
