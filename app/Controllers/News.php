<?php namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
        
    }

    public function index()
    {
        $newsModel = new NewsModel();

        $data = [
            'news' => $newsModel->paginate(10),
            'pager' => $newsModel->pager,
            'title' => 'News List'
        ];

        echo view('templates/header', $data);
        echo view('news/index', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        $newsModel = new NewsModel();

        $data = [
            'title' => 'Create News'
        ];

        echo view('templates/header', $data);
        echo view('news/create', $data);
        echo view('templates/footer');
    }

    public function store()
    {
        $newsModel = new NewsModel();

        $title = $this->request->getPost('title');
        $body = $this->request->getPost('body');

        $news = [
            'title' => $title,
            'body' => $body,
            'slug' => url_title(strtolower($title))
        ];

        $save = $newsModel->save($news);

        if ($save) {
            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('news'));
            
        } else {
            session()->setFlashdata('error', 'Silakan isi form dengan benar');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->find($id);

        if (empty($news)) {
            session()->setFlashdata('error', 'Data not found');
            return redirect()->back();
            # code...
        }

        $data = [
            'title' => 'Edit News',
            'news' => $news
        ];

        echo view('templates/header', $data);
        echo view('news/edit', $data);
        echo view('templates/footer');
    }

    public function update($id)
    {
        $newsModel = new NewsModel();
        $title = $this->request->getPost('title');
        $body = $this->request->getPost('body');

        $news = [
            'title' => $title,
            'body' => $body,
            'slug' => url_title(strtolower($title))
        ];

        $update = $newsModel->update($id, $news);

        if ($update) {
            session()->setFlashdata('success', 'Data berhasil diperbaharui');
            return redirect()->to(base_url('news'));
        } else {
            session()->setFlashdata('error', 'Please, fill form correctly!');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $newsModel = new NewsModel();
        $delete = $newsModel->delete($id);

        if ($delete) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to(base_url('news'));

        } else {
            session()->setFlashdata('error', 'Data gagal dihapus');
            return redirect()->to(base_url('news'));
        }
    }
}