<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ElectionModel;

class Election extends BaseController
{
    public function index()
    {
        $elections = (new ElectionModel())->findAll();
        echo view('admin/elections_list', compact('elections'));
    }

    public function create()
    {
        helper(['form']);
        if ($this->request->getMethod() === 'post') {
            $m = new ElectionModel();
            $m->insert($this->request->getPost([
                'title','description','start_time','end_time','status'
            ]));
            return redirect()->to('/admin/elections');
        }
        echo view('admin/create_election');
    }
}
