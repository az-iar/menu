<?php

namespace Inneuron\Menu\Concerns;

use Illuminate\Support\Str;
use Inneuron\Menu\Contracts\MenuItem;
use function collect;

trait AsMenuItem
{
    public function id(): string
    {
        return Str::of(class_basename(static::class))->slug();
    }

    public function icon(): string
    {
        return '';
    }

    public function authorize(): bool
    {
        return true;
    }

    public function children(): array
    {
        return [];
    }

    public function current(): bool
    {
        return false;
    }
    
    public function target(): string
    {
        return '_self';   
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'title' => $this->title(),
            'href' => $this->href(),
            'icon' => $this->icon(),
            'current' => $this->current(),
            'target' => $this->target(),
            'children' => collect($this->children())
                ->filter(function (MenuItem $item) {
                    return $item->authorize();
                })
                ->map(function (MenuItem $item) {
                    return $item->toArray();
                })
                ->values(),
        ];
    }
}
