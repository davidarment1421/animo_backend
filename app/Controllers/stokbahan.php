<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\stokbahanmodel;


class stokbahan extends Controller
{

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
    public function update()
    {
        $model = new stokbahanmodel();
        $id = $this->request->getVar('id');
        $data = array(
            'id'        => $this->request->getVar('id'),
            'stokAwal'        => $this->request->getVar('stokAwal'),
            'stokMasuk'        => $this->request->getVar('stokMasuk'),
            'stokKeluar'        => $this->request->getVar('stokKeluar'),
            'updateDate'       => $this->request->getVar('updateDate'),

        );
        $model->updateBahan($data, $id);
        return redirect()->to('http://localhost:8081/stokbahan/');
    }
    public function save()
    {
        $model = new stokbahanmodel();
        $data = array(
            'id'        => $this->request->getPost('id'),
            'stokAwal'        => $this->request->getPost('stokAwal'),
            'stokMasuk'        => $this->request->getPost('stokMasuk'),
            'stokKeluar'        => $this->request->getPost('stokKeluar'),
            'updateDate'       => $this->request->getPost('updateDate'),
        );
        $model->saveBahan($data);
        return redirect()->to('http://localhost:8081/stokbahan/');
    }
}
