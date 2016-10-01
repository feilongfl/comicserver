#!/usr/bin/fish
function uploadImg
    #妈的，百度账号好难弄，最后花了我0.25大洋买了个验证码注册成功了
    #set BDUSS h3UjVEUDdOYXZVbVRCb3cxNXhnQWNBY25ZaFIxeVdBY2tGaWhzYnFyYnQ3ZUZYQVFBQUFBJCQAAAAAAAAAAAEAAAB3SFygAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAO1gulftYLpXbT
    set BDUSS	VludWcxa0ZQUXQ4MjdiSVpQaExQcH4yQkxTS3RXS2NvdXRCc3hiLVp6aVREUlpZQUFBQUFBJCQAAAAAAAAAAAEAAAD-Vg-aAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJOA7leTgO5XS
    set file $argv[1]
    set savefile $argv[2]
    set return (curl --cookie "BAIDUID=BaiduIsAGreatSB;BDUSS="$BDUSS -F file=@$file 'http://upload.tieba.baidu.com/upload/pic?tbs='(curl --cookie "BAIDUID=BaiduIsAGreatSB" http://tieba.baidu.com/dc/common/imgtbs | jq '.data.tbs' | tr -d '"'))
    #echo $return
    if expr 0 = (echo $return | jq '.err_no');
        #success
        echo http://imgsrc.baidu.com/forum/pic/item/(echo $return | jq '.info.pic_id_encode' | tr -d '"').jpg
        #echo http://imgsrc.baidu.com/forum/pic/item/(echo $return | jq '.info.pic_id_encode' | tr -d '"').jpg >>$savefile
        echo $return | jq '.info.pic_id_encode' | tr -d '"' >>$savefile
    else
        echo $return | jq '.err_msg'
    end
end

function downloadImg
    set mid $argv[1]
    set cid $argv[2]
    set pid $argv[3]
    set url $argv[4]

    echo 'mid='$mid',cid='$cid',pid='$pid',url='$url

    mkdir -p ./comic/$mid/$cid
    #cd ./comic/$mid/$cid
    if wget -T 10 -O './comic/'$mid'/'$cid'/'$pid'.webp' $url;
        set err 0
        uploadImg './comic/'$mid'/'$cid'/'$pid'.webp' './comic/'$mid'/'$cid'.list'
    else
        rm './comic/'$mid'/'$cid'/'$pid'.webp'
    end
    #cd -
end

function main
    set mid $argv[1]
    set cid $argv[2]
    rm /app/comic/$argv[1]/$argv[2].list
    for l in (cat './comic/'$mid'/'$cid'.tx.list')
        set url (echo $l | sed -r "s/(.*)\t(.*)/\1/")
        set pid (echo $l | sed -r "s/(.*)\t(.*)/\2/")
        echo $url
        echo $pid
        downloadImg $mid $cid $pid $url
    end
    #downloadImg $mid $cid $pid $url
    #rm /app/comic/$argv[1]/$argv[2].html
    rm -rv /app/comic/$argv[1]/$argv[2]
    /app/comic/backup.fish $argv[1]'--'$argv[2]
end

main $argv
