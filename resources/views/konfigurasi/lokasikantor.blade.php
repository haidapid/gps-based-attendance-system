@extends('layouts.admin.tabler')

@section('content')
    <div class="page-header d-print-none mb-4">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Konfigurasi Lokasi</h2>
                    <div class="text-muted">Salin Titik Lokasi Latitude dan Longitude pada Google Maps Sesuai Kebutuhan Presensi</div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Form Konfigurasi Lokasi</h3>
                        </div>
                        <div class="card-body">
                            @if (Session::get('success'))
                                <div class="alert alert-success alert-dismissible">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::get('warning'))
                                <div class="alert alert-warning alert-dismissible">
                                    {{ Session::get('warning') }}
                                </div>
                            @endif

                            <form action="/konfigurasi/updatelokasikantor" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="lokasi_kantor">Lokasi Kantor</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5"></path>
                                                <path d="M9 4v13"></path>
                                                <path d="M15 7v5.5"></path>
                                                <path
                                                    d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z">
                                                </path>
                                                <path d="M19 18v.01"></path>
                                            </svg>
                                        </span>
                                        <input type="text" id="lokasi_kantor" name="lokasi_kantor"
                                            class="form-control" value="{{ $lok_kantor->lokasi_kantor }}"
                                            placeholder="Masukkan Lokasi Kantor" autocomplete="off">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="radius">Radius (meter)</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-live-view" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                                                <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                                                <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                                                <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                                                <path d="M12 11l0 .01"></path>
                                                <path d="M12 18l-3.5 -5a4 4 0 1 1 7 0l-3.5 5"></path>
                                            </svg>
                                        </span>
                                        <input type="number" id="radius" name="radius"
                                            class="form-control" value="{{ $lok_kantor->radius }}"
                                            placeholder="Masukkan radius (contoh: 100)" autocomplete="off">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary w-100" type="submit">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
        </div>
    </div>
@endsection
