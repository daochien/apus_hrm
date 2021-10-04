<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index(Request $request)
    {
    //    dd(DB::select(DB::raw("select nspname
    //    from pg_catalog.pg_namespace;")));
        //$this->userRepo->setTable(); bo thang nay
        $user = User::create([
            'email' => 'manhnv@apus.com',
            'name' => 'manhnv',
            'password' => encrypt('123456')
        ]);
        dd($user);
    }
}
