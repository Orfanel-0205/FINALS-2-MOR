<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check if user is not logged in
        if (! $session->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }

        // Check if role is required (e.g. 'admin') and does not match the session role
        if (! empty($arguments) && $session->get('role') !== $arguments[0]) {
            // Optional: you could redirect to a custom access denied page instead
            return redirect()->to('/auth/login');
        }

        // Proceed normally if logged in and role matches
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Not used, but can be implemented if needed
    }
}
