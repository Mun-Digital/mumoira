<?php
$body = [
    'title' =>
'Liên hệ với chúng tôi | MuMoiRa.tv -
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
              Liên hệ với bộ phận hỗ trợ của MUMớiRa.tv
            </h1>
            <p class="text-center">
              Nếu bạn có bất kỳ thắc mắc nào, bạn có thể liên hệ với bộ phận hỗ
              trợ qua Facebook Messenger của MuMoiRa.tv
            </p>
          </section>
        </div>
      </div>
      <hr />
      <div class="col-12 col-sm-6">
        <div class="contact_message content">
          <h3>Về chúng tôi</h3>
          <p>
            Mumoira.tv là chuyên trang có số lượng người yêu thích game Mu
            Online thường xuyên ghé thăm nhất Việt Nam. Chúng tôi tập hợp thông
            tin tất cả các game Mu Online chuẩn bị Alpha Test/Open Beta được
            kiểm duyệt cũng như sắp xếp để người chơi có thể dễ dàng tìm kiếm Mu
            mới ra hợp với ý mình nhất. Đồng thời, chúng tôi cũng viết ra cẩm
            nang hướng dẫn chơi game Mu Online giúp người chơi hiểu rõ về cách
            chơi/nhân vật/sự kiện/ép đồ trong game Mu Online. Do đó, đây là nơi
            lý tưởng để bạn giới thiệu game Mu Online của mình đến với người
            chơi một cách hiệu quả và tiết kiệm nhất.
          </p>
          <ul class="info-contact"></ul>
          <br />
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.4938843377363!2d105.8101232154021!3d21.012915593693847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab2aab12b7ad%3A0xccb253c5ce5a061f!2zTVUgTeG7m2kgUmEgLSBU4buVbmcgSOG7o3AgTVVPbmxpbmU!5e0!3m2!1svi!2s!4v1633967663830!5m2!1svi!2s"
            width="100%"
            height="300"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
          ></iframe>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <div class="contact_message form">
          <h3>Gửi thư liên hệ với chúng tôi</h3>
          <form
            id="form-contact"
            method="post"
            action="/them-lien-he"
            novalidate="novalidate"
          >
            <div class="mb-3">
              <label class="form-label"
                >Họ và tên <span class="text-red">(*)</span></label
              >
              <input
                type="text"
                name="FullName"
                class="form-control"
                placeholder="Vui lòng nhập họ và tên"
              />
            </div>
            <div class="mb-3">
              <label class="form-label"
                >Số điện thoại <span class="text-red">(*)</span></label
              >
              <input
                type="text"
                name="Mobile"
                class="form-control"
                placeholder="Vui lòng nhập số điện thoại"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input
                type="email"
                name="Email"
                class="form-control"
                placeholder="Vui lòng nhập email"
              />
            </div>
            <div class="mb-3">
              <label class="form-label"
                >Danh mục thư liên hệ <span class="text-red">(*)</span></label
              >
              <select class="form-select" name="ContactCategoryId">
                <option value="1">Liên hệ quảng cáo</option>
                <option value="2">Hỗ trợ kỹ thuật</option>
                <option value="3">Khác</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label"
                >Nội dung <span class="text-red">(*)</span></label
              >
              <textarea
                class="form-control"
                placeholder="Vui lòng nhập nội dung thư liên hệ"
                name="Content"
              ></textarea>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-paper-plane"></i> Gửi thư liên hệ
              </button>
              <button type="reset" class="btn btn-outline-dark">Làm mới</button>
            </div>
            <input
              name="__RequestVerificationToken"
              type="hidden"
              value="CfDJ8NErE2f8l85JsNfmIbP4jivnPSZWZQo8wXuTZ2J0kB2831a3cWj3N0D0sPftxAoyOBUJOsZgRHc4wi2s9K2PyIB3tg6OaqsKOTZwGzUE-6TXfxccFbfAA6Ow2BWVbFfncAm5Gv1MhZAfFduX63gXF2ORy3sc54ld7quc3lwd5LmS5lIzkPA3IHRcqATDHxUChA"
            />
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

<?php
require_once(__DIR__.'/footer.php');
?>
