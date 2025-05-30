<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all()->map(function ($product) {
            // إصلاح مسار الصورة
            $product->image_url = $product->image 
                ? asset('storage/' . $product->image)
                : null;
            
            return $product;
        });
    
        return response()->json($products);
    }

    public function show($id) {
        $product = Product::findOrFail($id);

        if ($product->image) {
            $product->image_url = asset('storage/' . $product->image);
        }

        return response()->json($product);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name'  => 'required|string',
            'brand' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1000000',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $product = Product::create($validated);
        $product->image_url = $product->image ? asset('storage/' . $product->image) : null;

        return response()->json($product, 201);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name'  => 'sometimes|string',
            'brand' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($validated);
        $product->image_url = $product->image ? asset('storage/' . $product->image) : null;

        return response()->json($product);
    }
    public function finalizeTask(Request $request)
{
    // مثال فقط - يمكنك تخصيصه حسب المنطق الذي تحتاجه
    $produits = $request->input('produits');

    // تنفيذ أي منطق تريده هنا، مثلاً حفظ الطلب أو إرسال إشعار

    return response()->json([
        'message' => 'تمت معالجة المهمة بنجاح!',
        'produits_reçus' => $produits,
    ], 200);
}

}

