<?php foreach ($data['produk'] as $produk) : ?>
    <div class="list-group">
        <div class="list-group-item list-group-item-action active" aria-current="true">
            <h5 class="mb-1"><?= $produk['nama_produk']?></h5>
            <div class="d-flex w-100 justify-content-between">
                <p class="mb-1"><?= $produk['harga']?></p>
                <a href="<?= BASEURL; ?>keranjang/hapus/<?= intval($produk['id']); ?>" onclick="return confirm('Apakah anda yakin?')"><img src="<?php BASEURL ?>images/money-bag.png"></a>
            </div>
            <small><?= $produk['produk_unit']?></small>
        </div>
    </div>
<?php endforeach ?>