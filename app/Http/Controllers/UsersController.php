<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends ApiController
{
    public function export() 
    {
        DB::beginTransaction();
        DB::commit();
        DB::rollBack();
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
