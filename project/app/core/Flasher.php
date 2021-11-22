<?php

class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe, $error)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe,
            'err' => $error,
        ];
    }

    public static function flashAuth()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            ' . $_SESSION['flash']['pesan'] . ' yang anda masukkan <strong> ' . $_SESSION['flash']['aksi'] . ' </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        };
        unset($_SESSION['flash']);
    }

    public static function flashSay()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            Hai <strong> ' . $_SESSION['flash']['pesan'] . ' </strong> Selamat Datang di Website kami !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        };
        unset($_SESSION['flash']);
    }

    public static function flashProduct()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            Produk <strong> ' . $_SESSION['flash']['pesan'] . ' </strong> ' . $_SESSION['flash']['aksi'] . ' ! ' . $_SESSION['flash']['err'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        };
        unset($_SESSION['flash']);
    }

    public static function flashForgot()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            ' . $_SESSION['flash']['pesan'] . ' dengan email <strong> ' . $_SESSION['flash']['aksi'] . ' </strong> ' . $_SESSION['flash']['err'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        };
        unset($_SESSION['flash']);
    }
}