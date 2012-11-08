#!/bin/bash
PRG=$0
PRGDIR=`dirname "$PRG"`
CLASSPATH="$PRGDIR/../"
FILES=$PRGDIR/../lib/*
for f in $FILES
do
	CLASSPATH=${CLASSPATH}:$f
done
echo ${CLASSPATH}
#java -classpath ${CLASSPATH} com.tianji.suggestion.offline.PymkMain
