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

        Blueprint::macro('slug', function ($unique = true, $length = null) {
            $this->string('slug', $length);

            if ($unique) {
                $this->unique('slug');
            }

            return $this;
        });

        Blueprint::macro('creator', function ($attribute = 'creator_id', $referenceTable = 'users', $referenceAttribute = 'id') {
            $this->unsignedBigInteger($attribute);
            $this->foreign($attribute)
                ->references($referenceAttribute)
                ->on($referenceTable);

            return $this;
        });

        if (! function_exists('to_collection'))
        {
            function to_collection(array $array)
            {
                return collect(
                    json_decode(
                        json_encode($array)
                    )
                );
            }
        }
    }
}