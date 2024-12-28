<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

class CategoryController extends Controller
{

    public function index(): Response
    {
        $categories = Category::with('parent')->paginate(15);
        return Inertia::render('Admin/Category/Index', [
            'categories' => CategoryResource::collection($categories), 
            'pagination' => [
                'total' => $categories->total(),
                'per_page' => $categories->perPage(),
                'current_page' => $categories->currentPage(),
                'last_page' => $categories->lastPage(),
                'from' => $categories->firstItem(),
                'to' => $categories->lastItem(),
            ],
        ]);
    }

    public function show()
    {
        return 1;
    }
}
