#!/bin/bash

mkdir -p /var/www/localhost/ChartsHTML/tmp/m4

# temp
( while true; do
    if read -r line < /dev/ttyRPMSG0; then
        echo "$line" > /var/www/localhost/ChartsHTML/tmp/m4/temp
    fi
done ) &

# hum
( while true; do
    if read -r line < /dev/ttyRPMSG1; then
        echo "$line" > /var/www/localhost/ChartsHTML/tmp/m4/hum
    fi
done ) &

# press
( while true; do
    if read -r line < /dev/ttyRPMSG2; then
        echo "$line" > /var/www/localhost/ChartsHTML/tmp/m4/press
    fi
done ) &