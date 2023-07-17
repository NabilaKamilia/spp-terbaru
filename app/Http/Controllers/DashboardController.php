<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard',[
            'user'=> User::count(),
            'kelas'=> Kelas::count(),
            'siswa'=> Siswa::count(),
           
        ]);
    }
}
