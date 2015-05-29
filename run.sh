for i in $(virsh list|tail -n +3|awk '{print $2}'|sort); do
    PORTNUM=$(virsh vncdisplay $i|cut -f 2 -d ':')
    printf "% 2d: \033[01;32m%.20s\033[00m\n" "$PORTNUM" "$i";
    echo "Port: 590""$PORTNUM" "   VM :" "$i"  >> text.txt
done | sort -n
