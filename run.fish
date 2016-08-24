#!/usr/bin/fish

echo start ...;while true;if expr 0 != (cat downlist.txt | wc -l) >/dev/null;set l (head -n 1 downlist.txt);set dmid (echo $l | grep -oE '^[0-9]+');set dcid (echo $l | grep -oE '[0-9]+$');echo $dmid $dcid;./txc.fish $dmid $dcid;sed -i '1d' downlist.txt;echo '*********************'$dmid'**'$dcid'*********';date;end;sleep 5;end


