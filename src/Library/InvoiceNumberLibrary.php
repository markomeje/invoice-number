<?php

namespace Markomeje\Src\Library;
use Markomeje\Src\Library\StringValueLibrary;
use DateTimeInterface;
use Hashids\HashidsInterface;

final class InvoiceNumberLibrary
{
  /**
   * @param StringValueLibrary $value
   * @param DateTimeInterface $date
   * @param string|int $identifier
   * @param HashidsInterface $hash
   */
  public function __construct(private readonly StringValueLibrary $value, private readonly DateTimeInterface $date, private readonly string|int $identifier, private readonly HashidsInterface $hash)
  {}

}
