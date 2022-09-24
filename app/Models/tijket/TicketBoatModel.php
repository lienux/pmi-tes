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

class TicketBoatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ticket_boat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'company_id',
        // 'name',
        'category',
        // 'boat_id',
        'route_id',
        'pp',
        'price'
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
        $ticket_boat = 'ticket_boat.*,';
        $boat = 'boat.kode_boat as boat_name,';
        $route = 'routes.name as route_name';

        $query = $this->db->table($this->table);
        $query->select($ticket_boat.$boat.$route);
        $query->join('boat', 'boat.id = ticket_boat.boat_id', 'left');
        $query->join('routes', 'routes.id = ticket_boat.route_id', 'left');
        // $builder->where('routes.active',1);
        // $query->orderBy('routes.id','ASC');

        return $query;
    }

    public function getAll($query) 
    {
        $count = $query->countAllResults(false);
        $row = $query->get()->getResult($this->tempReturnType);

        return [
            'count'=>$count,
            'data'=>$row,
        ];
    }
}
