<?
echo "<script>
alert('Login Berhasil, Selamat Datang');
</script>";
?>
<div class="d-flex flex-row-reverse">
  <form action="<?= BASEURL?>logout">
    <button type="submit" class="btn btn-danger">Logout</button>
  </form>
</div>
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nama Produk</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['produk'] as $produk) : ?>
      <tr>
        <td><?= $produk['nama_produk']; ?></td>
        <td>
          <a href="<?= BASEURL; ?>home/detail/<?= intval($produk['id']); ?>" class="badge bg-primary">Click</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>