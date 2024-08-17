<?php

declare(strict_types=1);
use Markomeje\Src\Library\StringValueLibrary;

it('returns a string', function (string $value): void {
  $object = new StringValueLibrary($value);
  expect($object->initials())->toBeString();
})->with('values');

it('returns two characters', function (string $value): void {
  $object = new StringValueLibrary($value);
  $string = $object->initials();

  expect(mb_strlen($string))->toBeInt()->toEqual(2);
})->with('values');

it('throws an exception if the string is not long enough', function (): void {
  $object = new StringValueLibrary('');
  $object->initials();
})->throws(InvalidArgumentException::class);
