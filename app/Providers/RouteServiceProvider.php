<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * مسار الـ home المستخدم بعد تسجيل الدخول.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * قم بتحديد مكان ملف التعريف للـ routes.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();
    }

    /**
     * تحديد الـ routes الخاصة بـ web.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware([\App\Http\Middleware\HandleCors::class])  // إضافة middleware هنا
            ->group(base_path('routes/web.php'));  // رابط ملف web.php
    }

    /**
     * تحديد الـ routes الخاصة بـ api.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));
    }
}
