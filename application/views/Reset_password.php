<div class="container-fluid">
<div class="postion-relative">
    <div class="position-absolute top-50 start-50 translate-middle" style="width: 100%; max-width: 450px;">
        <div class="card">
            <div class="card-body m-1" style="background-image: url(<?= base_url('assets/images/bg-login.jpg') ?>); background-size: cover; background-repeat: no-repeat;">
                <form action="#" method="post">
                    <center><p class="display-6"><b><i>Reset Password</i></b></p></center>
                    <h5 class="mt-3">Username</h5>
                    <input type="text" name="username" class="form-control">
                    <h5 class="mt-3">Nama Lengkap</h5>
                    <input type="text" name="nama" class="form-control">
                    <h5 class="mt-3">Password yang baru</h5>
                    <input type="text" name="password" class="form-control">
                    <br>
                    <p class="text-danger">Note: Jika username dan nama lengkap benar, maka password akan diubah sesuai dengan yang dimasukkan</p>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Reset</button>
                </form>
                <center><p class="mt-3">klik <a href="#">Disini</a> untuk kembali/login</p></center>
            </div>
        </div>
    </div>
</div>