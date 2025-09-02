<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProdukAdminController extends Controller
{
    private $productsFile = 'products.json';
    private $storagePath = 'data/'; // lokasi json

    private function getProducts()
    {
        $path = storage_path($this->storagePath . $this->productsFile);
        if (File::exists($path)) {
            return json_decode(File::get($path), true);
        }
        return [];
    }

    private function saveProducts(array $products)
    {
        $path = storage_path($this->storagePath . $this->productsFile);
        File::put($path, json_encode($products, JSON_PRETTY_PRINT));
    }

    public function index()
    {
        $productsData = $this->getProducts();
        return view('admin.produk', [
            'productsData' => $productsData
        ]);
    }

    public function store(Request $request)
    {
        $products = $this->getProducts();
        $response = ['success' => false];

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'price' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        // simpan file gambar
        if ($request->hasFile('image')) {
            $filename = Str::random(20) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('products', $filename, 'public');
        }

        $newProduct = [
            'name' => $validatedData['name'],
            'image' => $path, // path relatif ke storage/app/public
            'price' => $validatedData['price'],
            'description' => $validatedData['description']
        ];
        
        $products[] = $newProduct;
        $this->saveProducts($products);

        $response['success'] = true;
        $response['image_path'] = $path; // penting untuk frontend

        return response()->json($response);
    }

    public function update(Request $request, $index)
    {
        $products = $this->getProducts();
        $response = ['success' => false];
    
        if (isset($products[$index])) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'price' => 'required|integer',
                'description' => 'nullable|string',
            ]);

            $path = $products[$index]['image']; // default pakai gambar lama
            if ($request->hasFile('image')) {
                $filename = Str::random(20) . '.' . $request->file('image')->getClientOriginalExtension();
                $path = $request->file('image')->storeAs('products', $filename, 'public');
            }

            $products[$index] = [
                'name' => $validatedData['name'],
                'image' => $path,
                'price' => $validatedData['price'],
                'description' => $validatedData['description']
            ];
    
            $this->saveProducts($products);
            $response['success'] = true;
        }

        return response()->json($response);
    }
    
    public function destroy($index)
    {
        $products = $this->getProducts();
        $response = ['success' => false];
    
        if (isset($products[$index])) {
            array_splice($products, $index, 1);
            $this->saveProducts($products);
            $response['success'] = true;
        }
    
        return response()->json($response);
    }
}
