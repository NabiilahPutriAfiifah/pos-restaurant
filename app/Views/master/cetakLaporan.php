<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Daftar Menu</title>

    <style>
    * {
        padding: 0;
        margin: 0;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    header,
    main {
        padding: 50px 50px 0 50px;
    }

    header .line {
        margin-top: 5px;
        height: 2px;
        width: 100%;
        border-radius: 10px;
        background-color: black;
    }

    header .line2 {
        margin-top: 2px;
        height: 2px;
        width: 100%;
        border-radius: 10px;
        background-color: black;
    }

    .data-table {
        border-collapse: collapse;
        width: 100%;
    }

    .data-table th,
    .data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .data-table th {
        background-color: #424242;
        color: white;
    }

    .data-table tbody tr:nth-child(even) {
        background-color: #B2B2B2;
    }

    main h2 {
        text-align: center;
    }

    .keterangan-table tr td {
        padding-right: 7px;
    }

    header .quotes {
        margin-bottom: 12px;
    }

    header .alamat {
        width: 400px;
    }
    </style>
</head>

<body>
    <header>
        <h2>POS RESTAURANT</h2>
        <p class="quotes"><i>Makan ya disini aja dijamin halal</i></p>
        <div class="line"></div>
        <div class="line2"></div>
    </header>
    <main>
        <h2>Laporan Daftar Menu</h2>
        <br>
        <div>
            <table class="keterangan-table">
                <tr>
                    <td>Dicetak Oleh</td>
                    <td>:</td>
                    <td>PT POS RESTAURANT</td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td>:</td>
                    <td><?= date('d F Y  H:i:s'); ?></td>
                </tr>
            </table>
            <!-- <p>Dicetak Oleh : </p>
            <p>Waktu : </p> -->
        </div>
        <br>
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Jenis Makanan</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['kode_menu']; ?></td>
                    <td><?= $row['nama_menu']; ?></td>
                    <td><?= $row['kategori']; ?></td>
                    <td><?= $row['jenis']; ?></td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td><?= $row['stok']; ?></td>
                </tr>
                <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
</body>

</html>