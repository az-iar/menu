<?php

namespace Inneuron\Menu\Contracts;

interface MenuItem
{
    public function id(): string;

    public function href(): string;

    public function icon(): string;

    public function title(): string;

    public function authorize(): bool;

    public function current(): bool;

    public function children(): array;

    public function toArray(): array;
}
