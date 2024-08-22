<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewWisataModel extends Model
{
    protected $table            = 'tb_review';
    protected $primaryKey       = 'id_review';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    public function getReview()
    {
        return $this->db->table('tb_review')
            ->select('tb_review.*, tb_destinasi_wisata.nama_wisata, tb_auth.username, tb_auth.profile_pic')
            ->join('tb_destinasi_wisata', 'tb_review.id_wisata = tb_destinasi_wisata.id_wisata')
            ->join('tb_auth', 'tb_review.id_user = tb_auth.id_user')
            ->orderBy('tb_review.id_review', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();
    }
}
