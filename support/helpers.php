<?php

const STATUSES = [
    1 => 'В работе',
    2 => 'Доставка',
    3 => 'Получен',
    4 => 'Отменен'
];

if (!function_exists('phoneToFormat')) {
    function phoneToFormat($text) {
        if (is_null($text)) {
            return null;
        }

        return sprintf("+%s (%s) %s-%s-%s",
            substr($text, 0, 1),
            substr($text, 1, 3),
            substr($text, 4, 3),
            substr($text, 7, 2),
            substr($text, 9)
        );
    }
}

if (!function_exists('availableStatuses')) {
    function availableStatuses($status) {
        return match ($status) {
            1 => [1, 2, 4],
            2 => [2, 3, 4],
            3 => [3],
            4 => [4],
        };
    }
}
