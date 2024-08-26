<?php

declare(strict_types=1);

namespace Markomeje\Src\Providers;
use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;
use Markomeje\Src\Contracts\GeneratorContract;
use Markomeje\Src\Generator;

final class PackageServiceProvider extends ServiceProvider
{
  /**
   * @return void
   */
  public function boot(): void
  {
    $this->publishes([__DIR__.'/../../config/invoice-number.php'], 'invoice-number');
  }

  /**
   * @return void
   */
  public function register(): void
  {
    $this->app->singleton(GeneratorContract::class, function () {
      new Generator(new Hashids('', intval(config('invoice-number.hasher.min-length'))));
    });
  }
}
