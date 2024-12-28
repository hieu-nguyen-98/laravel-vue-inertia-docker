<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

class CategoryController extends Controller
{
    protected $cateogryRepository;

    public function __construct(CategoryRepository $cateogryRepository)
    {
        $this->cateogryRepository = $cateogryRepository;
    }
    public function index(Request $request): Response
    {
        $search = [
            'name' => $request->get('search', ''),
            'start_date' => $request->get('start_date', ''),
            'end_date' => $request->get('end_date', ''),
        ];
        $realtions = ['parent'];
        $categories = $this->cateogryRepository->get_with_relation_ship($search, $realtions);
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
            'filters' => $search['name']
        ]);
    }

    public function show($id): Response
    {
        $relations = ['parent'];
        $category = $this->cateogryRepository->findByIdWithRelationship($id, $relations);

        return Inertia::render('Admin/Category/Show', [
            'category' => $category
        ]);
    }
}
