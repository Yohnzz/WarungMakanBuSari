<?php
namespace App\Repository;

use App\Interface\KategoriInterface;
use App\Models\Kategori;

class KategoriRepository implements KategoriInterface
{
    protected $model;
    public function __construct(Kategori $model)
    {
       $this->model = $model;
    }
    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function search($keyword)
    {
        return $this->model->where('nama_kategori', 'like', '%' . $keyword . '%');
    }

}