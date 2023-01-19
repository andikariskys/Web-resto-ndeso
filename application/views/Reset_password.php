<div class="container-fluid">
<div class="postion-relative">
    <div class="position-absolute top-50 start-50 translate-middle" style="width: 100%; max-width: 450px;">
        <div class="card">
            <div class="card-body m-1" style="background-image: url(<?= base_url('assets/images/bg-login.jpg') ?>); background-size: cover; background-repeat: no-repeat;">
                <form action="<?= base_url('login/check_reset') ?>" method="post">
                    <center><p class="display-6"><b><i>Reset Password</i></b></p></center>
                    <h5 class="mt-3">Username</h5>
                    <input type="text" name="username" class="form-control">
                    <h5 class="mt-3">Kode Password/Reset</h5>
                    <input type="number" name="kode" class="form-control" min="0">
                    <h5 class="mt-3">Password Baru</h5>
                    <input type="text" name="new_password" class="form-control" min="0">
                    <p class="text-danger">Jika username dan kode benar maka password akan otomatis berubah sesuai yang diinputkan</p>
                    <br>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Reset</button>
                </form>
                <center><p class="mt-3">klik <a href="<?= base_url('') ?>">Disini</a> untuk kembali/login</p></center>
            </div>
        </div>
    </div>
</div>