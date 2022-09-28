<?php

namespace App\Providers;

use App\Models\Place;
use App\Models\Product;
use App\Models\ProductEntry;
use App\Models\ProductMovimentation;
use App\Models\ProductOutput;
use App\Observers\PlaceObserver;
use App\Observers\ProductEntryObserver;
use App\Observers\ProductMovimentationObserver;
use App\Observers\ProductObserver;
use App\Observers\ProductOutputObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [];

    protected $observers = [
        Product::class => [ProductObserver::class],
        ProductOutput::class => [ProductOutputObserver::class],
        ProductEntry::class => [ProductEntryObserver::class],
        ProductMovimentation::class => [ProductMovimentationObserver::class],
        Place::class => [PlaceObserver::class],
    ];

    public function boot()
    {
    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
