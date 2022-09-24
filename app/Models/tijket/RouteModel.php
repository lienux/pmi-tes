<?php

namespace App\Models\tijket;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: Tijket
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\Model;
use \Config\DorbitT;

class RouteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'routes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'active',
        'company_id',
        'name',
        'pulau_asal',
        'from_id',
        'pulau_tujuan',
        'to_id',
        'distance',
    ];

    // Dates
    protected $useTimestamps = true;
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


    public function query()
    {
        $route = 'routes.*,';
        $company = 'company.name as company_name,company.email as company_email,company.image as company_image,';
        $pelabuhan = 'pelabuhan.name as from_name';
        $pulau = 'pulau.name as from_island,';

        $query = $this->db->table($this->table);
        $query->select($route.$company.$pelabuhan.$pulau);
        $query->join('company', 'company.id = routes.company_id', 'left');
        $query->join('pelabuhan', 'pelabuhan.id = routes.from_id', 'left');
        $query->join('pulau', 'pulau.id = routes.pulau_asal', 'left');
        // $builder->where('routes.active',1);
        // $query->orderBy('routes.id','ASC');

        return $query;
    }

    public function getAll($query) 
    {
        $count = $query->countAllResults(false);
        $row = $query->get()->getResult($this->tempReturnType);

        $qPelabuhan     = $this->db->table('pelabuhan');
        $qPelabuhan     = $qPelabuhan->select('*');
        $qPelabuhan     = $qPelabuhan->get()->getResult($this->tempReturnType);

        foreach ((array) $row as $key => $value) {
            $to_id = $value['to_id'];

            foreach ($qPelabuhan as $key2 => $value2) {
                $id = $value2['id'];
                if ($id==$to_id) {
                    $to_name = $value2['name'];
                }
            }

            $row[$key]['to_name'] = $to_name;
        }

        return [
            'count'=>$count,
            'data'=>$row,
        ];
    }


    public function query_search()
    {
        $route      = 'routes.*,';
        $company    = 'company.name as company_name, company.email as company_email,company.image as company_image,';
        $pelabuhan  = 'pelabuhan.name as from_harbor,';
        $pulau      = 'pulau.name as from_island,';
        // $schedule = 'schedule.time_from,schedule.time_to';

        $query = $this->db->table($this->table);
        $query->select($route.$company.$pelabuhan.$pulau);
        $query->join('company', 'company.id = routes.company_id', 'left');
        $query->join('pelabuhan', 'pelabuhan.id = routes.from_id', 'left');
        $query->join('pulau', 'pulau.id = routes.pulau_asal', 'left');
        // $query->join('schedule', 'schedule.route_id = routes.id', 'left');
        // $builder->where('routes.active',1);
        // $query->orderBy('routes.id','ASC');

        return $query;
    }

    public function getAll_search($query) 
    {
        $count = $query->countAllResults(false);
        $row = $query->get()->getResult($this->tempReturnType);

        $qPelabuhan     = $this->db->table('pelabuhan');
        $qPelabuhan     = $qPelabuhan->select('*');
        $qPelabuhan     = $qPelabuhan->get()->getResult($this->tempReturnType);

        $qPulau     = $this->db->table('pulau');
        $qPulau     = $qPulau->select('*');
        $qPulau     = $qPulau->get()->getResult($this->tempReturnType);

        foreach ((array) $row as $key => $value) {
            $to_id = $value['to_id'];
            $pulau_tujuan_id = $value['pulau_tujuan'];

            foreach ($qPelabuhan as $key2 => $value2) {
                $id = $value2['id'];
                if ($id==$to_id) {
                    $to_harbor = $value2['name'];
                }
            }

            foreach ($qPulau as $key3 => $value3) {
                $id = $value3['id'];
                if ($id==$pulau_tujuan_id) {
                    $to_island = $value3['name'];
                }
            }

            $row[$key]['to_harbor'] = $to_harbor;
            $row[$key]['to_island'] = $to_island;
        }


        return [
            'count'=>$count,
            'data'=>$row,
        ];
    }
}
