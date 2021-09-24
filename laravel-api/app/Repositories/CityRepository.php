<?php

namespace App\Repositories;

use App\Models\Citys;
use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\AbstractRepository;


class CityRepository extends AbstractRepository implements CityRepositoryInterface
{

	protected $model;

	public function __construct(Citys $model)
	{
		$this->model = $model;
	}

	public function getTotalUsers()
	{

		return $this->model->leftJoin('users', 'users.city_id', 'citys.id')
			->groupBy('citys.id')
			->selectRaw('citys.name as states, COUNT(citys.id) AS total')
			->get();
	}
}
