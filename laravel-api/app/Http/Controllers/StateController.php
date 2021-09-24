<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\StateRepositoryInterface;
use Illuminate\Http\Request;


class StateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $repository;
    protected $request;


    public function __construct(StateRepositoryInterface $repository, Request $request)
    {
        $this->repository = $repository;
        $this->request = $request;
    }

    public function getStates()
    {
        $states = $this->repository->findAll()->makeHidden(['created_at', 'updated_at', 'city_id']);
        return response()->json([
            'error' => false,
            'data' => $states
        ]);
    }

    public function getStateById($id)
    {
        $state = $this->repository->find($id)->makeHidden(['created_at', 'updated_at', 'city_id']);
        return response()->json([
            'error' => false,
            'data' => $state
        ]);
    }

    public function getTotalUsersOfState()
    {
        $states = $this->repository->getTotalUsers();;
        return response()->json([
            'error' => false,
            'data' => $states
        ]);
    }
}
