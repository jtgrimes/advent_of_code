<?php


require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

set_error_handler('errHandle');
if (isset($argc)) {
        $year = $argv[1];
        $day = $argv[2];
        $part = $argv[3] ?? '1';

        echo "Year: $year, Day: $day, Part: $part" . PHP_EOL;
        echo (run($year, $day, $part).PHP_EOL);
} else {
    echo "invalid args\n";
}

function className($year, $day)
{
    return 'Jtgrimes\AdventOfCode\y' . $year . '\Day' . $day;
}

function run($year, $day, $part)
{
    $class = new (className($year, $day));
    return ($part == 1 ? $class->part1() : $class->part2());
}

function errHandle($errNo, $errStr, $errFile, $errLine)
{
    $msg = "$errStr in $errFile on line $errLine";
    if ($errNo == E_NOTICE || $errNo == E_WARNING) {
        throw new ErrorException($msg, $errNo);
    } else {
        echo $msg;
    }
}

