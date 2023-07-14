<?php

namespace App\Interfaces;

interface NewsRepositoryInterface
{

    public function getAll();
    public function getById(int $id);
    public function storeNews(array $data);
    public function updateNews(array $data, int $id);
    public function deleteNews(int $id);
}
