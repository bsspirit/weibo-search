#!/bin/bash
PRG=$0
#PRGDIR=`dirname "$PRG"`
PRGDIR=d:/workspace/java/weibo-search/search/target/search
#PRGDIR=/home/huang/deploy/search
CLASSPATH="$PRGDIR/search.jar"
FILES=$PRGDIR/lib/*
for f in $FILES
do
	CLASSPATH=${CLASSPATH}:$f
done
#echo ${CLASSPATH}
java -Xmx512m -Xms256m -classpath ${CLASSPATH} org.conan.search.SpringMainRun $1 $2 $3 $4
