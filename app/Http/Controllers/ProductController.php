<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    // 1. Tambah Data
    public function store(Request $request) {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|integer',
            ]);

            $this->productService->createProduct($validated);
            return response()->json(['message' => 'Data berhasil ditambahkan'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambah data'], 500);
        }
    }

    // 2. Tampilkan Data
    public function index() {
        return response()->json(Product::all());
    }

    // 3. Ubah Data
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);
        return response()->json(['message' => 'Data berhasil diubah']);
    }

    // 4. Hapus Data
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}