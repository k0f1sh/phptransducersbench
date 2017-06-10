<?php
require __DIR__ . '/vendor/autoload.php';

use Transducers as t;

$bench = new Ubench();


// 準備
$num = 1000000;
$monsters = [];
mt_srand(1);
for ($i = 1; $i <= $num; $i++) {
    $monsters[] = [
        'level' => mt_rand(),
        'atk' => mt_rand(),
        'def' => mt_rand(),
    ];
}

$bench->start();

// レベルが偶数でatkよりdefのほうが数値が高いものを抽出
// 総合力(level,atk,defの合計)を合計したもの
$xf = t\comp(
    t\filter(function ($m) {
        return 0 == ($m['level'] % 2);
    }),
    t\filter(function ($m) {
        return $m['def'] > $m['atk'];
    }),
    t\map(function ($m) {
        return $m['level'] + $m['atk'] + $m['def'];
    })
);

$result = t\transduce($xf, t\create_reducer(function ($a, $b) {return $a + $b;}), $monsters);

$bench->end();

echo $result . "\n";
echo $bench->getTime() . "\n";
echo $bench->getMemoryPeak() . "\n";
echo $bench->getMemoryUsage() . "\n";