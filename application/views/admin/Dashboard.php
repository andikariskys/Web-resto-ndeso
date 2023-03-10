<center><h1 class="m-2 text-white">Daftar Menu</h1></center>
<a href="<?= base_url('admin/add_menu') ?>" class="btn btn-primary m-2 text-white">Tambah data</a>
<div class="container-fluid">
    <table class="table table-stripped table-dark table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Jumlah Stok</th>
                <th>Harga Satuan</th>
                <th>status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 0;
                foreach ($menu as $mn) :
                    $no++; ?>

            <tr>
                <td><?= $no ?></td>
                <td>
                    <img src="<?= base_url('assets/images/'.$mn->gambar) ?>" alt="" class="rounded" style="height: 50px; width: 50px;">
                </td>
                <td><?= $mn->nama_menu ?></td>
                <td><?= $mn->kategori ?></td>
                <td><?= $mn->stok ?></td>
                <td><?= $mn->harga_satuan ?></td>
                <td class="text-info"><?= $mn->status ?></td>
                <td>
                    <a href="<?= base_url('admin/edit_menu/'.$mn->id_menu) ?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>&nbsp;
                    <a href="<?= base_url('admin/delete_menu/'.$mn->id_menu) ?>" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>