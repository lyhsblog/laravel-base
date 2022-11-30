<?php

namespace Ybzc\Laravel\Base;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ICrudService
{
    public function find($id): Model;
    public function findAll(): Collection;
    public function page(array $where): LengthAwarePaginator;
    public function create(array $map): Model;
    public function update(array $map): Model;
    public function destroy(array $ids): void;
}
