<?php

declare(strict_types=1);
namespace Markomeje\Src\Library;
use DateTimeInterface;
use Hashids\HashidsInterface;
use Stringable;

final readonly class InvoiceNumberLibrary implements Stringable
{
  /**
   * @param StringValueLibrary $value
   * @param DateTimeInterface $date
   * @param int $identifier
   * @param HashidsInterface $hash
   */
  public function __construct(private readonly StringValueLibrary $value, private readonly DateTimeInterface $date, private readonly int $identifier, private readonly HashidsInterface $hash)
  {
  }

  /**
   * Generate an invoice number in the following format
   * #{2 Characters}-{Name in format XXXX}-{Week Number}-{Hash ID of Identifier}
   */
  public function __toString(): string
  {
    return '#'.$this->value->initials().'-'.$this->date->format('Y').'-'.$this->date->format('W').'-'.$this->hash->encode($this->identifier);
  }
}
