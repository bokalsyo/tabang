<?php

namespace Bokalsyo\Tabang\Hinabang;

use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::creating(function ($model) {
            $slug = empty($model->slug) ?
                Str::slug($model->{$model->sluggableField()}, $model->slugConcatenator()) :
                $model->slug;

            $model->slug = $slug;
        });

        static::updating(function ($model) {
            $slug = empty($model->slug) ?
                Str::slug($model->{$model->sluggableField()}, $model->slugConcatenator()) :
                $model->slug;

            $model->slug = $slug;
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function sluggableField()
    {
        return 'name';
    }

    protected function slugConcatenator()
    {
        return '-';
    }
}
