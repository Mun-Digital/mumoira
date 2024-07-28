<?php

$body = [
    'title' =>
'Mu Mới Ra Hôm Nay - Mu Online Private mới ra hay nhất | MuMoiRa.tv -
'.$DB->site('title'), 'desc' => 'ok', 'keyword' => 'ok' ]; $body['header'] = '';
$body['footer'] = ''; require_once(__DIR__.'/header.php');
require_once(__DIR__.'/navbar.php'); ?>

<body>
    <section id="main">
        <div class="container-fluid d-p-0 d-sm-0">
            <div class="d-flex justify-content-between">
                <?php
require_once(__DIR__.'/banner/banner-left.php');
?>
<!--content ở giữa -->
          <div class="content-middle">
            <div class="top-banner">
                <!--banner to giữa-->
              <div class="mumoira-bm1">
                <a href="http://muvietss6.net?utm_source=mumoira.tv&amp;utm_medium=default&amp;utm_campaign=mumoira_bTop1" title="MU VIỆT SS6" rel="nofollow noopener" target="_blank">
                <video autoplay="" loop="" muted="" playsinline="">
                <source src="https://i.imgur.com/oogCmmH.mp4" width="780" height="280" type="video/mp4" alt="Giới thiệu Mu Online - MU VIỆT SS6" title="Giới thiệu Mu Online - MU VIỆT SS6" loading="lazy">
                </video>
                </a>
                </div>
                <!--banner to giữa-->
                <!--banner nhỏ giữa-->
              <div class="mumoira-bm2">
                <a
                  href="https://mubattu.net/?utm_source=mumoira.tv&amp;utm_medium=default&amp;utm_campaign=mumoira_bTop2"
                  title="MU B&#x1EA5;t T&#x1EED; Ss1.9 Plus"
                  rel="nofollow noopener"
                  target="_blank"
                >
                  <video autoplay loop muted playsinline>
                    <source
                      src="https://i.imgur.com/kPppEEv.mp4"
                      width="780"
                      height="110"
                      type="video/mp4"
                      alt="Giới thiệu Mu Online - MU B&#x1EA5;t T&#x1EED; Ss1.9 Plus"
                      title="Giới thiệu Mu Online - MU B&#x1EA5;t T&#x1EED; Ss1.9 Plus"
                      loading="lazy"
                    />
                    <img
                      src="https://imgur.com/kPppEEv"
                      width="780"
                      height="110"
                      alt="Giới thiệu Mu Online - MU B&#x1EA5;t T&#x1EED; Ss1.9 Plus"
                      title="Giới thiệu Mu Online - MU B&#x1EA5;t T&#x1EED; Ss1.9 Plus"
                      loading="lazy"
                    />
                  </video>
                </a>
              </div>
              <!--banner nhỏ giữa-->
            </div>
<!--post-wrap nội dung bài viết-->
                <?php
require_once(__DIR__.'/post-wrap.php');
?>
<!--post-wrap-->
            
            <div class="hr"></div>
<!--blog-wrap bài viết hướng dẫn MU mới-->
<?php
require_once(__DIR__.'/blog-wrap.php');
?>
<!--blog-wrap-->
            
          </div>
<!--hết nội dung-->



                <?php
require_once(__DIR__.'/banner/banner-right.php');
?>
            </div>
        </div>
    </section>

    <div class="fakeLoader hide" style="background-color: rgb(0 0 0 / 52%)">
        <div class="wrap-loading">
            <div>
                <div class="fl fl-spinner spinner5">
                    <div class="cube1"></div>
                    <div class="cube2"></div>
                </div>
            </div>
            <div class="text-loading"></div>
        </div>
    </div>
</body>

<?php
require_once(__DIR__.'/footer.php');
?>