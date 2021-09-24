<?php

namespace App\Repositories;

use App\Models\States;
use App\Repositories\Contracts\StateRepositoryInterface;
use App\Repositories\AbstractRepository;


class StateRepository extends AbstractRepository implements StateRepositoryInterface
{

	protected $model;

	public function __construct(States $model)
	{
		$this->model = $model;
	}

	public function getTotalUsers()
	{

		return $this->model->leftJoin('users', 'users.state_id', 'states.id')
			->groupBy('states.id')
			->selectRaw('states.name as states, COUNT(states.id) AS total')
			->get();
	}
}
