<?php

namespace App\Providers;

use App\Http\Services\OrderService;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $categories_header = [];
        if (Schema::hasTable('categories')) {
            $categories_header = Category::all();
        }
        $order_total_price = 0;
        if (Schema::hasTable('orders')) {
            $order_total_price = DB::table('orders')
                                    ->where('status', '=', 'SUCCESS')
                                    ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
                                    ->sum('orders.total_price');
        }
        View::share('order_total_price', $order_total_price);
        View::share('categories_header', $categories_header);
    }
}
