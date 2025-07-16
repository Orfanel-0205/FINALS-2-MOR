<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CandidateModel;
use App\Models\ElectionModel;

class Candidate extends BaseController
{
    public function index($electionId)
    {
        $model = new CandidateModel();
        $candidates = $model->where('election_id', $electionId)->findAll();

        return view('admin/candidates_list', [
            'candidates' => $candidates,
            'electionId' => $electionId,
        ]);
    }

    public function create($electionId)
    {
        helper(['form']);
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required',
                'bio'  => 'required'
            ];

            if (! $this->validate($rules)) {
                return view('admin/create_candidate', [
                    'validation' => $this->validator,
                    'electionId' => $electionId
                ]);
            }

            $model = new CandidateModel();
            $model->insert([
                'election_id' => $electionId,
                'name'        => $this->request->getPost('name'),
                'bio'         => $this->request->getPost('bio'),
            ]);

            return redirect()->to("/admin/candidates/$electionId");
        }

        return view('admin/create_candidate', ['electionId' => $electionId]);
    }

    public function edit($id)
    {
        $model = new CandidateModel();
        $candidate = $model->find($id);

        if (! $candidate) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Candidate not found");
        }

        return view('admin/edit_candidate', [
            'candidate' => $candidate,
        ]);
    }

    public function update($id)
    {
        helper(['form']);
        $model = new CandidateModel();
        $candidate = $model->find($id);

        if (! $candidate) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Candidate not found");
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required',
                'bio'  => 'required'
            ];

            if (! $this->validate($rules)) {
                return view('admin/edit_candidate', [
                    'candidate'  => $candidate,
                    'validation' => $this->validator
                ]);
            }

            $model->update($id, [
                'name' => $this->request->getPost('name'),
                'bio'  => $this->request->getPost('bio'),
            ]);

            return redirect()->to("/admin/candidates/" . $candidate['election_id']);
        }

        return view('admin/edit_candidate', ['candidate' => $candidate]);
    }

    public function delete($id)
    {
        $model = new CandidateModel();
        $candidate = $model->find($id);

        if ($candidate) {
            $model->delete($id);
            return redirect()->to('/admin/candidates/' . $candidate['election_id'])
                             ->with('message', 'Candidate deleted successfully');
        }

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Candidate not found");
    }
}
