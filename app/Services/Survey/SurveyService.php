<?php

namespace App\Services\Survey;

use App\Repository\Survey\SurveyRepositoryInterface;

 class SurveyService
 {
    private $repo;
    
    public function __construct(SurveyRepositoryInterface $repo)
    {
        return $this->repo = $repo;
    }

    public function store(array $data)
    {
        return $this->repo->store($data);
    }
    public function getList()
    {
        return $this->repo->getList();
    }
    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update(array $data, $id){
        return $this->repo->update($data, $id);
    }

    public function destroy($id){
        return $this->repo->destroy($id);
    }
 }