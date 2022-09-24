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

class OrderedModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ordered';
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
        $ordered = 'ordered.*,';
        $ticket_boat = '
            ticket_boat.category as ticket_category,
            ticket_boat.route_id,
            ticket_boat.pp,
            ticket_boat.price,
        ';
        $schedule = '
            schedule.boat_id,
            schedule.time_from,
            schedule.time_to,
        ';
        $route = '
            routes.name as route_name,
        ';
        $boat = '
            boat.kode_boat as boat_name,
        ';

        $query = $this->db->table($this->table);
        $query->select($ordered.$ticket_boat.$schedule.$route.$boat);
        $query->join('ticket_boat', 'ticket_boat.id = ordered.ticket_id', 'left');
        $query->join('schedule', 'schedule.id = ordered.schedule_id', 'left');
        $query->join('routes', 'routes.id = ticket_boat.route_id', 'left');
        $query->join('boat', 'boat.id = schedule.boat_id', 'left');
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
