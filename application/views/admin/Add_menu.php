<center><h1 class="m-2">Tambah Menu</h1></center>

<center class="m-5">
    <form action="<?= base_url('admin/save_menu') ?>" method="post" enctype="multipart/form-data">
        <table border="0" style="width: 100%; max-width: 900px;">
            <tr>
                <th>Gambar</th>
                <td><input type="file" name="gambar" class="form-control mt-2" accept="image/*" required></td>
            </tr>
            <tr>
                <th>Nama Menu</th>
                <td><input type="text" name="nama_menu" class="form-control mt-2" required></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>
                    <select name="kategori" class="form-select mt-2" required>
                        <option value="" hidden selected>-- Pilih Kategori --</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Snack">Snack</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Jumlah Stok</th>
                <td><input type="number" name="stok" class="form-control mt-2" required></td>
            </tr>
            <tr>
                <th>Harga Satuan</th>
                <td><input type="number" name="harga_satuan" class="form-control mt-2" required></td>
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