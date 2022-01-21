<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

class BaseRepo
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        return $this->model->get();
    }
    public function getAllWithPaginate($item_per_page)
    {
        return $this->model->paginate($item_per_page);
    }
    public function getDetail($id)
    {
        return $this->model->findOrFail($id);
    }
    public function delete($id)
    {
        $this->model->destroy($id);
    }
    public function save($data)
    {
        $this->model->save($data);
    }
}
