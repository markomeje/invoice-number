<?php

declare(strict_types=1);
namespace Markomeje\Src\Library;
use InvalidArgumentException;

final readonly class StringValueLibrary
{
  /**
   * @param string $value
   */
  public function __construct(private string $value)
  {
  }

  /**
   * @throws InvalidArgumentException
   */
  public function initials(): string
  {
    $value = trim($this->value);
    if (mb_strlen($value) <= 1) {
      throw new InvalidArgumentException("Value must be two characters or more, passed in [$this->value]");
    }

    $words = explode(' ', $value);
    if (count($words) >= 2) {
      $value = mb_substr($words[0], 0, 1, 'UTF-8').mb_substr($words[1], 0, 1, 'UTF-8');
      return mb_strtoupper($value);
    }

    preg_match_all('#([A-Z]+)#', $value, $capitals);
    if (count($capitals) >= 2) {
      return mb_substr(implode('', $capitals[1]), 0, 2, 'UTF-8');
    }

    return mb_strtoupper(mb_substr($value, 0, 2, 'UTF-8'));
  }
}
