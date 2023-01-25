<center><h1 class="mt-2 text-white">Data Users</h1></center>

<button class="btn btn-outline-info m-2" data-bs-target="#addUser" data-bs-toggle="modal">Tambah User</button>

<table class="table table-stripped table-hover text-white">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Username</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0;
            foreach ($users as $usr) :
                $no++; ?>

        <tr>
            <td><?= $no ?></td>
            <td><?= $usr->nama ?></td>
            <td>
                <?php if ($usr->role_id == 2) {
                    echo "Admin";
                } else {
                    echo "Kasir";
                } ?>
            </td>
            <td><?= $usr->username ?></td>
            <td><a href="<?= base_url('manager/reset_pass/'.$usr->id_user) ?>" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Reset</a></button></td>
            <td>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUser<?= $usr->id_user ?>"><i class="fas fa-edit"></i></button>
                <a href="<?= base_url('manager/delete_user/'.$usr->id_user) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php foreach ($users as $usr) : ?>
    <div class="modal fade" id="editUser<?= $usr->id_user ?>" aria-hidden="true" aria-labelledby="modaljudul">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modaljudul">Edit User</h1>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    </div>
                    <form action="<?= base_url('manager/save_edit_user') ?>" method="post">
                        <input type="hidden" name="id_user" value="<?= $usr->id_user ?>">
                        <div class="modal-body">
                            <table border="0" style="width: 100%;">
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>:</th>
                                    <td><input type="text" name="nama" class="form-control mt-2" value="<?= $usr->nama ?>"></td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <th>:</th>
                                    <td><input type="text" name="username" class="form-control mt-2" value="<?= $usr->username ?>"></td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <th>:</th>
                                    <td>
                                        &nbsp; <input type="radio" name="role_id" value="0" class="mt-2" <?php if ($usr->role_id == 0) { echo "checked"; } ?> > Manager
                                        <input type="radio" name="role_id" value="1" class="mt-2" <?php if ($usr->role_id == 1) { echo "checked"; } ?> > Admin
                                        <input type="radio" name="role_id" value="2" class="mt-2" <?php if ($usr->role_id == 2) { echo "checked"; } ?> > Kasir
                                    </td>
                                </tr>
                                <tr>
                                    <th> </th>
                                    <th> </th>
                                    <td><p class="text-danger">Jika Jabatan-nya Manager maka tidak akan ditampilkan kedalam tabel</p></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php endforeach; ?>

<div class="modal fade" id="addUser" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Tambah User</h1>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <form action="<?= base_url('manager/save_user') ?>" method="post">
                <div class="modal-body">
                    <table border="0" style="width: 100%;">
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>:</th>
                            <td><input type="text" name="nama" class="form-control mt-2"></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <th>:</th>
                            <td><input type="text" name="username" class="form-control mt-2"></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <th>:</th>
                            <td>
                                &nbsp; <input type="radio" name="role_id" value="0" class="mt-2"> Manager
                                <input type="radio" name="role_id" value="1" class="mt-2"> Admin
                                <input type="radio" name="role_id" value="2" class="mt-2"> Kasir
                            </td>
                        </tr>
                        <tr>
                            <th> </th>
                            <th> </th>
                            <td><p class="text-danger">Jika Jabatan-nya Manager maka tidak akan ditampilkan kedalam tabel</p></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>