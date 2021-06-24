<?php

namespace App\Controllers;

use App\Controllers\M_Category as ControllersM_Category;
use CodeIgniter\Controller;
use App\Models\M_Category;

class akun extends Controller
{
    public function __construct()
    {
        $this->model = new M_Category();
    }

    public function index()
    {


        $data = [
            'judul' => 'Data Akun',
            'akun' => $this->model->getAllData()

        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');

        echo view('akun/index');
        echo view('templates/v_footer');
    }
    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'username' => 'required',
                'password' => 'required',
                'nama_lengkap' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',

            ]);

            if (!$val) {

                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Akun',
                    'akun' => $this->model->getAllData()
                ];

                echo view('template/v_header', $data);
                echo view('template/v_sidebar');
                echo view('template/v_topbar');
                echo view('akun/index', $data);
                echo view('template/v_footer');
            } else {
                $data = [
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin')

                ];

                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('akun'));
                }
            }
        } else {
            return redirect()->to('/akun');
        }
    }
    public function hapus($id)
    {
        $success = $this->model->hapus($id);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to(base_url('akun'));
        }
    }
    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $val = $this->validate([
                'username' => 'required',
                'password' => 'required',
                'nama_lengkap' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',

            ]);

            if (!$val) {

                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Akun',
                    'akun' => $this->model->getAllData()
                ];

                echo view('template/v_header', $data);
                echo view('template/v_sidebar');
                echo view('template/v_topbar');
                echo view('akun/index', $data);
                echo view('template/v_footer');
            } else {
                $id = $this->request->getVar('id');
                $data = [
                    'username' => $this->request->getVar('username'),
                    'password' => $this->request->getVar('password'),
                    'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                    'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                ];

                $success = $this->model->ubah($data, $id);
                if ($success) {
                    session()->setFlashdata('message', 'Diubahkan');
                    return redirect()->to(base_url('akun'));
                }
            }
        } else {
            return redirect()->to('/akun');
        }
    }
}
