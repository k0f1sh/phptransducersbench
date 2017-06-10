#!/bin/bash

touch run_array.log
touch run_transducers.log

for i in `seq 100`
do
    php bench.php >> run_array.log
    php bench_transducers.php >> run_transducers.log
done
