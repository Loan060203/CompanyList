<?php
namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AuthRepository.
 *
 * @package namespace App\Repositories;
 */
interface AuthRepositoryInterface extends RepositoryInterface
{
    public function model();

    public function login(array $credentials);

    public function logout();
}
