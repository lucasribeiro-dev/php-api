<?php

namespace App\Repositories;

use App\Models\Users;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\AbstractRepository;


class UserRepository extends AbstractRepository implements UserRepositoryInterface
{

	protected $model;

	public function __construct(Users $model)
	{
		$this->model = $model;
	}
}
