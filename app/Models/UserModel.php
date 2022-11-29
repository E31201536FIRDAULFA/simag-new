<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama', 'email', 'jenisKelamin', 'tglLahir', 'role', 'status', 'divisi'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getUserDivisi()
    {
        $query = $this->db->table('user')
                    ->select('
                        divisi.id as divisi_id,
                        divisi.name as nama_divisi,
                        user.id as user_id,
                        user.*,
                        divisi.*,
                    ')
                    ->join('divisi', 'user.divisi = divisi.id', 'left')
                    ->where('role', 3)
                    ->where('status', 2)
                    ->get();
        return $query;
    }

    public function quotaDivisi($id)
    {
        $query = $this->db->table('user')
                ->where('divisi', $id)
                ->countAllResults();
        return $query;
    }
}
