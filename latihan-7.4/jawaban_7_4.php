<?php
/*
 * JAWABAN LATIHAN 7.4
 *
 * 1. Tambah validasi ISBN pada buku/proses_tambah.php:
 *    jika ISBN tidak kosong, hanya angka dan tanda hubung.
 *
 * 2. Anggota/proses_tambah.php perlu menggunakan flash message untuk
 *    error maupun sukses, mengikuti pola buku/proses_tambah.php.
 *
 * 3. Field anggota yang layak divalidasi tambahan bergantung pada form
 *    anggota. Aturan yang aman dari pola jobsheet:
 *    - field teks wajib tidak boleh kosong,
 *    - field identitas/kode yang ditentukan formatnya perlu regex,
 *    - nilai numerik harus benar-benar angka dan berada pada rentang yang
 *      masuk akal jika field tersebut memang berupa angka.
 *
 * Contoh implementasi nomor 1:
 */

$isbn = trim($_POST['isbn'] ?? '');

$errors = [];

if ($isbn !== '' && !preg_match('/^[0-9-]+$/', $isbn)) {
    $errors[] = "ISBN hanya boleh berisi angka dan tanda hubung.";
}

/*
 * Letakkan validasi ini setelah pengambilan $_POST dan sebelum blok
 * if (!empty($errors)) yang melakukan redirect ke tambah.php.
 *
 * Contoh blok akhirnya:
 *
 * if (!empty($errors)) {
 *     $_SESSION['flash'] = [
 *         'type' => 'error',
 *         'pesan' => implode(' ', $errors)
 *     ];
 *     header('Location: tambah.php');
 *     exit;
 * }
 *
 * Untuk anggota, pola flash yang sama dapat digunakan:
 *
 * $_SESSION['flash'] = [
 *     'type' => 'success',
 *     'pesan' => 'Anggota berhasil ditambahkan.'
 * ];
 * header('Location: list.php');
 * exit;
 */
