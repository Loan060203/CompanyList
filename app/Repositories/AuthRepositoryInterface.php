<?php
namespace App\Repositories;

use App\Http\Request\RegisterRequest;
use Illuminate\Http\Request;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AuthRepository.
 *
 * @package namespace App\Repositories;
 */
interface AuthRepositoryInterface extends RepositoryInterface
{

    public function store( array $data);

    public function model();
    public function login(array $credentials);

    public function logout();
}
