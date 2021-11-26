$(document).ready(function () {
    $('.modalTambah').click(function () {
        $('#formModalLabel').html('Tambah Produk');
        $('.modal-footer button[type=submit]').html('Tambahkan');
        $('.modal-body form').attr('action', 'http://localhost/mvc/project/public/home/addData')
        $('#id').val('');
        $('#produk').val('');
        $('#unit').val('');
        $('#harga').val('');
        $('.pilihJenis').val(1);
        $('#deskripsi').val('');
    })
    $('.modalUbah').click(function () {
        // console.log($('#unit').val());
        $('#formModalLabel').html('Ubah Data Produk');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/mvc/project/public/home/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mvc/project/public/home/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#produk').val(data.nama_produk);
                $('#unit').val(data.unit);
                $('#harga').val(data.harga);
                $('.pilihJenis').val(data.jenis);
                $('#deskripsi').val(data.deskripsi);
                // $('#gambar').val(data.image);
                // console.log(data.jenis);
            }
        })

    })

    var hitung = 0;
    $('.modalCart').click(function () {
        // console.log($('#unit').val());
        $('#formModalLabel').html('Tambahkan ke Keranjang');
        $('.modal-footer button[type=submit]').html('Selesai');
        $('.modal-body form').attr('action', 'http://localhost/mvc/project/public/home/addKeranjang')
        
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mvc/project/public/home/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id1').val(data.id);
                $('#produk1').text(data.nama_produk);
                $('#unit1').text(data.unit);
                $('#harga1').text(data.harga);
                $('#gambar1').attr('src', 'images/' + data.image);
                // console.log(data.jenis);
                hitung = data.unit;
                if (data.unit == 1) {
                    $('.cart-qty-plus').prop('disabled', true);
                }
            }
        })
        $('.qty').val(1);
        if ($('.qty').val() == 1) {
            $('.cart-qty-minus').prop('disabled', true);
            $('.cart-qty-plus').prop('disabled', false);
        }
        
    });
    var $input = $(".qty");

    $('#max').click(function () {
        $input.val(hitung - 1);
    })
    $('#min').click(function () {
        $input.val(1);
        $('.cart-qty-minus').prop('disabled', true);
    })
    // Class pada tombol + -
    $(".op").click(function () {
        if ($(this).hasClass('cart-qty-plus')) {
            $input.val(parseInt($input.val()) + 1);
            if ($('.qty').val() > 1) {
                $('.cart-qty-minus').prop('disabled', false);
            }
        }
        else if ($input.val() > 1) {
            $input.val(parseInt($input.val()) - 1);
            if ($('.qty').val() == 1) {
                $('.cart-qty-minus').prop('disabled', true);
            }
        }
        if ($('.qty').val() >= parseInt(hitung)) {
            $('.cart-qty-plus').prop('disabled', true);

        }
        else if ($('.qty').val() < parseInt(hitung)) {
            $('.cart-qty-plus').prop('disabled', false);

        }

    })
    //Ketika submit modal
    $(document).on('submit', '#cartModal', function () {
        $('#count').val(parseInt($('.qty').val()));
    });
})
