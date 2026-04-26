<?php

namespace App\Http\Controllers\Api;

use App\Helper\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriRequest;
use App\Http\Resources\KategoriResource;
use App\Interface\KategoriInterface;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    protected $repo;

    public function __construct(KategoriInterface $repo)
    {
        $this->repo = $repo;
    }
    public function index()
    {
        try{
            $search = request()->query('search');
            if ($search) {
                $kategori = $this->repo->search($search)->get();
            } else {
                $kategori = $this->repo->getAll();
            }
            if($kategori->isEmpty()) {
                return ResponseHelpers::success(null, 'Data kategori kosong');
            }
            return ResponseHelpers::success(KategoriResource::collection($kategori), 'Data kategori berhasil diambil');
        } catch (\Exception $e) {
            return ResponseHelpers::error(null, 'Data kategori gagal diambil', 401);
        }
    }

    public function show($id)
    {
        try{
            $kategori = $this->repo->findById($id);
            if (!$kategori) {
                return ResponseHelpers::error(null, 'Kategori tidak ditemukan', 404);
            }
            return ResponseHelpers::success(new KategoriResource($kategori), 'Data kategori berhasil diambil');
        } catch (\Exception $e) {
            return ResponseHelpers::error(null, 'Data kategori gagal diambil', 401);
        }
    }

     public function store(KategoriRequest $request)
    {
        try{
            $data = $request->validated();

            $kategori = $this->repo->create($data);
            return ResponseHelpers::success(new KategoriResource($kategori), 'Data kategori berhasil dibuat', 201);
        } catch (\Exception $e) {
            return ResponseHelpers::error(null, 'Data kategori gagal dibuat', 401);
        }
    }
    public function update(KategoriRequest $request, $id)
    {
        try{
            $data = $request->validated();

            $kategori = $this->repo->findById($id);
            if (!$kategori) {
                return ResponseHelpers::error(null, 'Kategori tidak ditemukan', 404);
            }

            $kategori->update($data);
            return ResponseHelpers::success(new KategoriResource($kategori), 'Data kategori berhasil diperbarui');
        } catch (\Exception $e) {
            return ResponseHelpers::error(null, 'Data kategori gagal diperbarui', 401);
        }
    }

     public function destroy($id)
    {
        try{
            $kategori = $this->repo->findById($id);
            if (!$kategori) {
                return ResponseHelpers::error(null, 'Kategori tidak ditemukan', 404);
            }

            $kategori->delete();
            return ResponseHelpers::success(null, 'Data kategori berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseHelpers::error(null, 'Data kategori gagal dihapus', 401);
        }
    }
}