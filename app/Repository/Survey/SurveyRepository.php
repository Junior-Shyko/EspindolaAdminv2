<?php

namespace App\Repository\Survey;

use Illuminate\Database\Eloquent\Model;
use App\Repository\Survey\SurveyRepositoryInterface;

class SurveyRepository implements SurveyRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        return $this->model = $model;
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }
    public function getList()
    {
        // return $this->model->orderBy('id', 'desc')->skip(0)->take(50)->get();
        return $this->model->all();
    }
    public function get($id)
    {
        return $this->model->find($id);
    }

    public function update(array $data, $id){
        return $this->model->find($id)->update($data);
    }

    public function destroy($id){
        return $this->model->find($id)->delete();
    }
}