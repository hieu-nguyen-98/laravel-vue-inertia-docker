<?php

namespace App\Repositories;

class BaseRepository
{
    protected $model;

    /**
     * @param array $data
     */

    public function insert(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     */
    public function updateById(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * @param array $where
     */
    public function count(array $where)
    {
        if (!empty($where)) {
            return $this->model->where($where)->count();
        }
        return $this->model->count();
    }

    /**
     * @param integer $id
     */
    public function findById(int $id)
    {
        return $this->model->whereKey($id)->first();
    }

    /**
     * @param integer $id
     */
    public function delete(int $id)
    {
        return $this->model->whereKey($id)->delete();
    }

    public function findAll()
    {
        return $this->model->get();
    }

    public function findAllAttribute($where)
    {
        return $this->model->where($where)->get();
    }

    public function findAttribute($where)
    {
        return $this->model->where($where)->first();
    }

    public function exists($where)
    {
        return $this->model->where($where)->exists();
    }
}
