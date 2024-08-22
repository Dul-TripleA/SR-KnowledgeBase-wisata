<?php

namespace App\Models;

use CodeIgniter\Model;

class SimilarityModel extends Model
{
    protected $table            = 'tb_similarity';
    protected $primaryKey       = 'id_sim';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = false;
    protected $allowedFields    = [];


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getDataJoinDataSimWisata($limit = null)
    {
        $sql = "
        SELECT tb_similarity.*, tb_destinasi_wisata.nama_wisata
        FROM tb_similarity
        JOIN tb_destinasi_wisata ON tb_destinasi_wisata.id_wisata = tb_similarity.id_wisata
        JOIN (
            SELECT recommendation_Num, MAX(similarity) as max_similarity
            FROM tb_similarity
            GROUP BY recommendation_Num
        ) as max_similarity_tbl 
        ON tb_similarity.similarity = max_similarity_tbl.max_similarity
        AND tb_similarity.recommendation_Num = max_similarity_tbl.recommendation_Num
        WHERE tb_similarity.id_user LIKE '%unknown%'
        ORDER BY tb_similarity.recommendation_Num DESC
    ";

        if($limit !== null){
            $sql .= " LIMIT " . intval($limit);
        }
        
        
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }


    public function GetDataJoinDataSimWisataUser($limit = null)
    {
        $sql = "
        SELECT tb_similarity.*, tb_destinasi_wisata.nama_wisata, tb_auth.username
        FROM tb_similarity
        JOIN tb_destinasi_wisata ON tb_destinasi_wisata.id_wisata = tb_similarity.id_wisata
        JOIN (
            SELECT recommendation_Num, MAX(similarity) as max_similarity
            FROM tb_similarity
            GROUP BY recommendation_Num
        ) as max_similarity_tbl 
        ON tb_similarity.similarity = max_similarity_tbl.max_similarity
        AND tb_similarity.recommendation_Num = max_similarity_tbl.recommendation_Num
        JOIN tb_auth ON tb_similarity.id_user = tb_auth.id_user
        WHERE tb_similarity.id_user NOT LIKE '%unknown%'
        ORDER BY tb_similarity.recommendation_Num DESC 
    ";
    
        if($limit !== null){
            $sql .= " LIMIT " . intval($limit);
        }

        $query = $this->db->query($sql);
        return $query->getResultArray();
    }
    

    
}
