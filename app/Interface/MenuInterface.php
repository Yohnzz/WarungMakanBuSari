<?php
namespace App\Interface;

interface MenuInterface
{
    public function getAll();
    public function findById($id);
    public function create(array $data);
    public function search($keyword);
}