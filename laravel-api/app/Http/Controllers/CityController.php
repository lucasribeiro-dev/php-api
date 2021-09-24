<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CityRepositoryInterface;
use Illuminate\Http\Request;


class CityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $repository;
    protected $request;


    public function __construct(CityRepositoryInterface $repository, Request $request)
    {
        $this->repository = $repository;
        $this->request = $request;
    }


    public function getCitys()
    {
        $states = $this->repository->findAll()->makeHidden(['created_at', 'updated_at', 'city_id']);
        return response()->json([
            'error' => false,
            'data' => $states
        ]);
    }

    public function getCityById($id)
    {
        $state = $this->repository->find($id)->makeHidden(['created_at', 'updated_at', 'city_id']);
        return response()->json([
            'error' => false,
            'data' => $state
        ]);
    }

    public function getTotalUsersOfCity()
    {
        $citys = $this->repository->getTotalUsers();;
        return response()->json([
            'error' => false,
            'data' => $citys
        ]);
    }
}
