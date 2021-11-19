<!-- <//?= "<script>
alert('Login Berhasil, Selamat Datang');
</script>";
?> -->
<div class="container flash">
  <?php if (isset($_COOKIE['produk'])) : ?>
    <?php Flasher::flashProduct() ?>
  <?php else : ?>
    <?php Flasher::flashSay() ?>
  <?php endif; ?>
</div>
<div class="d-flex flex-row-reverse">
  <a href="<?= BASEURL ?>logout" class="btn btn-danger mx-2" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
  <button type="button" class="btn btn-primary modalTambah" data-bs-toggle="modal" data-bs-target="#formModal">Add Data</button>
</div>
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nama Produk</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['produk'] as $produk) : ?>
      <tr>
        <td><?= $produk['nama_produk']; ?></td>
        <td>
          <a href="<?= BASEURL; ?>home/detail/<?= intval($produk['id']); ?>" class="badge bg-primary">Detail</a>
          <a href="<?= BASEURL; ?>home/ubah" class="badge bg-success modalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $produk['id']?>">Ubah</a>
          <a href="<?= BASEURL; ?>home/hapus/<?= intval($produk['id']); ?>" class="badge bg-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
        </td>
      </tr>
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