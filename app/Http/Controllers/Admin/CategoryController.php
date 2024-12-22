<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

class CategoryController extends Controller
{

    public function index(): Response
    {
        return Inertia::render('Admin/Category/Index');
        // $loggedInUser = Auth::user()->id;
        // $users = User::whereNot('id', $loggedInUser)
        //     ->whereNull('deleted_at')->get();

        // return Inertia::render('Admin/Users/Index', [
        //     'users' => UserResource::collection($users)
        // ]);
    }
}
