<?php
namespace App\Repository;

use App\Interface\MenuInterface;
use App\Models\Kategori;
use App\Models\Menu;
class MenuRepository implements MenuInterface
{
    protected $model;
    public function __construct(Menu $model)
    {
       $this->model = $model;
    }
    public function getAll()
    {
        return $this->model->with('kategori')->get();
    }

    public function findById($id)
    {
        return $this->model->with('kategori')->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function search ($keyword)
    {
        return $this->model->where('nama', 'like', '%' . $keyword . '%')
            ->orWhereHas('kategori', function ($query) use ($keyword) {
            $query->where('nama_kategori', 'like', '%' . $keyword . '%');
            })
            ->with('kategori');
    }

}