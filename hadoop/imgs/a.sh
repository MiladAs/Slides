for pic in *.jpg; do
    composite -dissolve 30% -gravity south watermark.jpg $pic ${pic//.jpg}-marked.jpg
done
