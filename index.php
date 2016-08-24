<head>
    <title>
        tx-crack
    </title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: fei_l
 * Date: 2016-08-18
 * Time: 17:24
 */
/*
 //openssl test
$w = stream_get_wrappers();
echo 'openssl: ',  extension_loaded  ('openssl') ? 'yes':'no', "\n";
echo 'http wrapper: ', in_array('http', $w) ? 'yes':'no', "\n";
echo 'https wrapper: ', in_array('https', $w) ? 'yes':'no', "\n";
echo 'wrappers: ', var_dump($w);
 */
//phpinfo();

$mid = $_GET["mid"];
$cid = $_GET["cid"];

//echo $mid,$cid,'</br>';
mkdir ('comic');
mkdir ('comic' . '/' . $mid);

if ($mid != '' && $cid != '') {
    if (file_exists('comic' . '/' . $mid . '/' . $cid . '.list')) {
        $myfile = fopen('comic' . '/' . $mid . '/' . $cid . '.list', "r");
        $html = fread($myfile, filesize('comic' . '/' . $mid . '/' . $cid . '.list'));
        fclose($myfile);

        echo '</br>';
        preg_match_all("/.{40}/i", $html, $pid);
        //print_r($pid);
        foreach ($pid[0] as $p) {
            echo '<img src="http://www.beihaiw.com/pic.php?url=http://imgsrc.baidu.com/forum/pic/item/' . $p . '.jpg"></br>';
        }
    } else {
        print "comic not found.";
        if (file_exists('comic' . '/' . $mid . '/' . $cid . '.html')) {
            print "comic is analyse!";
        } else {
            $listfile = fopen('downlist.txt','r');
            $listtext = fread($listfile, filesize('downlist.txt'));
            fclose($listfile);
            echo '</br>';
            if (strstr($listtext,$mid . ',' . $cid) != "")
            {
                echo 'id is in list!';
            }
            else
            {
                echo '</br>';

                $listfile = fopen('downlist.txt', a);
                fwrite($listfile, $mid . ',' . $cid . "\n");
                fclose($listfile);
                print $mid.' '.$cid. "added";
            }
        }
    }
    echo '<a href="index.php?mid=' . $mid . '&cid=' . ($cid + 1) . '">cid+1</a>';//temp
}
        }
    }
    echo '<a href="index.php?mid=' . $mid . '&cid=' . ($cid + 1) . '">cid+1</a>';//temp
}
else
{
    echo '404';
}

?>
</body>

