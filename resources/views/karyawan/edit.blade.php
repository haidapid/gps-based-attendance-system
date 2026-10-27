                   <form action="/panel/karyawan/{{ $karyawan->nik }}/update" method="POST" id="frmKaryawan" enctype="multipart/form-data">
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
                                                        <input type="text" readonly value="{{ $karyawan->nik }}" class="form-control" id="nik" name="nik" placeholder="NIK">
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
                                                        <input type="text"  value="{{ $karyawan->nama_lengkap }}"  class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                                                    </div>
                                    
                                                    {{-- Jabatan --}}
                                                    <div class="input-icon mb-3">
                                                        <span class="input-icon-addon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-briefcase-2">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M14 2a3 3 0 0 1 3 3v1h2a3 3 0 0 1 3 3v9a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3 -3v-9a3 3 0 0 1 3 -3h2v-1a3 3 0 0 1 3 -3zm0 2h-4a1 1 0 0 0 -1 1v1h6v-1a1 1 0 0 0 -1 -1" />
                                                            </svg>
                                                        </span>
                                                        <input type="text"  id="jabatan" value="{{ $karyawan->jabatan }}"  class="form-control" name="jabatan" placeholder="Jabatan">
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
                                                        <input type="text" class="form-control" id="no_hp" value="{{ $karyawan->no_hp }}" name="no_hp" placeholder="No. HP">
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-12">
                                                            <div class="form-label">Upload File</div>
                                                            <input type="file" name="foto" class="form-control">
                                                            <input type="hidden" name="old_foto" value="{{ $karyawan->foto }}">
                                                        </div>
                                                        {{-- Departemen --}}
                <div class="form-group mt-2">
                    <label class="form-label">Departemen</label>
                    <select name="kode_dept" class="form-control">
                        <option value="">Pilih Departemen</option>
                        @foreach ($departemen as $d)
                            <option {{ $karyawan->kode_dept== $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">
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