<?php

namespace App\Repositories;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;


/**
 * Class AuthRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AuthRepository implements AuthRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return User::create();
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        //$this->pushCriteria(app(RequestCriteria::class));
    }


    public function login(array $credentials)
    {

    }

    public function logout()
    {
        // TODO: Implement logout() method.
    }

    public function lists($column, $key = null)
    {
        // TODO: Implement lists() method.
    }

    public function pluck($column, $key = null)
    {
        // TODO: Implement pluck() method.
    }

    public function sync($id, $relation, $attributes, $detaching = true)
    {
        // TODO: Implement sync() method.
    }

    public function syncWithoutDetaching($id, $relation, $attributes)
    {
        // TODO: Implement syncWithoutDetaching() method.
    }

    public function all($columns = ['*'])
    {
        // TODO: Implement all() method.
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        // TODO: Implement paginate() method.
    }

    public function simplePaginate($limit = null, $columns = ['*'])
    {
        // TODO: Implement simplePaginate() method.
    }

    public function find($id, $columns = ['*'])
    {
        // TODO: Implement find() method.
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        // TODO: Implement findByField() method.
    }

    public function findWhere(array $where, $columns = ['*'])
    {
        // TODO: Implement findWhere() method.
    }

    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        // TODO: Implement findWhereIn() method.
    }

    public function findWhereNotIn($field, array $values, $columns = ['*'])
    {
        // TODO: Implement findWhereNotIn() method.
    }

    public function findWhereBetween($field, array $values, $columns = ['*'])
    {
        // TODO: Implement findWhereBetween() method.
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    public function update(array $attributes, $id)
    {
        // TODO: Implement update() method.
    }

    public function updateOrCreate(array $attributes, array $values = [])
    {
        // TODO: Implement updateOrCreate() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function orderBy($column, $direction = 'asc')
    {
        // TODO: Implement orderBy() method.
    }

    public function with($relations)
    {
        // TODO: Implement with() method.
    }

    public function whereHas($relation, $closure)
    {
        // TODO: Implement whereHas() method.
    }

    public function withCount($relations)
    {
        // TODO: Implement withCount() method.
    }

    public function hidden(array $fields)
    {
        // TODO: Implement hidden() method.
    }

    public function visible(array $fields)
    {
        // TODO: Implement visible() method.
    }

    public function scopeQuery(\Closure $scope)
    {
        // TODO: Implement scopeQuery() method.
    }

    public function resetScope()
    {
        // TODO: Implement resetScope() method.
    }

    public function getFieldsSearchable()
    {
        // TODO: Implement getFieldsSearchable() method.
    }

    public function setPresenter($presenter)
    {
        // TODO: Implement setPresenter() method.
    }

    public function skipPresenter($status = true)
    {
        // TODO: Implement skipPresenter() method.
    }

    public function firstOrNew(array $attributes = [])
    {
        // TODO: Implement firstOrNew() method.
    }

    public function firstOrCreate(array $attributes = [])
    {
        // TODO: Implement firstOrCreate() method.
    }

    public static function __callStatic($method, $arguments)
    {
        // TODO: Implement __callStatic() method.
    }

    public function __call($method, $arguments)
    {
        // TODO: Implement __call() method.
    }
}
