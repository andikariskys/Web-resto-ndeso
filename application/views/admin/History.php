<center><h1 class="text-white">Riwayat Transaksi</h1></center>
<table class="table table-stripped table-hover table-dark">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Transaksi</th>
            <th>Nama Kasir</th>
            <th>Nama Pembeli</th>
            <th>Tanggal Pesanan</th>
            <th>Total Pembelian</th>
            <th>Uang Pembeli</th>
            <th>Kembalian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0;
            foreach ($riwayat as $rw) :
                $kembalian = (int)$rw->uang_pembeli - (int)$rw->total_pembelian;
                $no++ ?>

            <tr>
                <td><?= $no ?></td>
                <td><?= $rw->id_transaksi ?></td>
                <td><?= $rw->nama ?></td>
                <td><?= $rw->nama_pembeli ?></td>
                <td><?= $rw->tgl_pesan ?></td>
                <td><?= $rw->total_pembelian ?></td>
                <td><?= $rw->uang_pembeli ?></td>
                <td><?= $kembalian ?></td>
                <td>
                    <a href="<?= base_url('admin/print/'.$rw->id_transaksi) ?>" class="btn btn-info">Cetak</a>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>