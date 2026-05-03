#!/bin/bash
cat public/css/animation.css | grep -v "var(--slideImage" > temp_animation.css
mv temp_animation.css public/css/animation.css
