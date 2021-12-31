<?php


namespace App\Http\Services;

use App\Http\Repositories\UserRepo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepo;
    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function getAll()
    {
        return $this->userRepo->getAll();
    }
    public function all()
    {
        return $this->userRepo->all();
    }
    public function store(Request $request)
    {
        $user = new User();
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user->fill($data);
        $this->userRepo->save($user);
    }
    public function getuser($id)
    {
        return $this->userRepo->getuser($id);
    }
    public function update(Request $request, $id)
    {
        $user = $this->userRepo->getuser($id);
        $user->name = $request->name;
        $this->userRepo->save($user);
    }
    public function destroy($id)
    {
        $this->userRepo->destroy($id);
    }
    public function getUserByEmail($email) {
        return $this->userRepo->getuserByEmail($email);
    }
}
