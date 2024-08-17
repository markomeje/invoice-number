<?php

declare(strict_types=1);
namespace Markomeje\Src\Contracts;
use DateTimeInterface;
use Markomeje\Src\Library\InvoiceNumberLibrary;

interface GeneratorContract
{
  /**
   * @param string $value
   * @param DateTimeInterface $date
   * @param int $identifier
   * @return InvoiceNumberLibrary
   */
  public function generate(string $value, DateTimeInterface $date, int $identifier): InvoiceNumberLibrary;
}
