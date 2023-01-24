<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $transaksi->id_transaksi ?> </title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
</head>
<body>
    <script>
        window.print();
    </script>
    <center>
        <div style="max-width: 250px;" class="card mt-2">
            <div class="m-1">
                <center><h4>Resto Ndeso</h4></center>
                <center>Jln. karanganyar-Matesih, Dawung, Matesih, Karanganyar</center><hr><br>
                <table>
                    <tr>
                        <td>Kasir</td>
                        <td>: </td>
                        <td><?= $transaksi->nama ?></td>
                    </tr>
                    <tr>
                        <td>Tgl Trs</td>
                        <td>: </td>
                        <td><?= $transaksi->tgl_pesan ?></td>
                    </tr>
                    <tr>
                        <td>Pembeli</td>
                        <td>:</td>
                        <td><?= $transaksi->nama_pembeli ?></td>
                    </tr>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; 
                            foreach ($transaksi_detail as $td) : 
                                $no++; 
                                $total = (int)$td->jml_menu * (int)$td->harga_satuan; ?>
                            <tr>
                                <td><?= $td->nama_menu ?></td>
                                <td><?= $td->jml_menu ?></td>
                                <td><?= $total ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <table style="width: 100%;">
                    <tr>
                            <td><b>Total Pembelian</b></td>
                            <td><b>:</b></td>
                            <td><b><?= $transaksi->total_pembelian ?></b></td>
                        </tr>
                        <tr>
                            <td><b>Tunai</b></td>
                            <td><b>:</b></td>
                            <td><b><?= $transaksi->uang_pembeli ?></b></td>
                        </tr>
                        <tr>
                            <?php $kembalian = (int)$transaksi->uang_pembeli - (int)$transaksi->total_pembelian ?>
                            <td><b>Kembali</b></td>
                            <td><b>:</b></td>
                            <td><b><?= $kembalian ?></b></td>
                        </tr>
                </table>
                <hr>
                <center>Terima kasih telah berbelanja di Resto Ndeso</center>
            </div>
        </div>
    </center>
</body>
</html>