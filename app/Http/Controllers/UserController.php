<?php

namespace App\Http\Controllers;
use App\Repositories\User\IUserRepository;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function __construct(private IUserRepository $userRepository)
    {
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function userList(Request $request)
    {
        try {
            $result = $this->userRepository->getUserlist();
            return  json_encode($result);
        } catch (\Exception $e) {
            return $this->error('Error', [$e->getMessage()]);
        }
    }
}