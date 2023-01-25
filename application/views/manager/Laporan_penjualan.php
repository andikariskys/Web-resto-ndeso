<center><h1 class="text-white">Laporan Penjualan</h1></center>
<div class="row">
    <div class="col">
        <table class="table table-light table-striped table-hover" style="width: 100%; max-width: 700px;">
            <caption class="text-white">Menu Dengan Penjualan Tertinggi</caption>
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Total Penjualan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                    foreach ($penjualan as $jual) :
                        $no++ ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $jual->nama_menu ?></td>
                        <td><?= $jual->jumlah ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col">
        <table class="table table-light table-striped table-hover" style="width: 100%; max-width: 700px;">
            <caption class="text-white">Jumlah Stok Menu Terendah</caption>
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                    foreach ($stok as $stk) :
                        $no++ ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $stk->nama_menu ?></td>
                        <td><?= $stk->stok ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>