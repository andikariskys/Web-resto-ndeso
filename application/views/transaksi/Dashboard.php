<center><h1 class="text-white">Resto Ndeso</h1></center>
<form action="<?= base_url('resto/confirm_order') ?>" method="post">
    <div class="position-relative d-none" id="hiddenButton">
        <button class="btn btn-outline-success position-fixed  top-2 end-0 m-3 btn-lg"><i class="fas fa-shopping-cart"></i></button>
    </div>
    <script>
        const displayNone = document.getElementById('hiddenButton');
        var total = 0;
    </script>

        <fieldset>
            <legend class="text-white">Makanan</legend>
            <div class="row">
                <?php foreach ($menu as $mn) : 
                    if ($mn->kategori == "Makanan") { ?>
                        <div class="card m-2" style="width: 16rem; height: 23rem;">
                            <img class="card-image-top mt-3" style="background-image: url(/assets/images/<?= $mn->gambar ?>); height: 100%; background-size: cover; background-position: center;"></img>
                            <div class="card-body">
                                <h5 class="card-title"><?= $mn->nama_menu ?></h5>
                                <p class="card-text">
                                    <b>Rp. <?= $mn->harga_satuan ?></b><br>
                                    <i>Stok: <b><?= $mn->stok ?></b></i><br>
                                </p>
                                <small>Masukkan jumlah pesanan</small>
                                <input type="number" name="jumlah[]" class="form-control" min="0" max="<?= $mn->stok ?>" value="0" id="jml">
                                <input type="hidden" name="id_menu[]" value="<?= $mn->id_menu ?>">
                                <input type="hidden" name="nama_menu[]" value="<?= $mn->nama_menu ?>">
                                <input type="hidden" name="harga_menu[]" value="<?= $mn->harga_satuan ?>">
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </fieldset>
        <fieldset>
            <legend class="text-white">Minuman</legend>
            <div class="row">
                <?php foreach ($menu as $mn) : 
                    if ($mn->kategori == "Minuman") { ?>
                        <div class="card m-2" style="width: 16rem; height: 23rem;">
                            <img class="card-image-top mt-3" style="background-image: url(/assets/images/<?= $mn->gambar ?>); height: 100%; background-size: cover; background-position: center;"></img>
                            <div class="card-body">
                                <h5 class="card-title"><?= $mn->nama_menu ?></h5>
                                <p class="card-text">
                                    <b>Rp. <?= $mn->harga_satuan ?></b><br>
                                    <i>Stok: <b><?= $mn->stok ?></b></i><br>
                                </p>
                                <small>Masukkan jumlah pesanan</small>
                                <input type="number" name="jumlah[]" class="form-control" min="0" max="<?= $mn->stok ?>" value="0" id="jml">
                                <input type="hidden" name="id_menu[]" value="<?= $mn->id_menu ?>">
                                <input type="hidden" name="nama_menu[]" value="<?= $mn->nama_menu ?>">
                                <input type="hidden" name="harga_menu[]" value="<?= $mn->harga_satuan ?>">
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </fieldset>
        <fieldset>
            <legend class="text-white">Snack</legend>
            <div class="row">
                <?php foreach ($menu as $mn) : 
                    if ($mn->kategori == "Snack") { ?>
                        <div class="card m-2" style="width: 16rem; height: 23rem;">
                            <img class="card-image-top mt-3" style="background-image: url(/assets/images/<?= $mn->gambar ?>); height: 100%; background-size: cover; background-position: center;"></img>
                            <div class="card-body">
                                <h5 class="card-title"><?= $mn->nama_menu ?></h5>
                                <p class="card-text">
                                    <b>Rp. <?= $mn->harga_satuan ?></b><br>
                                    <i>Stok: <b><?= $mn->stok ?></b></i><br>
                                </p>
                                <small>Masukkan jumlah pesanan</small>
                                <input type="number" name="jumlah[]" class="form-control" min="0" max="<?= $mn->stok ?>" value="0" id="jml">
                                <input type="hidden" name="id_menu[]" value="<?= $mn->id_menu ?>">
                                <input type="hidden" name="nama_menu[]" value="<?= $mn->nama_menu ?>">
                                <input type="hidden" name="harga_menu[]" value="<?= $mn->harga_satuan ?>">
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </fieldset>
</form>

<script>
    const jmlArray = document.querySelectorAll("[class = 'form-control']");

    function showButton() {
        if (total > 0) {
            displayNone.classList.remove('d-none');
        } else {
            displayNone.classList.add('d-none')
        }
    }

    for(var i = 0; i < jmlArray.length; i++) {
        jmlArray[i].addEventListener('input', () => {
            const jmlArr = document.querySelectorAll("[class = 'form-control']");
            total = 0;
            for(var j = 0; j < jmlArr.length; j++) {
                total = total + parseInt(jmlArr[j].value);
            }

            showButton();
        })
    }
</script>