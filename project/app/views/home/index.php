<div class="container flash">
  <?php if (isset($_COOKIE['produk'])) : ?>
    <?php Flasher::flashProduct() ?>
  <?php else : ?>
    <?php Flasher::flashSay() ?>
  <?php endif; ?>
</div>
<div class="d-flex flex-row-reverse">
  <a href="<?= BASEURL ?>logout" class="btn btn-danger mx-2" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
  <button type="button" class="btn btn-primary modalTambah mx-2" data-bs-toggle="modal" data-bs-target="#formModal">Add Data</button>
  <a href="<?= BASEURL ?>keranjang" class="btn btn-warning mx-2">Keranjang</a>
</div>
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nama Produk</th>
      <th scope="col">Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['produk'] as $produk) : ?>
      <?php if($produk['unit'] != 0) :?>
        <tr>
          <td><?= $produk['nama_produk']; ?></td>
          <td><?= $produk['jenis']; ?></td>
          <td>
            <a href="<?= BASEURL; ?>home/detail/<?= intval($produk['id']); ?>" class="badge bg-primary">Detail</a>
            <a href="<?= BASEURL; ?>home/ubah" class="badge bg-success modalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $produk['id'] ?>">Ubah</a>
            <a href="<?= BASEURL; ?>home/hapus/<?= intval($produk['id']); ?>" class="badge bg-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
            <a href="<?= BASEURL; ?>home/addKeranjang" class="badge bg-warning modalCart" data-bs-toggle="modal" data-bs-target="#cartModal" data-id="<?= $produk['id'] ?>">Masukkan Keranjang</a>
          </td>
        </tr>
        <?php endif;?>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= BASEURL; ?>home/addData" enctype="multipart/form-data">
          <input type="hidden" id="id" name="id">
          <?php Flasher::flashProduct() ?>
          <div class="row">
            <div class="col">
              <label for="produk" class="form-label">Nama Produk</label>
              <input name="produk" type="text" class="form-control" id="produk" placeholder="Mega mendung" required>
            </div>
            <div class="col">
              <label for="unit" class="form-label">Unit</label>
              <input name="unit" type="text" class="form-control" id="unit" placeholder="20" required>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <label for="harga" class="form-label">Harga</label>
              <input name="harga" type="text" class="form-control" id="harga" placeholder="100000" required>
            </div>
            <div class="col">
              <label for="jenis" class="form-label">Jenis Produk</label>
              <select name="jenis" class="form-select form-select-md mb-4 pilihJenis" aria-label=".form-select-lg example">
                <option selected value="1">Atasan</option>
                <option value="2">Baju</option>
                <option value="3">Bawahan</option>
              </select>
            </div>
          </div>
          <div class="row">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5"></textarea>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Pilih gambar</label>
            <input name="gambar" class="form-control" type="file" id="gambar">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" name="tambahProduk">Tambahkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah ke Keranjang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= BASEURL; ?>home/addKeranjang" enctype="multipart/form-data">
          <input type="hidden" id="id1" name="id1">
          <input type="hidden" id="count" name="count">
          <!-- <//?php Flasher::flashProduct() ?> -->
          <div class="row">
            <div class="col">
              <label for="produk1" class="form-label">Nama Produk</label>
              <h2 name="produk1" id="produk1"></h2>
            </div>
            <div class="col">
              <label for="unit1" class="form-label">Unit</label>
              <h3 name="unit1" id="unit1"></h3>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <label for="harga1" class="form-label">Harga</label>
              <h3 name="harga1" id="harga1"></h3>
            </div>
            <img src="" id="gambar1" class="gambarProduk">
          </div>
          <div class="row">
            <div class="container" style="margin-top: 20px;">
              <center>
                <input name="qty" maxlength="12" class="qty" value="1" readonly='true'>
              </center>
              <div class="button-container">
                <button id="min" class="cart-qty-minus op btn btn-primary mx-2 minmax" type="button" value="min">Min</button>
                <button class="cart-qty-minus op btn btn-primary mx-2" type="button" value="-">-</button>
                <button class="cart-qty-plus op btn btn-primary mx-2" type="button" value="+">+</button>
                <button id="max" class="cart-qty-plus op btn btn-primary mx-2 minmax" type="button" value="max">Max</button>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" name="tambahProduk">Tambahkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>