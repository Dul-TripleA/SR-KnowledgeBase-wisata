<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingWebModel extends Model
{
    protected $table            = 'tb_setting_web';
    protected $primaryKey       = 'id_setting';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

}
