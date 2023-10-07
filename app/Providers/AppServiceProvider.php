<?php

namespace App\Providers;
use App\Contracts\PaymentInterface;
use App\Services\PayPalPaymentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
 
        $this->app->bind(PaymentInterface::class,PaypalPaymentService::class );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
