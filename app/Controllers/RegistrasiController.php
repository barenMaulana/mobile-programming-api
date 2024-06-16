<?php
namespace App\Controllers;
use App\Models\MRegistrasi;
$db = \Config\Database::connect();

class RegistrasiController extends RestfulController
{
    public function registrasi()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
        ];
        $model = new MRegistrasi();
        $model->save($data);
        return $this->responseHasil(200, true, "Registrasi Berhasil");
    }
}