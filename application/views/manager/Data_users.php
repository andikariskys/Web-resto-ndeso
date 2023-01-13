<center><h1 class="mt-2">Data Users</h1></center>

<a href="#" class="btn btn-primary m-3">Tambah Users</a>

<table class="table table-stripped table-hover">
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
            <td><span><b>************</b></span> &nbsp; <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button></td>
            <td>
                <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>