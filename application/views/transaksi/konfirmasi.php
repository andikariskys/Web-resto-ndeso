<center><h1 class="text-white">Daftar Pesanan</h1></center>
<form action="<?= base_url('resto/save_order') ?>" method="post">
    <table class="table table-stripped table-hover table-secondary">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga Menu</th>
                <th>Jumlah Menu</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; $num_arr = 0; $tot_transaksi = 0;
                foreach ($id_menu as $id) :
                $no++ ;
                $tot_hrg = $harga[$num_arr] * $jumlah[$num_arr];
                $tot_transaksi += $tot_hrg; ?>

                <tr>
                    <td><?= $no ?></td>
                    <td><?= $nama_menu[$num_arr] ?></td>
                    <td><?= $harga[$num_arr] ?></td>
                    <td><?= $jumlah[$num_arr] ?></td>
                    <td><?= $tot_hrg ?></td>
                    <input type="hidden" name="id_menu[]" value="<?= $id_menu[$num_arr] ?>">
                    <input type="hidden" name="jml_menu[]" value="<?= $jumlah[$num_arr] ?>">
                </tr>

            <?php $num_arr++; 
                endforeach; ?>
        </tbody>
    </table>

    <div class="position-relative m-3">
        <div class="position-absolute end-0">
            <div class="row align-items-center bg-light p-2">
                <div class="col-auto">
                    <p><b>Nama Pembeli</b></p>
                    <input type="text" name="nama_pembeli" class="form-control" required>
                </div>
                <div class="col-auto">
                    <p><b>Total Transaksi:</b></p>
                    <input type="text" name="total_transaksi" class="form-control" value="<?= $tot_transaksi ?>" readonly id="total_transaksi">
                </div>
                <div class="col-auto">
                    <p><b>Uang Pembeli : </b></p>
                    <input type="number" name="uang_pembeli" class="form-control" min="0" id="uang_pembeli" required>
                </div>
                <div class="col-auto">
                    <p><b>Kembalian : </b></p>
                    <input type="text" name="kembalian" class="form-control" readonly id="kembalian">
                </div>
                <div class="col-auto">
                    <p>&nbsp;</p>
                    <button type="submit" class="btn btn-success col align-self-end" id="btn_checkout" disabled>Checkout</button>
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    const total_transaksi   = document.getElementById('total_transaksi');
    const uang_pembeli      = document.getElementById('uang_pembeli');
    const kembalian         = document.getElementById('kembalian');
    const btn_checkout      = document.getElementById('btn_checkout');
    var kembalian_user      = 0;

    function validasibutton() {
        if (kembalian_user > 0) {
            btn_checkout.removeAttribute('disabled');
        } else {
            btn_checkout.setAttribute('disabled', '');
        }
    }

    uang_pembeli.addEventListener('input', () => {
        kembalian_user      = parseInt(uang_pembeli.value) - parseInt(total_transaksi.value);
        kembalian.value     = kembalian_user;

        validasibutton();
    })
</script>