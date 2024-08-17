<?php

declare(strict_types=1);
use Hashids\Hashids;
use Markomeje\Src\Contracts\GeneratorContract;
use Markomeje\Src\Generator;
use Markomeje\Src\Library\InvoiceNumberLibrary;

it('can be created with custom hasher', function (int $min): void {
  expect(new Generator(new Hashids('', $min)))->toBeInstanceOf(GeneratorContract::class);
})->with('numbers');

it('generates an invoice number', function (string $value): void {
  $generator = new Generator(new Hashids('', 5));
  expect($generator->generate($value, new DateTimeImmutable(), 1))->toBeInstanceOf(InvoiceNumberLibrary::class);
})->with('values');
