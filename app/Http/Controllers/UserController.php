<?php

namespace App\Http\Controllers;
use App\Repositories\User\IUserRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $conn;

    public function __construct(private IUserRepository $userRepository)
    {
         $connectionConfig = [
            'driver' => 'mysql',
            'host' => 'sql8.freemysqlhosting.net',
            'port' => '3306',
            'database' => 'sql8680624',
            'username' => 'sql8680624',
            'password' => '2IamnA1MgV',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ];
        config(["database.connections.dynamic_connection" => $connectionConfig]);
        $this->conn =   DB::connection('dynamic_connection');
    }

     /**
     * @param Request $request
     * @return false|string
     */
    public function userList(Request $request)
    {
        try {
            $result = $this->userRepository->getUserlist();
            $results = $this->conn->table('users')->get()->toArray();
            return json_encode($results);
        } catch (\Exception $e) {
            return $this->error('Error', [$e->getMessage()]);
        }
    }
}


