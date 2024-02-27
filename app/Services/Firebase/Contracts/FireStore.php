<?php

namespace App\Services\Firebase\Contracts;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

interface FireStore
{
    /**
     * Create New Collection Item
     *
     * @var string $collection
     * @var array $data
     *
     * @return array
     */
    public function create(string $collection, array $data): array;

    /**
     * Fetch Existing Collection Items
     *
     * @var string $collection
     * @return Illuminate\Support\Collection
     */
    public function fetch(string $collection): Collection;

    /**
     * Edit Existing Item in a collection
     *
     * @var string $collection
     * @var string $document
     * @var array $data
     *
     * @return array
     */
    public function edit(string $collection, string $document, array $data): array;

    /**
     * Delete Existing Collection
     *
     * @var string $collection
     * @var string $document
     *
     * @return void
     */
    public function destroy(string $collection, string $document): void;

    /**
     * Login
     * @var string $email
     * @var string $password
     * 
     * @return Collection
     */
    public function login(string $email, string $password): array;
}
