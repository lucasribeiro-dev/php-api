<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\AbstractRepositoryInterface;

interface CityRepositoryInterface extends AbstractRepositoryInterface
{
    public function getTotalUsers();
}
