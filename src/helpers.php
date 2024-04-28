<?php

if (!function_exists('null_filter')) {
    /**
     * 过滤null
     * @param array $array
     * @return array
     */
    function null_filter(array $array): array
    {
        return array_filter($array, function ($m) {
            return !is_null($m);
        });
    }
}
