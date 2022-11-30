<?php

namespace Ybzc\Laravel\Base\Impl;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait TCrudService
{
    public function find($id): Model
    {
        return $this->query()->findOrFail($id);
    }

    public function findAll(): Collection
    {
        return $this->query()->all();
    }

    public function page(array $where): LengthAwarePaginator
    {
        return $this->query()->where($where)->paginate(15)->withQueryString();
    }

    public function create(array $map): Model
    {
        return $this->query()->create($map);
    }

    public function update(array $map): Model
    {
        $inDb = $this->query()->findOrFail($map['id']);
        $inDb->update($map);
        return $inDb;
    }

    public function destroy(array $ids): void
    {
        $this->query()->destroy($ids);
    }

    public abstract function query(): Builder;
}
