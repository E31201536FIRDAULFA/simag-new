<?php

namespace App\Models;

use CodeIgniter\Model;

class Divisi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'divisi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'quota',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function index()
    {
        $query = $this->db->table('divisi')
                    ->get();
        return $query;
    }

    public function getUserDivisiByID($id)
    {
        $query = $this->db->table('divisi')
                    ->select('
                        info_peserta.id as peserta_id,
                        divisi.id as divisi_id
                    ')
                    ->join('info_peserta', 'divisi.id = info_peserta.divisi')
                    ->where('userId', $id)
                    ->get();
        return $query;
    }
}
