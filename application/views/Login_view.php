<div class="container-fluid">
<div class="postion-relative">
    <div class="position-absolute top-50 start-50 translate-middle" style="width: 100%; max-width: 450px;">
        <div class="card">
            <div class="card-body m-1" style="background-image: url(<?= base_url('assets/images/bg-login.jpg') ?>); background-size: cover; background-repeat: no-repeat;">
                <form action="<?= base_url('login/login') ?>" method="post">
                    <center><p class="display-6"><b><i>Login</i></b></p></center>
                    <h4 class="mt-3">Username</h4>
                    <input type="text" name="username" class="form-control" autocomplete="off" required>
                    <h4 class="mt-3">Password</h4>
                    <input type="password" name="password" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
                </form>
                <center><p class="mt-3">Reset password atau akun baru? klik <a href="<?= base_url('login/reset_pass') ?>">Disini</a></p></center>
            </div>
        </div>
    </div>
</div>