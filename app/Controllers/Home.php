<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        // Example 1: Set data in session
        session()->set('message', 'Welcome to the Voting System!');

        // Example 2: Prepare data to pass to view
        $data = [
            'title' => 'Welcome Page',
            'message' => session()->get('message'),
            'user' => session()->get('username'), // Optional: display if logged in
        ];

        // Load the view and pass the data
        return view('welcome_message', $data);
    }

    public function save()
    {
        // Example: Handle form POST and save data in session
        $input = $this->request->getPost();

        if ($input) {
            session()->set('form_data', $input); // save all form data in session
            return redirect()->to('/home')->with('success', 'Data saved!');
        }

        return redirect()->back()->with('error', 'No data submitted');
    }
}
