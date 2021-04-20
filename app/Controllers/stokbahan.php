<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\stokbahanmodel;


class stokbahan extends Controller
{
    public function __construct()
    {

        // Mendeklarasikan class ProductModel menggunakan $this->product
        $this->product = new stokbahanmodel();
    }
    public function index()

    {

        $model = new stokbahanmodel();
        $data['stok'] = $model->getBahan();
        echo view('stokbahan', $data);
    }
    public function pencarian()
    {
        $model = new stokbahanmodel();
        $nama = $this->request->getVar('nama');
        $data['stok'] = $model->modelcari($nama);

        echo view("stokbahan", $data);
    }
    public function edit($id)
    {
        $model = new stokbahanmodel();
        // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['stok'] = $model->getBahan($id);
        // Mengirim data ke dalam view
        return view('edit', $data);
    }
    public function update($id)
    {
        $model = new stokbahanmodel();
        // Mengambil value dari form dengan method POST
        $updateDate = $this->request->getPost('updateDate');
        $stokAwal = $this->request->getPost('stokAwal');
        $stokMasuk = $this->request->getPost('stokMasuk');
        $stokKeluar = $this->request->getPost('stokKeluar');
        $stokAkhir = $stokAwal + $stokMasuk - $stokKeluar;

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'updateDate' => $updateDate,
            'stokAwal' => $stokAwal,
            'stokMasuk' => $stokMasuk,
            'stokKeluar' => $stokKeluar,
            'stokAkhir' => $stokAkhir
        ];

        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $model->updateBahan($data, $id);

        // Jika berhasil melakukan ubah
        if ($ubah) {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Bahan berhasil di update');
            // Redirect ke halaman product
            return redirect()->to('http://localhost:8081/stokbahan');
        }
    }
}
