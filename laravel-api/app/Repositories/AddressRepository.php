<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Repositories\AbstractRepository;


class AddressRepository extends AbstractRepository implements AddressRepositoryInterface {

    protected $model;

    public function __construct(Address $model)
	{
		$this->model = $model;
	}

}