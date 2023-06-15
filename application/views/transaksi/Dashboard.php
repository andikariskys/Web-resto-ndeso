<center>
    <h1 class="text-white mt-1">Hello, <?= $user[0]->nama ?>! </h1>
</center>
<div class="mb-2">
    <button class="btn btn-light mx-2 active" id="makanan">Makanan</button>
    <button class="btn btn-light mx-2" id="minuman">Minuman</button>
    <button class="btn btn-light mx-2" id="snack">Snack</button>
</div>

<form action="<?= base_url('resto/confirm_order') ?>" method="post">
    <div class="d-flex justify-content-end d-none" id="hiddenButton">
        <button class="btn btn-success sticky-top  top-2 end-0 m-3 btn-lg"><i class="fas fa-shopping-cart"></i></button>
    </div>
    <script>
        const btnMakanan = document.getElementById('makanan');
        const btnMinuman = document.getElementById('minuman');
        const btnSnack = document.getElementById('snack');
        const displayNone = document.getElementById('hiddenButton');
        var total = 0;
    </script>
    <div class="row" id="dataMakanan">
        <?php 
        $idArrMknn = 0;
        foreach ($menu as $mn) :
            if ($mn->kategori == "Makanan") { ?>
                <div class="card m-2" style="width: 16rem; height: 23rem; max-width: 45%;">
                    <img class="card-image-top mt-3" style="background-image: url(/assets/images/<?= $mn->gambar ?>); height: 100%; background-size: cover; background-position: center;"></img>
                    <div class="card-body">
                        <h5 class="card-title"><?= $mn->nama_menu ?></h5>
                        <p class="card-text">
                            <b>Rp. <?= $mn->harga_satuan ?></b><br>
                            <i>Stok: <b><?= $mn->stok ?></b></i><br>
                        </p>
                        <small>Masukkan jumlah pesanan</small>
                        <input type="number" name="jumlah[]" class="form-control" min="0" max="<?= $mn->stok ?>" value="0" id="mknn<?= $idArrMknn?>">

                        <script>
                            const mknn<?= $idArrMknn?> = document.getElementById('mknn<?= $idArrMknn?>');
                            mknn<?= $idArrMknn?>.addEventListener('input', ()=>{
                                if(mknn<?= $idArrMknn?>.value > <?= $mn->stok ?>){
                                    mknn<?= $idArrMknn?>.value = <?= $mn->stok ?>
                                } else if (mknn<?= $idArrMknn?>.value < 0) {
                                    mknn<?= $idArrMknn?>.value = 0
                                }
                            });
                        </script>

                        <input type="hidden" name="id_menu[]" value="<?= $mn->id_menu ?>">
                        <input type="hidden" name="nama_menu[]" value="<?= $mn->nama_menu ?>">
                        <input type="hidden" name="harga_menu[]" value="<?= $mn->harga_satuan ?>">
                    </div>
                </div>
            <?php } 
            $idArrMknn++;
        endforeach; ?>
    </div>
    <div class="row" id="dataMinuman" hidden>
        <?php 
        $idArrMnn = 0;
        foreach ($menu as $mn) :
            if ($mn->kategori == "Minuman") { ?>
                <div class="card m-2" style="width: 16rem; height: 23rem; max-width: 45%;">
                    <img class="card-image-top mt-3" style="background-image: url(/assets/images/<?= $mn->gambar ?>); height: 100%; background-size: cover; background-position: center;"></img>
                    <div class="card-body">
                        <h5 class="card-title"><?= $mn->nama_menu ?></h5>
                        <p class="card-text">
                            <b>Rp. <?= $mn->harga_satuan ?></b><br>
                            <i>Stok: <b><?= $mn->stok ?></b></i><br>
                        </p>
                        <small>Masukkan jumlah pesanan</small>
                        <input type="number" name="jumlah[]" class="form-control" min="0" max="<?= $mn->stok ?>" value="0" id="mnn<?= $idArrMnn ?>">

                        <script>
                            const mnn<?= $idArrMnn ?> = document.getElementById('mnn<?= $idArrMnn ?>');
                            mnn<?= $idArrMnn ?>.addEventListener('input', ()=>{
                                if(mnn<?= $idArrMnn ?>.value > <?= $mn->stok ?>){
                                    mnn<?= $idArrMnn ?>.value = <?= $mn->stok ?>
                                } else if (mnn<?= $idArrMnn ?>.value < 0) {
                                    mnn<?= $idArrMnn ?>.value = 0
                                }
                            });
                        </script>

                        <input type="hidden" name="id_menu[]" value="<?= $mn->id_menu ?>">
                        <input type="hidden" name="nama_menu[]" value="<?= $mn->nama_menu ?>">
                        <input type="hidden" name="harga_menu[]" value="<?= $mn->harga_satuan ?>">
                    </div>
                </div>
            <?php } 
            $idArrMnn++;
        endforeach; ?>
    </div>
    <div class="row" id="dataSnack" hidden>
        <?php 
        $idArrSnck = 0;
        foreach ($menu as $mn) :
            if ($mn->kategori == "Snack") { ?>
                <div class="card m-2" style="width: 16rem; height: 23rem; max-width: 45%;">
                    <img class="card-image-top mt-3" style="background-image: url(/assets/images/<?= $mn->gambar ?>); height: 100%; background-size: cover; background-position: center;"></img>
                    <div class="card-body">
                        <h5 class="card-title"><?= $mn->nama_menu ?></h5>
                        <p class="card-text">
                            <b>Rp. <?= $mn->harga_satuan ?></b><br>
                            <i>Stok: <b><?= $mn->stok ?></b></i><br>
                        </p>
                        <small>Masukkan jumlah pesanan</small>
                        <input type="number" name="jumlah[]" class="form-control" min="0" max="<?= $mn->stok ?>" value="0" id="snck<?= $idArrSnck?>">

                        <script>
                            const snck<?= $idArrSnck?> = document.getElementById('snck<?= $idArrSnck?>');
                            snck<?= $idArrSnck?>.addEventListener('input', ()=>{
                                if(snck<?= $idArrSnck?>.value > <?= $mn->stok ?>){
                                    snck<?= $idArrSnck?>.value = <?= $mn->stok ?>
                                } else if (snck<?= $idArrSnck?>.value < 0) {
                                    snck<?= $idArrSnck?>.value = 0
                                }
                            });
                        </script>

                        <input type="hidden" name="id_menu[]" value="<?= $mn->id_menu ?>">
                        <input type="hidden" name="nama_menu[]" value="<?= $mn->nama_menu ?>">
                        <input type="hidden" name="harga_menu[]" value="<?= $mn->harga_satuan ?>">
                    </div>
                </div>
            <?php }
            $idArrSnck++;
        endforeach; ?>
    </div>
