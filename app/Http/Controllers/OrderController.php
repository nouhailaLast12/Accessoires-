<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // التحقق من صحة المدخلات
        $validated = $request->validate([
            'customer_name'  => 'required|string',
            'customer_email' => 'required|email',
            'customer_phone' => 'nullable|string',
            'customer_address'=> 'required|string',
            'payment_method' => 'required|in:creditCard,paypal',
            'items'          => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity'   => 'required|integer|min:1',
            'total_price'    => 'required|numeric',
        ]);

        // حفظ الطلب في قاعدة البيانات
        $order = Order::create([
            'customer_name'  => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'] ?? null,
            'customer_address'=> $validated['customer_address'],
            'payment_method' => $validated['payment_method'],
            'total_price'    => $validated['total_price'],
        ]);

        // إضافة المنتجات إلى الطلب
        foreach ($validated['items'] as $item) {
            $product = Product::find($item['product_id']);
            $order->products()->attach($product, [
                'quantity' => $item['quantity'],
                'price'    => $product->price
            ]);
        }

        return response()->json([
            'message' => 'تم إنشاء الطلب بنجاح.',
            'order' => $order
        ], 201);
    }
}


