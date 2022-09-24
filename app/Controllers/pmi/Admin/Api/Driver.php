<?php

namespace App\Controllers\Admin\Api;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: https://trackingnesia.com/
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\Files\UploadedFile;
use App\Models\UserModel;
use App\Models\VehicleModel;
use App\Models\DriverModel;
use App\Models\UserDriverModel;

class Driver extends ResourceController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->driverModel = new DriverModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        // 
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $driver = $this->driverModel->find($id);
        if ($driver) {
            $data = array(
                "status" => true,
                "trackingnesia" => $driver
            );            
        }else{
            $data = array(
                "status" => false,
                "trackingnesia" => null
            );
        }
        return $this->respond($data, 200);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);

        $user = $this->request->getVar('user');
        if ($user) {
            $user = $user;
        }else{
            $user = [0];
        }
        $user = array_merge([$this->userModel->userID()],$user);
        $users = json_encode($user);

        $foto_pengemudi = $this->request->getFile('foto_pengemudi');
        $newName_fotoPengemudi = $foto_pengemudi->getRandomName();

        $foto_sim = $this->request->getFile('foto_sim');
        $newName_fotoSim = $foto_sim->getRandomName();

        $foto_ktp = $this->request->getFile('foto_ktp');
        $newName_fotoKtp = $foto_ktp->getRandomName();

        $data = [
            'company_id'        => $this->userModel->companyID(),
            'user_id'           => $this->userModel->companyID(),
            'installer'         => $this->userModel->companyID(),
            'name'              => $this->request->getVar('name'),
            'tempat_lahir'      => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir'     => $this->request->getVar('tanggal_lahir'),
            'no_sim'            => $this->request->getVar('no_sim'),
            'masa_sim'          => $this->request->getVar('masa_sim'),
            'telp'              => $this->request->getVar('telp'),
            'ibutton_id'        => $this->request->getVar('ibutton'),
            'active'            => $this->request->getVar('active'),
            'users'             => $users
        ];

        if ($foto_pengemudi->isValid() && ! $foto_pengemudi->hasMoved()){
            $foto_pengemudi->move(ROOTPATH.'public/uploads/images/drivers/',$newName_fotoPengemudi);
            $data = array_merge($data,['foto_pengemudi'=>$newName_fotoPengemudi]);
        }
        if ($foto_sim->isValid() && ! $foto_sim->hasMoved()){
            $foto_sim->move(ROOTPATH.'public/uploads/images/drivers/',$newName_fotoSim);
            $data = array_merge($data,['foto_sim'=>$newName_fotoSim]);
        }
        if ($foto_ktp->isValid() && ! $foto_ktp->hasMoved()){
            $foto_ktp->move(ROOTPATH.'public/uploads/images/drivers/',$newName_fotoKtp);
            $data = array_merge($data,['foto_ktp'=>$newName_fotoKtp]);
        }

        $rules = [
            'name'          => 'required|min_length[3]|max_length[50]',
            'telp'          => 'required|min_length[5]|max_length[50]'
        ];
         
        if($this->validate($rules)){
            $insert = $this->driverModel->insert($data);
            if ($insert){
                $response = array(
                    "status" => true,
                    "message" => "Insert data success.",
                    "trackingnesia" => ["id"=>$insert]
                );
            }else{
                $response = array(
                    "status" => false,
                    "message" => "Insert data error!",
                    "trackingnesia" => null
                );
            }
        }else{
            $response = array(
                "status" => false,
                "message" => "Validation error! <br>".$this->validator->listErrors(),
                "trackingnesia" => null
            );
        }

        return $this->respond($response, 200);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        helper(['form']);

        $user = $this->request->getVar('user');
        if ($user) {
            $user = $user;
        }else{
            $user = ["0"];
        }
        $user = array_merge([$this->userModel->userID()],$user);
        $users = json_encode($user);

        $foto_pengemudi = $this->request->getFile('foto_pengemudi');
        $newName_fotoPengemudi = $foto_pengemudi->getRandomName();

        $foto_sim = $this->request->getFile('foto_sim');
        $newName_fotoSim = $foto_sim->getRandomName();

        $foto_ktp = $this->request->getFile('foto_ktp');
        $newName_fotoKtp = $foto_ktp->getRandomName();

        $data = [
            'name'              => $this->request->getVar('name'),
            'tempat_lahir'      => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir'     => $this->request->getVar('tanggal_lahir'),
            'no_sim'            => $this->request->getVar('no_sim'),
            'masa_sim'          => $this->request->getVar('masa_sim'),
            'telp'              => $this->request->getVar('telp'),
            'ibutton_id'        => $this->request->getVar('ibutton_id'),
            'active'            => $this->request->getVar('active'),
            'users'             => $users
        ];

        if ($foto_pengemudi->isValid() && ! $foto_pengemudi->hasMoved()){
            $foto_pengemudi->move(ROOTPATH.'public/uploads/images/drivers/',$newName_fotoPengemudi);
            $data = array_merge($data,['foto_pengemudi'=>$newName_fotoPengemudi]);
        }
        if ($foto_sim->isValid() && ! $foto_sim->hasMoved()){
            $foto_sim->move(ROOTPATH.'public/uploads/images/drivers/',$newName_fotoSim);
            $data = array_merge($data,['foto_sim'=>$newName_fotoSim]);
        }
        if ($foto_ktp->isValid() && ! $foto_ktp->hasMoved()){
            $foto_ktp->move(ROOTPATH.'public/uploads/images/drivers/',$newName_fotoKtp);
            $data = array_merge($data,['foto_ktp'=>$newName_fotoKtp]);
        }

        $rules = [
            'name'          => 'required|min_length[3]|max_length[50]',
            'telp'          => 'required|min_length[5]|max_length[50]'
        ];

         
        if($this->validate($rules)){
            $update = $this->driverModel->update($id,$data);
            if ($update){
                $response = array(
                    "status" => true,
                    "message" => "Update data success.",
                    "trackingnesia" => ["id"=>$update]
                );
            }else{
                $response = array(
                    "status" => false,
                    "message" => "Update data error!",
                    "trackingnesia" => null
                );
            }
        }else{
            $response = array(
                "status" => false,
                "message" => "Validation error! <br>".$this->validator->listErrors(),
                "trackingnesia" => null
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
        $delete = $this->driverModel->delete($id);
        if ($delete) {
            $response = [
                "status" => true,
                "message" => "Delete success.",
                "trackingnesia" => $delete
            ];
        }else{
            $response = [
                "status" => false,
                "message" => "Delete error.",
                "trackingnesia" => null
            ];
        }
        return $this->respond($response, 200);
    }

    public function delete_in($id)
    {
        $id_arr = explode(',',$id);
        
        $delete = $this->driverModel->delete($id_arr);
        if ($delete) {
            $response = [
                "status" => true,
                "message" => "Delete success.",
                "trackingnesia" => $delete
            ];
        }else{
            $response = [
                "status" => false,
                "message" => "Delete error.",
                "trackingnesia" => null
            ];
        }
        return $this->respond($response, 200);
    }


    public function do_upload()
    {   

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('uploadfile?msg=Method Salah'));
        }

        //$request = \Config\Services::request();
        $file = $this->request->getFile('uploadedFile');
        $name = $file->getName();// Mengetahui Nama File
        $originalName = $file->getClientName();// Mengetahui Nama Asli
        $tempfile = $file->getTempName();// Mengetahui Nama TMP File name
        $ext = $file->getClientExtension();// Mengetahui extensi File
        $type = $file->getClientMimeType();// Mengetahui Mime File
        $size_kb = $file->getSize('kb'); // Mengetahui Ukuran File dalam kb
        $size_mb = $file->getSize('mb');// Mengetahui Ukuran File dalam mb

        
        //$namabaru = $file->getRandomName();//define nama fiel yang baru secara acak
        
        if ($type == (('image/png') or ('image/jpeg'))) //cek mime file
        {   // File Tipe Sesuai
            $image = \Config\Services::image('gd'); //Load Image Libray
            $info = $image->withFile($file)->getFile()->getProperties(true); //Mendapatkan Files Propertis
            $width = $info['width'];// Mengetahui Image Width
            $height = $info['height'];// Mengetahui Image Height

            helper('filesystem'); // Load Helper File System
            $direktori = ROOTPATH.'upload'; //definisikan direktori upload
            $namabaru = 'user_name.jpg'; //definisikan nama fiel yang baru
            $map = directory_map($direktori, FALSE, TRUE); // List direktori

            /* Cek File apakah ada */
            foreach ($map as $key) {
                if ($key == $namabaru){
                    delete_files($direktori,$namabaru); //Hapus terlebih dahulu jika file ada
                }
            }
            //Metode Upload Pilih salah satu
            //$path = $this->request->getFile('uploadedFile')->store($direktori, $namabaru);
            //$file->move($direktori, $namabaru)
            if ($file->move($direktori, $namabaru)){
                return redirect()->to(base_url('uploadfile?msg=Upload Berhasil'));
            }else{

                return redirect()->to(base_url('uploadfile?msg=Upload Gagal'));
            }
        }else{
            // File Tipe Tidak Sesuai
            return redirect()->to(base_url('uploadfile?msg=Format File Salah'));
        }
    }

    public function upload(){
        $file =  $this->request->getFile('gambar');
        $randomName = $file->getRandomName();
        if ($file->isValid() && ! $file->hasMoved())
        {
            $file->move(ROOTPATH.'public/uploads/',$randomName);
            session()->setFlashData('message','Berhasil upload');
        }else{
            session()->setFlashData('message','Gagal upload');
        }
        
        return redirect()->to(base_url("/"));
    }
}
