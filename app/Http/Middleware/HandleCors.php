<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleCors
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')  // السماح لجميع الأصول (يمكنك تقييدها في الإنتاج)
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS') // السماح لجميع الطرق
            ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization') // السماح بالرؤوس المطلوبة
            ->header('Access-Control-Allow-Credentials', 'true'); // السماح بالبيانات إذا لزم الأمر
    }
}
