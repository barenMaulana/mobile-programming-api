<?php
namespace App\Controllers;
use App\Models\MRegistrasi;
use CodeIgniter\RESTful\ResourceController;
$db = \Config\Database::connect();

class RegistrasiController extends ResourceController
{
    public function __construct()
    {
        // Set CORS headers for all responses
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        // If the request is an OPTIONS request
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            // Send the response to the client
            exit();
        }
    }

    public function registrasi()
    {
        // Handle OPTIONS request
        if ($this->request->getMethod() === 'options') {
            return $this->response->setStatusCode(200);
        }

        // Handle actual POST request
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
        ];

        $model = new MRegistrasi();
        $model->save($data);
        return $this->responseHasil(200, true, "Registrasi Berhasil");
    }

    private function responseHasil($status, $success, $message, $data = [])
    {
        return $this->response->setStatusCode($status)->setJSON([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ]);
    }
}
