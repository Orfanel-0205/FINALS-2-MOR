<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function it0049(): string
    {
        echo "<h1>Hello, IT0049!</h1>";
    }
}
