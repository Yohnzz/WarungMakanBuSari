<?php

namespace App\Http\Controllers\Api;

use App\Helper\ResponseHelpers;
use App\Helper\UploadImage;
use App\Helper\UploadImageHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Interface\MenuInterface;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $repo;
    public function __construct(MenuInterface $repo)
    {
        $this->repo = $repo;
    }

        public function index()
        {
            try{
                $search = request()->query('search');
                if ($search) {
                    $menu = $this->repo->search($search)->get();
                } else {
                    $menu = $this->repo->getAll();
                }
                if($menu->isEmpty()) {
                    return ResponseHelpers::success($menu, 'Data menu kosong');
                }
                return ResponseHelpers::success($menu, 'Data menu berhasil diambil');
            } catch (\Exception $e) {
                return ResponseHelpers::error('Data menu gagal diambil');
            }
        }
    
        public function show($id)
        {
            try{
                $menu = $this->repo->findById($id);
                if (!$menu) {
                    return ResponseHelpers::error('Menu tidak ditemukan', 404);
                }
                return ResponseHelpers::success($menu, 'Data menu berhasil diambil');
            } catch (\Exception $e) {
                return ResponseHelpers::error('Data menu gagal diambil');
            }
        }

        public function store(MenuRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('gambar')) {
                $data['gambar'] = UploadImageHelpers::upload($request->file('gambar'));
            }
            $menu = $this->repo->create($data);
            return ResponseHelpers::success($menu, 'Menu berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseHelpers::error('Menu gagal ditambahkan karena ' . $e->getMessage());
        }
    }

        public function update(MenuRequest $request, $id)
        {
            try {
                $menu = $this->repo->findById($id);
                if (!$menu) {
                        return ResponseHelpers::error('Menu tidak ditemukan', 404);
                    }
                    $menu->update($request->validated());
                    return ResponseHelpers::success($menu, 'Menu berhasil diperbarui');
                } catch (\Exception $e) {
                    return ResponseHelpers::error('Menu gagal diperbarui');
                }
            }
            public function destroy($id)
            {
                try {
                    $menu = $this->repo->findById($id);
                    if (!$menu) {
                        return ResponseHelpers::error('Menu tidak ditemukan', 404);
                    }
                    $menu->delete();
                    return ResponseHelpers::success(null, 'Menu berhasil dihapus');
                } catch (\Exception $e) {
                    return ResponseHelpers::error('Menu gagal dihapus');
                }
            }
    }