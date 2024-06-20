<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Builder as Eloquent;
use Illuminate\Database\Query\Builder as QueryBuilder;

class UserService extends BaseService
{
  /**
   * @var string[]
   */
  protected $filterables = [
    'status' => 'filterByStatus',
  ];

  /**
   * @var string[]
   */
  protected $orderables = [
    'id' => 'id',
  ];

  /**
   * @var array
   */
  protected $searchables = [
    'name',
  ];

  /**
   * filterByStatus
   *
   * @param  $query
   * @param  $filter
   * @return Eloquent | QueryBuilder
   */
  public function filterByStatus($query, $filter): Eloquent | QueryBuilder
  {
    if ($filter['data'] === 'all' || !$filter['data']) {
      return $query;
    }

    return $query->where('users.status', $filter['data']);
  }

  /**
   * makeNewQuery
   *
   * @return Eloquent | QueryBuilder
   */
  public function makeNewQuery(): Eloquent | QueryBuilder
  {
    return User::query();
  }
}
