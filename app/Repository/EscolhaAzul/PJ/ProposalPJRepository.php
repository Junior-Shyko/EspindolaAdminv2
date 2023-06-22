<?php

namespace App\Repository\EscolhaAzul\PJ;

use Illuminate\Database\Eloquent\Model;
use App\Repository\EscolhaAzul\PJ\ProposalPJRepositoryInterface;

class ProposalPJRepository implements ProposalPJRepositoryInterface
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