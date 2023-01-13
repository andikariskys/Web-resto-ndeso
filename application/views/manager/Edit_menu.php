<center><h1 class="m-2">Tambah Menu</h1></center>

<center class="m-5">
    <form action="<?= base_url('admin/save_edit_menu') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_menu" value="<?= $menu->id_menu ?>">
    <input type="hidden" name="gambar" value="<?= $menu->gambar ?>">
        <table border="0" style="width: 100%; max-width: 900px;">
            <tr>
                <th>Gambar</th>
                <td>
                    <img src="<?= base_url('assets/images/'.$menu->gambar) ?>" alt="<?= $menu->nama_menu ?>" class="rounded img-thumbnail" style="height: 75px; width: 75px; background-size: cover;">
                    <input type="file" name="foto" class="form-control mt-2" accept="image/*">
                </td>
            </tr>
            <tr>
                <th>Nama Menu</th>
                <td><input type="text" name="nama_menu" class="form-control mt-2" value="<?= $menu->nama_menu ?>" required></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>
                    <select name="kategori" class="form-select mt-2" required>
                        <option value="Makanan" <?php if ($menu->kategori == "Makanan") { echo "selected"; } ?> >Makanan</option>
                        <option value="Minuman" <?php if ($menu->kategori == "Minuman") { echo "selected"; } ?> >Minuman</option>
                        <option value="Snack" <?php if ($menu->kategori == "Snack") { echo "selected"; } ?> >Snack</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Jumlah Stok</th>
                <td><input type="number" name="stok" class="form-control mt-2" value="<?= $menu->stok ?>" required></td>
            </tr>
            <tr>
                <th>Harga Satuan</th>
                <td><input type="number" name="harga_satuan" class="form-control mt-2" value="<?= $menu->harga_satuan ?>" required></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <input type="radio" name="status" value="tampil" class="mt-2" <?php if ($menu->status == "tampil") { echo "checked"; } ?> > Tampilkan
                    <input type="radio" name="status" value="" class="mt-2" <?php if ($menu->status != "tampil") { echo "checked"; } ?> > Sembunyikan
                </td>
            </tr>
            <tr>
                <th> </th>
                <td>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</center>