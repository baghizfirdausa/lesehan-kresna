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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

</head> 
<body>
    <div class="nav">
        <div class="left-nav">
            <h1 class="super-title">
                <span id="lesehan">Lesehan</span>
                <span id="kresna">Kresna</span>
            </h1>
            <ul>
                <li>
                    <a href="{{ url('/keuangan/dashboard') }}">
                        <p>DASHBOARD</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/keuangan/transaksi') }}">
                        <p>TRANSAKSI</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/keuangan/menu') }}">
                        <p>MENU</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/keuangan/laporan') }}">
                        <p>LAPORAN</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="dropdown">
            <div class="dropbtn">
                <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
            </div>
        </div>
    </div>

    @yield('container')

       
</body>
<script type="text/javascript">
    $(document).ready(function() {
    $('.data').DataTable();
} );

    $("#datepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
});
</script>
</html>