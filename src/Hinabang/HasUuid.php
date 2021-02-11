<?php

namespace Bokalsyo\Tabang\Hinabang;

use Illuminate\Support\Str;

trait HasUuid
{
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected static function bootHasUuid()
    {
        static::creating(function ($model) {
            $model->uuid = str_replace('-', '', Str::uuid());
        });
    }
}
