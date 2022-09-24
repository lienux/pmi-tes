<?php

namespace App\Controllers\pmi\DDS;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\Files\UploadedFile;
use \Config\DorbitT;
use App\Models\pmi\PasienModel;
use App\Models\pmi\GolonganDarahModel;
use App\Models\pmi\DdsModel;

class Registrasi extends ResourceController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->dorbitt = new DorbitT();
        $this->mPasien = new PasienModel();
        $this->mGoldar = new GolonganDarahModel();
        $this->mDds = new DdsModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        // echo "OK";
        $company = $this->dorbitt->company;
        // $query = $this->mPasien->where('company_id',session()->get('user_id'))->findAll();
        // $golongan_darah = $this->mGoldar->findAll();
        // echo json_encode($query);
        $data = [
            'company'       => $company,
            'view'          => $company['view'],
            'identity'      => $this->dorbitt->identity,
            // 'navlink'       => 'pasien',
            'page'          => 'register',
            // 'modal'         => 'dds/modal',
            // 'appjs'         => 'dds/appjs',
            'breadcrumb'    => ['Pasien','Index'],
            'breadcrumb_active' => ['active',''],
            // 'pasien'        => $query,
            // 'golongan_darah'    => $golongan_darah,
            // 'masterdata'    => true,
        ];

        return view('pmi/Frontend/DDS/Layout/main',$data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $request = $this->mPasien->find($id);
        if ($request) {
            $data = array(
                "status" => true,
                "pmi" => $request
            );            
        }else{
            $data = array(
                "status" => false,
                "pmi" => null
            );
        }
        return $this->respond($data, 200);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // echo "OK";
        $data = [
            'nik'               => $this->request->getVar('nik'),
            'lokasi'            => $this->request->getVar('lokasi'),
            'no_hp'             => $this->request->getVar('noHP'),
        ];

        // echo json_encode($data);

        $rules = [
            'ktp'               => 'required',
            'lokas'             => 'required',
            'no_hp'             => 'required',
        ];
         
        if($this->validate($rules)){        
            $insert = $this->mDds->insert($data);
            if ($insert){

                $response = array(
                    "status" => true,
                    "message" => "Insert data success.",
                    "pmi" => ["id"=>$insert]
                );
            }else{
                $response = array(
                    "status" => false,
                    "message" => "Insert data error!",
                    "pmi" => null
                );
            }
        }else{
            $response = array(
                "status" => false,
                "message" => "Validation error! <br>".$this->validator->listErrors(),
                "pmi" => null
            );
        }

        return $this->respond($response, 200);      
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = [
            'nama'              => $this->request->getVar('nama'),
            'alamat'            => $this->request->getVar('alamat'),
            'gol_darah'         => $this->request->getVar('golongan_darah'),
            'rhesus'            => $this->request->getVar('rhesus'),
            'kelamin'           => $this->request->getVar('jenis_kelamin'),
            'keluarga'          => $this->request->getVar('keluarga'),
            'tgl_lahir'         => $this->request->getVar('tgl_lahir'),
            'tlppasien'         => $this->request->getVar('telp'),
            'umur'              => $this->request->getVar('umur'),
        ];

        $rules = [
            'nama'              => 'required',
            'jenis_kelamin'     => 'required',
            'tgl_lahir'         => 'required',
        ];

        $update = $this->mPasien->update($id, $data);
        if ($update){
            $response = array(
                "status" => true,
                "message" => "Update data success.",
                "pmi" => ["id"=>$update]
            );
        }else{
            $response = array(
                "status" => false,
                "message" => "Update data error!",
                "pmi" => null
            );
        }

        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $delete = $this->mPasien->delete($id);
        if ($delete) {
            $response = [
                "status" => true,
                "message" => "Delete success.",
                "pmi" => $delete
            ];
        }else{
            $response = [
                "status" => false,
                "message" => "Delete error.",
                "pmi" => null
            ];
        }
        return $this->respond($response, 200);
    }

    public function delete_in($id)
    {
        $id_arr = explode(',',$id);
        
        $delete = $this->mPasien->delete($id_arr);

        if ($delete) {
            $response = [
                "status" => true,
                "message" => "Delete success.",
                "pmi" => $delete
            ];
        }else{
            $response = [
                "status" => false,
                "message" => "Delete error.",
                "pmi" => null
            ];
        }
        return $this->respond($response, 200);
    }

    public function getMax()
    {
        // echo "OK";
        $query = $this->mPasien->query();
        $query = $query->selectMAX('id');
        return $query->get()->getResult();
    }
}
