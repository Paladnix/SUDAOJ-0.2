#!/bin/bash
# $1  - 输入文件
# $2  - 程序
# $3  - 输出路径
# $4  - Timelimit
# $5  - Memorylimit

IN=$1
Command=$2
OUT=$3
TL=$4
ML=$5

let "TL=$TL+1"

ulimit -t $TL

ulimit -v $ML

#echo "TL=${TL}   ML=${ML}"

cat $IN | time -f "%E %M" $Command | cat > $OUT
