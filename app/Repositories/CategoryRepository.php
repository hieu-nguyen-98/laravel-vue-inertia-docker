<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Category();
    }

    public function findByIdWithRelationship($id, $relations)
    {
        return $this->model->with($relations)->find($id);
    }

    public function get_with_relation_ship($search, $relations)
    {
        return $this->model->with($relations)
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search['name']}%");
            })
            ->when($search['start_date'], function ($query) use ($search) {
                $query->whereDate('created_at', '>=', $search['start_date']);
            })
            ->when($search['end_date'], function ($query) use ($search) {
                $query->whereDate('created_at', '<=', $search['end_date']);
            })
            ->paginate(15)->withQueryString();
    }
}
