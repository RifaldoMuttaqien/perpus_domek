<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Anggota</title>
</head>

<body>
    <style>
    .card {
        border: 1px solid #000;
        width: 450px;
    }

    .card-header {
        border-bottom: 1px solid #000;
        text-align: center;
        font-weight: bold;
        padding: 10px;
    }

    .card-body {
        padding: 20px;
    }
    </style>

    <div class="card">
        <div class="card-header">
            Kartu Anggota Perpustakaan
        </div>
        <div class="card-body">
            <div class="container">
                <table class="table table-borderless table-sm fs-2">
                    <?php
                    $no = 1;
                    foreach ($anggota as $a) {
                    ?>
                    <tr>
                        <td width="14%">Nomor</td>
                        <td width="2%">:</td>
                        <td><?php echo 10000 + $a->id; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $a->nama; ?></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><?php echo $a->nik; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $a->alamat; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    window.print();
    </script>
</body>

</html>