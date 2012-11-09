#!/bin/bash
PRG=$0
PRGDIR=`dirname "$PRG"`
CLASSPATH="$PRGDIR/search.jar"
FILES=$PRGDIR/lib/*
for f in $FILES
do
	CLASSPATH=${CLASSPATH}:$f
done
#echo ${CLASSPATH}
java -Xmx512m -Xms256m -classpath ${CLASSPATH} org.conan.search.SpringMainRun $1 $2 $3 $4
