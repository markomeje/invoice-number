<?php

declare(strict_types=1);
namespace Markomeje\Src;
use DateTimeInterface;
use Hashids\HashidsInterface;
use Markomeje\Src\Contracts\GeneratorContract;
use Markomeje\Src\Library\InvoiceNumberLibrary;
use Markomeje\Src\Library\StringValueLibrary;

final class Generator implements GeneratorContract
{
  /**
   * @param HashidsInterface $hash
   */
  public function __construct(private readonly HashidsInterface $hash)
  {
  }

  /**
   * @param string $value
   * @param DateTimeInterface $date
   * @param int $identifier
   * @return InvoiceNumberLibrary
   */
  public function generate(string $value, DateTimeInterface $date, int $identifier): InvoiceNumberLibrary
  {
    return new InvoiceNumberLibrary(new StringValueLibrary($value), $date, $identifier, $this->hash);
  }
}
