<?php

declare(strict_types=1);
use Hashids\Hashids;
use Markomeje\Src\Library\InvoiceNumberLibrary;
use Markomeje\Src\Library\StringValueLibrary;

it('can turn the data into an invoice number', function (string $value): void {
  $invoiceNumber = new InvoiceNumberLibrary($word = new StringValueLibrary($value), $date = new DateTimeImmutable(), 1, new Hashids('', 5));
  expect($invoiceNumber)
    ->toBeInstanceOf(InvoiceNumberLibrary::class)
    ->and((string) $invoiceNumber)
    ->toBeString()
    ->toContain('#')
    ->toContain($word->initials())
    ->toContain($date->format('Y'))
    ->toContain($date->format('W'));
})->with('values');

it('matches a regex value', function (string $value): void {
    $invoiceNumber = new InvoiceNumberLibrary(new StringValueLibrary($value), new DateTimeImmutable(), 1233333656783333333, new Hashids('', 5));
    $pattern = '/^#[A-Z]{2}-[0-9]{4}-[0-9]{2}-[A-Za-z0-9]{5,}/';
    expect((bool) preg_match_all($pattern, (string) $invoiceNumber))->toBeTrue();
})->with('values');
