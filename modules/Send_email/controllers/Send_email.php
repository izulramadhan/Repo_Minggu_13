<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'izul.purnama10@gmail.com',  // Email gmail
            'smtp_pass'   => 'izul101220',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@yourshoes.com', 'yourshoes.com');

        // Email penerima
        $this->email->to('izul.purnama10@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('File.png');

        // Subject email
        $this->email->subject('YourSOES || Online sepatu Termurah di Indonesia');

        // Isi email
        $this->email->message("Yang terhomat Tn/Ny, Selamat Pesanan Anda telah kami konfirmasi. Silahkan melakukan pembayaran sesuai yang tercantum");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }
}