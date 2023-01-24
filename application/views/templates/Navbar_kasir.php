    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" disabled>Resto Ndeso</a>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="<?= base_url('resto') ?>" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('resto/histories_transaction') ?>" class="nav-link">Riwayat Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('login/logout') ?>" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
    <div class="container-fluid">