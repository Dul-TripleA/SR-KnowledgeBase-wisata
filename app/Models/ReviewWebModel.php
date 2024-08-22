<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewWebModel extends Model
{
    protected $table            = 'tb_review_web';
    protected $primaryKey       = 'id_review_web';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    public function joinReviewWebUser(){
        return $this->join('tb_auth', 'tb_auth.id_user = tb_review_web.id_user')->get()->getResultArray();
    }
}
