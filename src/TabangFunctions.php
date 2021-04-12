<?php

/**
 * Associative Array to Collection
 */
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