#!/bin/bash
# $1  - 输入文件
# $2  - 程序
# $3  - 输出路径
# $4  - Timelimit
# $5  - Memorylimit

IN=$1
Command=$2
Exe=$3
OUT=$4
TL=$5
ML=$6

#let "TL=$TL+1"

ulimit -t $TL

ulimit -v $ML


cat $IN | time -f "%E %M" $Command $Exe | cat > $OUT
