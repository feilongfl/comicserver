<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=" utf-8" />
<?php include_once("analyticstracking.php") ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.2.1/css/bulma.css">
    <title>
        tx-crack
    </title>

</head>
<body>
    <?php
    header("Content-Type: text/html; charset=utf-8");
    $mid = $_GET["mid"];
    $cid = $_GET["cid"];

    //echo $mid,$cid,'</br>';
    mkdir ('comic');
    mkdir ('comic' . '/' . $mid);

    if ($mid != '' && $cid != '') {
?>
    <div class="notification is-danger">
        <button class="delete"></button>
        本网站仅供学习交流使用！！
    </div>
    <div class="notification is-info">
        <button class="delete"></button>
        欢迎访问<a href="http://tieba.baidu.com/p/4803466130">贴吧</a>交流:),
        路过看看<a href="http://txcomic.tk:32772/">主页</a>。
    </div>
<?php
        echo '<a class="button is-primary is-fullwidth" href="index.php?mid=' . $mid . '&cid=' . ($cid - 1) . '">cid-1</a>';
        if (file_exists('comic' . '/' . $mid . '/' . $cid . '.list')) {
            $myfile = fopen('comic' . '/' . $mid . '/' . $cid . '.list', "r");
            $html = fread($myfile, filesize('comic' . '/' . $mid . '/' . $cid . '.list'));
            fclose($myfile);

            echo '</br>';
            preg_match_all("/.{40}/i", $html, $pid);
            //print_r($pid);
            
            foreach ($pid[0] as $p) {
                echo '<div class="tile is-parent"><article class="tile is-child notification is-info"><p class="title">' . $p . '</p><figure class="image ">';
                echo '<img width="100%" height="100%" src="http://www.beihaiw.com/pic.php?url=http://imgsrc.baidu.com/forum/pic/item/' . $p . '.jpg"></br>';
                echo '</figure></article></div></div>';
            }
            //echo '<a class="button is-primary is-fullwidth" href="index.php?mid=' . $mid . '&cid=' . ($cid + 1) . '">cid+1</a>';
        } else {
            //print "comic not found.";
            if (file_exists('comic' . '/' . $mid . '/' . $cid . '.html'))
            {
                //print "comic is analyse!";
                //print '<div class="notification is-danger"><button class="delete"></button>comic is analyse!</div>';
            }
            else
            {
                $listfile = fopen('downlist.txt','r');
                $listtext = fread($listfile, filesize('downlist.txt'));
                fclose($listfile);

                echo '</br>';
                //            echo $listtext;
                //echo strpos($listtext,$mid . ',' . $cid);
                if (strstr($listtext,$mid . ',' . $cid) != "")
                {
                    //echo 'id is in list!';
                    //print '<div class="notification is-danger"><button class="delete"></button>id is in list!</div>';
                }
                else
                {
                    echo '</br>';

                    $listfile = fopen('downlist.txt', a);
                    fwrite($listfile, $mid . ',' . $cid . "\n");
                    fclose($listfile);
                    //print $mid.' '.$cid. "added";
                }

?>
                    <article class="message is-info">
                <div class="message-header">
                    该动漫未被共享！（漫画共享后服务器需要几分钟处理数据）
                </div>
                <div class="message-body">
                    您可以共享改漫画，安装
                    <a class="is-info" href="https://greasyfork.org/zh-CN/scripts/16887-%E8%85%BE%E8%AE%AF%E5%8A%A8%E6%BC%AB-%E7%A0%B4%E8%A7%A3">共享脚本</a>
                    ，安装后访问腾讯动漫网页并购买。如果您不会安装，请参考
                    <a href="https://greasyfork.org/zh-CN/help/installing-user-scripts">GreasyFork帮助文档</a>
                    。
                    返回<a href="http://txcomic.tk:32772/">主页</a>
                </div>
            </article>
<?php
            }
        }
        //echo '<a href="index.php?mid=' . $mid . '&cid=' . ($cid + 1) . '">cid+1</a>';//temp
        echo '<a class="button is-primary is-fullwidth" href="index.php?mid=' . $mid . '&cid=' . ($cid + 1) . '">cid+1</a>';
    }
    else
{
    include_once("welcome.php");
}

    ?>
</body>

</html>
