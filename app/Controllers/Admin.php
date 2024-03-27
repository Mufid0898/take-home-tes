<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Profile',
            'subjudul' => '',
            'menu' => 'profile',
            'submenu' => '',
            'page' => 'v_admin'
        ];
        return view('v_template', $data);
    }
}
