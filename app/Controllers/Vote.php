<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ElectionModel;
use App\Models\CandidateModel;
use App\Models\VoteModel;

class Vote extends BaseController
{
    public function index()
    {
        $elections = (new ElectionModel())
            ->where('status', 'ongoing')
            ->findAll();
        echo view('vote/list', compact('elections'));
    }

    public function cast($electionId)
    {
        $candidateId = $this->request->getPost('candidate_id');
        $userId      = session('userId');

        // Ensure one vote per user per election
        $v = new VoteModel();
        if ($v->where([
            'user_id'     => $userId,
            'election_id' => $electionId
        ])->first()) {
            return redirect()->back()->with('error','You already voted.');
        }

        $v->insert([
            'user_id'     => $userId,
            'election_id' => $electionId,
            'candidate_id'=> $candidateId,
            'voted_at'    => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/vote/result/'.$electionId)
                         ->with('message','Vote submitted successfully!');
    }

    public function result($electionId)
    {
        $candidates = (new CandidateModel())
            ->where('election_id', $electionId)
            ->findAll();
        $votes = (new VoteModel())
            ->select('candidate_id, COUNT(*) as total')
            ->where('election_id', $electionId)
            ->groupBy('candidate_id')
            ->findAll();

        // map totals
        $counts = [];
        foreach ($votes as $row) {
            $counts[$row['candidate_id']] = $row['total'];
        }

        echo view('vote/result', compact('candidates','counts'));
    }
}
