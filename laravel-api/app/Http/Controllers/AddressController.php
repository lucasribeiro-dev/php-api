<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AddressRepositoryInterface;
use Illuminate\Http\Request;


class AddressController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $repository;
    protected $request;


    public function __construct(AddressRepositoryInterface $repository, Request $request)
    {
        $this->repository = $repository;
        $this->request = $request;
    }


    public function getAddresses()
    {
        $addresses = $this->repository->findAll()->makeHidden(['created_at', 'updated_at', 'city_id']);
        return response()->json([
            'error' => false,
            'data' => $addresses
        ]);
    }

    public function getAddressById($id)
    {
        $address = $this->repository->find($id)->makeHidden(['created_at', 'updated_at', 'city_id']);
        return response()->json([
            'error' => false,
            'data' => $address
        ]);
    }
}
