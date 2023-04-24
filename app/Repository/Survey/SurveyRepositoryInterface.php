<?php

namespace App\Repository\Survey;

use Illuminate\Database\Eloquent\Model;

interface SurveyRepositoryInterface
{
    public function __construct(Model $model);
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data, $id);
    public function destroy($id);

}