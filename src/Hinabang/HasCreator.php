<?php

namespace Bokalsyo\Tabang\Hinabang;

use App\Models\User;
use Illuminate\Support\Str;

trait HasCreator
{
    protected static function bootHasCreator()
    {
        static::creating(function ($model) {
            $creatorAttribute = $model->creatorAttribute();

            if (empty($model->{$creatorAttribute})) {
                $model->{$creatorAttribute} = auth()->id();
            }
        });
    }

    public function creator()
    {
        return $this->belongsTo($this->creatorClass(), $this->creatorAttribute(), 'id');
    }

    protected function creatorClass()
    {
        return User::class;
    }

    protected function creatorAttribute()
    {
        return 'creator_id';
    }
}
