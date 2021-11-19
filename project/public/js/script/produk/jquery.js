$(document).ready(function() {
    $('.modalTambah').click(function() {
        $('#formModalLabel').html('Tambah Produk');
        $('.modal-footer button[type=submit]').html('Tambahkan');
    })

    $('.modalUbah').click(function() {
        $('#formModalLabel').html('Ubah Data Produk');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/mvc/project/public/home/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mvc/project/public/home/getUbah',
            data: {id:id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#produk').val(data.nama_produk);
                $('#unit').val(data.unit);
                $('#harga').val(data.harga);
                $('.pilihJenis').val(data.jenis);
                $('#deskripsi').val(data.deskripsi);
                console.log(data.jenis);
            }
        })

    })
})