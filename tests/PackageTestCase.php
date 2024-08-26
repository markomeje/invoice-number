<?php

declare(strict_types=1);
namespace Markomeje\Tests;
use Markomeje\Src\Providers\PackageServiceProvider;
use Orchestra\Testbench\TestCase;

class PackageTestCase extends TestCase
{
  /**
   * @param mixed $app
   * @return array
   */
  protected function providers($app): array
  {
    return [
      PackageServiceProvider::class,
    ];
  }
}
