<?php

namespace App\Repositories\Contracts;


interface AbstractRepositoryInterface {
    public function findAll();
    public function find($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}