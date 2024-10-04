<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IUserService {
    public function find(int|string $id): ?Model;

    public function findOrFail(int|string $id): ?Model;

    public function findMany(array $ids): Collection;

    public function checkCredentials(array $credentials): bool;
}