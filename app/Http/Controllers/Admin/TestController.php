<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function __construct(private AdminService $adminService)
    {
    }

    public function createView()
    {
        return view('admin.pages.test.create');
    }

    public function create(Request $request)
    {
    }

    public function update()
    {
    }


    public function delete()
    {
    }
}
