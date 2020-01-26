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

}