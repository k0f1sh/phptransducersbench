<?php
require __DIR__ . '/vendor/autoload.php';

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
$result = array_reduce(array_map(
    function ($m) {
        return $m['level'] + $m['atk'] + $m['def'];
    },
    array_filter(
        array_filter($monsters, function ($m) {
            return 0 == ($m['level'] % 2);
        }),
        function ($m) {
            return $m['def'] > $m['atk'];
        })),
                       function ($a, $b) {
                           return $a + $b;
                       });

$bench->end();

echo $bench->getTime(true);
echo "\t";
echo $bench->getMemoryPeak(true);
echo "\n";
