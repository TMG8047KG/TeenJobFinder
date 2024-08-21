<?php

if (! function_exists('format_salary')) {
    function format_salary($salary) {
        return number_format($salary, 0, '.', ' ');
    }
}
