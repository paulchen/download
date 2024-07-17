#!/bin/bash
DIRECTORY=`dirname "$0"`
cd "$DIRECTORY"
DIRECTORY=`pwd`

if [ ! -f "download.txt" ]; then
	exit
fi

cd downloads

error=0
#cat "$DIRECTORY/download.txt"
for a in `cat "$DIRECTORY/download.txt"`; do
	echo Downloading "$DIRECTORY/download.txt"...
	~paulchen/youtube-dl "$a" || error=1
done

if [ "$error" -eq "0" ]; then
	cd ..
	ls -lA downloads/ > downloads.lst
	echo '' > download.txt
fi


