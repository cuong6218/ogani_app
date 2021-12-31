<?php


namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepo
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getAll()
    {
        return $this->user->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function all()
    {
        return $this->user->all();
    }
    public function save($user)
    {
        $user->save();
    }
    public function getUser($id)
    {
        return $this->user->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->user->destroy($id);
    }
    public function getUserByEmail($email) {
        return $this->user->where('email', $email)->first();
    }
}
