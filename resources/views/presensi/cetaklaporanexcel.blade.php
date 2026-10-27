<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A4 }

 .tabeldatakaryawan{
    margin-top: 40px;
  }

  .tabelpresensi {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    font-size: 14px;
}

.tabelpresensi th,
.tabelpresensi td {
    padding: 8px 10px;
    text-align: center;
    border: 1px solid #999;
}

.tabelpresensi th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.foto{
    width:40px;
    height:40px;
}
body {
      font-family: 'Times New Roman', serif;
    }

    .ttd-container {
      margin-top: 80px;
    }

    .tanggal {
      text-align: right;
      margin-bottom: 60px;
      padding-right: 10px;
    }

    .ttd-table {
      width: 100%;
      table-layout: fixed;
    }

    .ttd-table td {
      text-align: center;
      vertical-align: bottom;
      height: 100px;
    }

    .nama {
      text-decoration: underline;
      font-weight: normal;
    }

    .jabatan {
      font-style: italic;
      font-weight: bold;
    }
</style>

 
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
    <?php
    function selisih($jam_masuk, $jam_keluar)
        {
            list($h, $m, $s) = explode(":", $jam_masuk);
            $dtAwal = mktime($h, $m, $s, "1", "1", "1");
            list($h, $m, $s) = explode(":", $jam_keluar);
            $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
            $dtSelisih = $dtAkhir - $dtAwal;
            $totalmenit = $dtSelisih / 60;
            $jam = explode(".", $totalmenit / 60);
            $sisamenit = ($totalmenit / 60) - $jam[0];
            $sisamenit2 = $sisamenit * 60;
            $jml_jam = $jam[0];
            return $jml_jam . ":" . round($sisamenit2);
        }
?>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table style="width: 100%; border: 1px solid #333; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
            <td style="width: 60px; padding: 10px; border: 1px solid #333; vertical-align: top;">
                <img src="{{ asset('assets/img/dribbble_logo.png') }}" width="50" height="50" alt="Logo Perusahaan">
            </td>
            <td style="padding: 10px; border: 1px solid #333;">
                <h2 style="margin: 0; font-size: 20px; line-height: 1.4;">
                    LAPORAN PRESENSI KARYAWAN <br>
                    <small style="font-size: 16px; font-weight: normal;">
                        PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }}
                    </small><br>
                    <strong>PT. dribbble</strong>
                </h2>

            </td>
        </tr>
    </table>
    <table class="tabeldatakaryawan" style="width: 100%; border-collapse: collapse; font-size: 14px;">
        <tr>
            <td rowspan="6" style="text-align: center; padding-right: 16px;">
                @php
                    $path = Storage::url('uploads/karyawan/' . ($karyawan->foto ?? 'default.png'));
                @endphp
                <img src="{{ $path }}" alt="Belum Pasang Foto" style="width: 80px; height: auto; border-radius: 6px;">
            </td>
            <td style="width: 150px; padding: 4px 8px;">NIK</td>
            <td style="width: 10px;">:</td>
            <td style="padding: 4px 8px;">{{ $karyawan->nik ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding: 4px 8px;">Nama Karyawan</td>
            <td>:</td>
            <td style="padding: 4px 8px;">{{ $karyawan->nama_lengkap ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding: 4px 8px;">Jabatan</td>
            <td>:</td>
            <td style="padding: 4px 8px;">{{ $karyawan->jabatan ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding: 4px 8px;">Nama Departemen</td>
            <td>:</td>
            <td style="padding: 4px 8px;">{{ $karyawan->nama_dept ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding: 4px 8px;">No. HP</td>
            <td>:</td>
            <td style="padding: 4px 8px;">{{ $karyawan->no_hp ?? '-' }}</td>
        </tr>
    </table>
    <table class="tabelpresensi">
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
            <th>Keterangan</th>
            <th>Jam Kerja</th>
        </tr>
        @foreach ($presensi as $d)
        @php
        
            $jamterlambat = selisih('08:00:00', $d->jam_in)    
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ date('d-m-Y', strtotime($d->tgl_presensi)) }}</td>
            <td>{{ $d->jam_in }}</td>
            <td>       
            </td>
            <td>{{ $d->jam_out ?? 'Tidak Absen' }}</td>
            <td>
                @if ($d->foto_out)
                    <img src="{{ url($path_out) }}" alt="" class="foto">
                @else
                    -
                @endif
            </td>
            <td>
                @if ($d->jam_in > "08:00")
                    Terlambat {{ $jamterlambat }}
                @else
                    Tepat Waktu
                @endif
            </td>
            <td>
                @if ($d->jam_out != null)
                @php
                $jmljamkerja = selisih($d->jam_in, $d->jam_out);
                @endphp
                @else
                @php
                $jmljamkerja = 0;
                @endphp
                @endif
                {{ $jmljamkerja }}
            </td>
        </tr>
    @endforeach
    <div class="ttd-container">
        <table class="ttd-table">
          <tr>
            <td colspan="2" class="tanggal">
              Bandung, {{ date('d-m-Y') }}
            </td>
          </tr>
          <tr>
            <td>
              <span class="nama">Alexander</span><br>
              <span class="jabatan">HRD Manager</span>
            </td>
            <td>
              <span class="nama">Adamas</span><br>
              <span class="jabatan">Direktur</span>
            </td>
          </tr>
        </table>
      </div>
    


    </table>
    
  </section>

</body>

</html>