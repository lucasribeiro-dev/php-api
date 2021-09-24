<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\AbstractRepositoryInterface;

interface StateRepositoryInterface extends AbstractRepositoryInterface
{
	public function getTotalUsers();
}
