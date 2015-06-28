<?php

namespace App\Repositories;

class CrudRepository
{

    public function __construct($model_name)
    {
        $this->model_name = $model_name;
    }

    public function create()
    {
        $model = $this->getFreshModel();
        $model->save();
        return $model;
    }
    
    public function retrieve($id)
    {
        return $this->getFreshModel()->findOrFail($id);
    }
    
    public function update($id)
    {
        $model = $this->getFreshModel()->findOrFail($id);
        $model->save();
        return $model;
    }
    
    public function delete($id)
    {
        return $this->getFreshModel()->findOrFail($id)->delete();
    }

    protected function getFreshModel()
    {
        return new $this->model_name;
    }
}
