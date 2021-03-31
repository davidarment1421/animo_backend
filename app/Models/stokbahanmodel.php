<?php

namespace App\Models;

use CodeIgniter\Model;

class stokbahanmodel extends Model


{


    public function getBahan()
    {
        return $this->db->table('stok')
            ->join('bahan', 'bahan.id=stok.idBahan')
            ->get()->getResultArray();
    }
    public function modelcari($nama)
    {

        $builder = $this->db->table('stok');
        $builder->select('*');
        $builder->join('bahan', 'bahan.id=stok.idBahan');
        $builder->where("nama", $nama);
        return $builder->get()->getResultArray();
    }
    public function updateBahan($data, $id)
    {

        $query = $this->db->table('stok')->update($data, array('id' => $id));
        return $query;
    }
    public function saveBahan($data)
    {
        $query = $this->db->table('stok')->insert($data);
        return $query;
    }
}
