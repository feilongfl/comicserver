<!--头部-->
<section class="hero is-info">
    <div class="">
        <div class="container">
            <nav class="nav">
                <div class="nav-left">
                    <a class="nav-item is-brand" href="/">

                        <p class="title">
                            <strong>
                                TxComic
                            </strong>
                        </p>
                </div>


                <span id="nav-toggle" class="nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>

                <div id="nav-menu" class="nav-right nav-menu">
                    <a class="nav-item " href="/">
                        Home
                    </a>
                    <a class="nav-item  is-active" href="https://github.com/ComicDatabase/ComicDatabase">
                        GitHub
                    </a>
                    <a class="nav-item " href="https://greasyfork.org/zh-CN/scripts/16887-%E8%85%BE%E8%AE%AF%E5%8A%A8%E6%BC%AB-%E7%A0%B4%E8%A7%A3">
                        GreasyFork
                    </a>
                    <a class="nav-item " href="http://tieba.baidu.com/p/4803466130">
                        贴吧
                    </a>

                </div>
            </nav>

        </div>
    </div>

    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column">
                    <p class="title">
                        导航
                    </p>                    
                </div>
                
            </div>
        </div>
    </div>
</section>

</br>

<!--中间-->
<div class="container">
    <div class="columns">
        <!--左边-->
        <div class="column is-half">
            <figure class="image is-square">
                <img src="logo.jpg" />
            </figure>
        </div>
        <!--右边-->
        <div class="column is-half">
            <article class="message is-warning">
                <div class="message-header">
                    GitHub
                </div>
                <div class="message-body">
                    所有数据存于GitHub，请不要爬本网站。。。
                </div>
            </article>

            <article class="message is-info">
                <div class="message-header">
                    GreasyFork
                </div>
                <div class="message-body">
                    欢迎安装<a class="is-info" href="https://greasyfork.org/zh-CN/scripts/16887-%E8%85%BE%E8%AE%AF%E5%8A%A8%E6%BC%AB-%E7%A0%B4%E8%A7%A3">共享脚本</a>。如果您不会使用，请参考<a href="https://greasyfork.org/zh-CN/help/installing-user-scripts">GreasyFork帮助文档</a>。
                </div>
            </article>

            <form action="http://txcomic.tk:32772/index.php">
                <label class="label">漫画Id</label>
                <p class="control">
                    <input class="input" type="text" name="mid" placeholder="521825" />
                </p>
                <label class="label">章节Id</label>
                <p class="control">
                    <input class="input" type="text" name="cid" placeholder="366" />
                </p>
                <p class="control">
                    <button class="button is-primary" >查看</button>
                </p>
            </form>
        </div>
    </div>
</div>

<!--底部-->
<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
                <strong>Bulma</strong>
                by
                <a href="http://jgthms.com">Jeremy Thomas</a>
                . The source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>
                . The website content
        is licensed
                <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC ANS 4.0</a>
                .
            </p>
            <p>
                <a class="icon" href="https://github.com/jgthms/bulma">
                    <i class="fa fa-github"></i>
                </a>
            </p>
        </div>
    </div>
</footer>
