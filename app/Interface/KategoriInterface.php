<?php
namespace App\Interface;

interface KategoriInterface
{
    public function getAll();
    public function findById($id);
    public function create(array $data);
    public function search($keyword);
}