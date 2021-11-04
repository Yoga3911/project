<div class='fluid-container my-5'>
<center>
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $data['produk']['nama_produk']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $data['produk']['unit']; ?></h6>
        <p class="card-text"><?= $data['produk']['harga']; ?></p>
        <p class="card-text"><?= $data['produk']['jenis']; ?></p>
        <a href="<?= BASEURL; ?>/home/index" class="card-link">Kembali</a>
    </div>
</div>
</center>
</div>