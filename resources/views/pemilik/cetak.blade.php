<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Lesehan Kresna</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/body.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head> 
<body class="tnr">
    <div class="container">
        <h6 class="tnr" style="text-align:center"><b>LAPORAN KEUANGAN LESEHAN & KOLAM PANCING KRESNA</b></h6>
        <h6 class="tnr" style="text-align:center"><b>TAHUN {{now()->year}}</b></h6>
        <br>
        <h6 class="tnr" style="text-align:center"><b>Bulan: {{$bulan}}</b></h6>

        <div class="table-responsive">
            <table class="table table-bordered table-sm tnr">
                <tbody>
                    <tr>
                        <td><strong>PENDAPATAN</strong></td>
                        <td><strong>Catatan</strong></td>
                        <td><strong>{{$bulan_sebelum}}</strong></td>
                        <td><strong>{{$bulan}}</strong></td>
                    </tr>
                    <tr>
                        <td>Pendapatan Usaha</td>
                        <td></td>
                        <td>{{$pubs}}</td>
                        <td>{{$pub}}</td>
                    </tr>
                    <tr>
                        <td>Pendapatan Lain-Lain</td>
                        <td></td>
                        <td>{{$plbs}}</td>
                        <td>{{$plb}}</td>
                    </tr>
                    <tr>
                        <td><strong>JUMLAH PENDAPATAN</strong></td>
                        <td><strong></strong></td>
                        <td><strong>{{$tpbs}}</strong></td>
                        <td><strong>{{$tpb}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>BEBAN</strong></td>
                        <td><strong>Catatan</strong></td>
                        <td><strong>{{$bulan_sebelum}}</strong></td>
                        <td><strong>{{$bulan}}</strong></td>
                    </tr>
                    <tr>
                        <td>Beban Usaha</td>
                        <td></td>
                        <td>{{$bubs}}</td>
                        <td>{{$bub}}</td>
                    </tr>
                    <tr>
                        <td>Beban Lain-Lain</td>
                        <td></td>
                        <td>{{$blbs}}</td>
                        <td>{{$blb}}</td>
                    </tr>
                    <tr>
                        <td><strong>JUMLAH BEBAN</strong></td>
                        <td><strong></strong></td>
                        <td><strong>{{$tbbs}}</strong></td>
                        <td><strong>{{$tbb}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>LABA (RUGI) SEBELUM PAJAK PENGHASILAN</strong></td>
                        <td><strong></strong></td>
                        <td><strong>{{$lsbbs}}</strong></td>
                        <td><strong>{{$lsbb}}</strong></td>
                    </tr>
                    <tr>
                        <td>Beban Pajak Penghasilan</td>
                        <td></td>
                        <td>{{$pbs}}</td>
                        <td>{{$pb}}</td>
                    </tr>
                    <tr>
                        <td><strong>LABA (RUGI) SETELAH PAJAK PENGHASILAN</strong></td>
                        <td><strong></strong></td>
                        <td><strong>{{$lstbs}}</strong></td>
                        <td><strong>{{$lstb}}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>CATATAN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><br><br><br><br><br></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row sz">
            <div class="col-md-8">
                Mengetahui,<br>
                Pemilik Lesehan & Kolam Pancing Kresna
                <br><br><br><br><br>
                Ninis Triaswati
            </div>
            <div class="col-md-4">
                Mojokerto, {{now()->toDateString()}}<br>
                @if(auth()->user()->role == 'Pemilik') Pemilik
                @elseif(auth()->user()->role == 'keuangan') Pengelola Keuangan
                @endif
                <br><br><br><br><br>
                {{auth()->user()->name}}
            </div>
        </div>
    </div>
</body>
<script>
    window.print();
</script>
</html>