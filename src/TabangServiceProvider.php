<?php

namespace Bokalsyo\Tabang;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class TabangServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        Blueprint::macro('customUuid', function ($length = 32) {
            $this->char('uuid', $length)->unique();

            return $this;
        });

        Blueprint::macro('slug', function ($length = null) {
            $this->char('slug', $length)->unique();

            return $this;
        });

        Blueprint::macro('creator', function ($attribute = 'creator_id', $referenceTable = 'users', $referenceAttribute = 'id') {
            $this->unsignedBigInteger($attribute);
            $this->foreign($attribute)
                ->references($referenceAttribute)
                ->on($referenceTable);

            return $this;
        });
    }
}