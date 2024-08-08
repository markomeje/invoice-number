<?php

namespace Markomeje\Src\Contracts;
use DateTimeInterface;

interface GeneratorInterface
{
  /**
   * @param string $value
   * @param \DateTimeInterface $date
   * @param string|int $identifier
   * @return void
   */
  public function generate(string $value, DateTimeInterface $date, string|int $identifier);

}