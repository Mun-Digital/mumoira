
<?php

$body = [
    'title' =>
'Giới thiệu về website | MuMoiRa.tv -
'.$DB->site('title'), 'desc' => 'ok', 'keyword' => 'ok' ]; $body['header'] = '';
$body['footer'] = ''; require_once(__DIR__.'/header.php');
require_once(__DIR__.'/navbar.php'); ?>

<body>
<section id="main">
  <div class="container contact">
    <div class="row">
      <div class="col-12">
        <div class="container">
          <section class="content-title-section mb-10">
            <h1 class="title title-center mb-3">
              Muốn giới thiệu Game Mu Online của bạn đến với nhiều người hơn?
            </h1>
          </section>
        </div>
      </div>
      <hr />
      <div class="col-12 col-sm-8">
        <div class="contact_message content">
          <h3>Về chúng tôi</h3>
          <p>
            Bạn đã đến đúng chỗ.
            <a href="https://mumoira.tv"><b>Mumoira.tv</b></a> là nơi giới thiệu
            và quảng cáo Game Mu Online mới ra và sắp ra hiện nay. Mumoira.tv là
            chuyên trang có số lượng người yêu thích game Mu Online thường xuyên
            ghé thăm nhất Việt Nam. Hệ thống vận hành Mumoira.tv được phân tích
            và tối ưu thông minh giúp người dùng có những trải nghiệm tốt nhất
            trong quá trình sử dụng.
          </p>
        </div>
      </div>
      <div class="col-12 col-sm-4">
        <img src="https://i.imgur.com/Zwj0Wb0.png" />
      </div>
    </div>
  </div>
</section>
</body>

<?php
require_once(__DIR__.'/footer.php');
?>