<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\AddressRepositoryInterface;

use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $repository;
    protected $addressRepository;

    protected $request;


    public function __construct(UserRepositoryInterface $repository, AddressRepositoryInterface $addressRepository, Request $request)
    {
        $this->repository = $repository;
        $this->addressRepository = $addressRepository;
        $this->request = $request;
    }

    public function getUsers()
    {
        $users = $this->repository->findAll();

        return response()->json([
            'error' => false,
            'data' => $users
        ]);
    }

    public function insertUser()
    {
        $this->validate($this->request, [
            'name' => 'required|string',
            'state_id' => 'required|int',
            'city_id' => 'required|int',
            'address' => 'required|string',
        ]);

        $address = $this->request->get('address');
        unset($this->request['address']);
        $data = [
            "name" => $this->request->get('name'),
            "state_id" => $this->request->get('state_id'),
            "city_id" => $this->request->get('city_id'),
        ];

        $user_id = $this->repository->create($data);

        $this->addressRepository->create(['name' => $address, 'user_id' => $user_id['id']]);

        return response()->json([
            'error' => false,
        ]);
    }

    public function updateUser($id)
    {
        if (empty($this->request->all())) {
            return response()->json([
                'error' => true,
                'message' => "Fields invalid"
            ]);
        }
        $address = $this->request->get('address');
        unset($this->request['address']);
        $data = [
            "name" => $this->request->get('name'),
            "state_id" => $this->request->get('state_id'),
            "city_id" => $this->request->get('city_id'),
        ];
        $this->repository->update($data, $id);
        $this->addressRepository->update(['name' => $address], $id);

        return response()->json([
            'error' => false,
        ]);
    }

    public function deleteUser($id)
    {
        $this->repository->delete($id);

        return response()->json([
            'error' => false,
        ]);
    }
}
