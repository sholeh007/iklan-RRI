<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center mt-5">
                <div class="card-header bg-dark">
                    <h3 class="text-light">Selamat</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Kode transaksi : <?= $pesan['kode_pesan']; ?></h5>
                    <h4> Rp. <?= number_format($pesan['harga'], 2, ',', '.'); ?></h4>
                    <p class="card-text">Segera bayar ke bank dengan nomor :</p>
                    <p class="card-text">Nomor rekening xxxx-xxxx-xxxxx-xxxxxx</p>
                    <p class="card-text">Atas Nama RRI </p>
                    <a href="<?= base_url('user/index'); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>