</form>

<script>
    const dataMakanan = document.getElementById('dataMakanan');
    const dataMinuman = document.getElementById('dataMinuman');
    const dataSnack = document.getElementById('dataSnack');

    btnMakanan.addEventListener('click', () => {
        removAttrClass();
        btnMakanan.classList.add('active');
        dataMakanan.removeAttribute('hidden');
    });
    btnMinuman.addEventListener('click', () => {
        removAttrClass();
        btnMinuman.classList.add('active');
        dataMinuman.removeAttribute('hidden');
    });
    btnSnack.addEventListener('click', () => {
        removAttrClass();
        btnSnack.classList.add('active');
        dataSnack.removeAttribute('hidden');
    });

    function removAttrClass() {
        btnMakanan.classList.remove('active')
        btnMinuman.classList.remove('active');
        btnSnack.classList.remove('active');

        dataMakanan.setAttribute('hidden', true);
        dataMinuman.setAttribute('hidden', true);
        dataSnack.setAttribute('hidden', true);
    }

    const jmlArray = document.querySelectorAll("[class = 'form-control']");

    function showButton() {
        if (total > 0) {
            displayNone.classList.remove('d-none');
        } else {
            displayNone.classList.add('d-none')
        }
    }

    for (var i = 0; i < jmlArray.length; i++) {
        jmlArray[i].addEventListener('input', () => {
            const jmlArr = document.querySelectorAll("[class = 'form-control']");
            total = 0;
            for (var j = 0; j < jmlArr.length; j++) {
                total = total + parseInt(jmlArr[j].value);
            }

            showButton();
        })
    }
</script>