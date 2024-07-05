<?php
namespace App\Controllers;
use App\Models\MProduk;

class DashboardController extends BaseController
{
    public function index()
    {
        $model = new MProduk();
        $data['produks'] = $model->findAll();
        return view('dashboard', $data);
    }

    public function create()
    {
        return view('create_produk');
    }

    public function store()
    {
        $model = new MProduk();
        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
            $data['image'] = $newName;
        }

        $model->insert($data);
        return redirect()->to('/dashboard');
    }

    public function edit($id)
    {
        $model = new MProduk();
        $data['produk'] = $model->find($id);
        return view('edit_produk', $data);
    }

    public function update($id)
    {
        $model = new MProduk();
        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
            $data['image'] = $newName;
        }

        $model->update($id, $data);
        return redirect()->to('/dashboard');
    }

    public function delete($id)
    {
        $model = new MProduk();
        $model->delete($id);
        return redirect()->to('/dashboard');
    }
}
