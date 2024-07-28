<?php

$body = [
    'title' =>
'Trang cá nhân - '.$DB->site('title'), 'desc' => $DB->site('description'),
'keyword' => $DB->site('keywords') ]; $body['header'] = ''; $body['footer'] =
''; require_once(__DIR__.'/../../../models/is_user.php');
require_once(__DIR__.'/header.php'); require_once(__DIR__.'/navbar.php'); ?>

<body>
  <section id="main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-8 mt-3 pb-3">
          <div class="card card-categories">
            <div class="product-wrap">
              <div class="d-flex justify-content-start tab-main tab-header">
                <a
                  class="ms-3 me-3 tab-item"
                  href="/client/profile"
                >
                  <i class="fa fa-user"></i>
                  Thông tin cá nhân
                </a>
                <a
                  class="ms-3 me-3 tab-item active"
                  href="/client/transaction"
                >
                  <i class="fa fa-chart-line"></i>
                  Lịch sử giao dịch
                </a>
              </div>
            </div>
            <div class="card-body" id="profile">
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead class="bg-main">
                        <tr>
                          <th scope="col">Mã GD</th>
                          <th scope="col">Nội dung</th>
                          <th scope="col">Thời gian</th>
                          <th scope="col">Trạng thái</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">10530</th>
                          <td>
                            Nạp thành công 20 Gold vào tài khoản qua ATM tự
                            động.
                          </td>
                          <td class="text-nowrap">25/05/2024 - 12:54</td>
                          <td>
                            <code class="text-nowrap code-success">
                              Thành công
                            </code>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">10462</th>
                          <td>
                            Administrator đã trừ 200 Gold vào tài khoản nguyen
                            minh duc (Username: 0388065555) vào lúc 20/05/2024 -
                            21:41:18
                          </td>
                          <td class="text-nowrap">20/05/2024 - 09:41</td>
                          <td>
                            <code class="text-nowrap code-success">
                              Thành công
                            </code>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">10461</th>
                          <td>
                            Administrator đã trừ 200 Gold vào tài khoản nguyen
                            minh duc (Username: 0388065555) vào lúc 20/05/2024 -
                            21:40:48
                          </td>
                          <td class="text-nowrap">20/05/2024 - 09:40</td>
                          <td>
                            <code class="text-nowrap code-success">
                              Thành công
                            </code>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">10457</th>
                          <td>
                            Thanh toán mua gói banner phải với giá 400 Gold.
                            Thời gian từ ngày 20/05/2024 - 18:13 đến ngày
                            19/06/2024 - 18:13
                          </td>
                          <td class="text-nowrap">20/05/2024 - 06:13</td>
                          <td>
                            <code class="text-nowrap code-success">
                              Thành công
                            </code>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">10456</th>
                          <td>
                            Thanh toán mua gói banner giữa nhỏ với giá 400 Gold.
                            Thời gian từ ngày 20/05/2024 - 18:13 đến ngày
                            19/06/2024 - 18:13
                          </td>
                          <td class="text-nowrap">20/05/2024 - 06:13</td>
                          <td>
                            <code class="text-nowrap code-success">
                              Thành công
                            </code>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">10455</th>
                          <td>
                            Administrator đã cộng 1200 Gold vào tài khoản nguyen
                            minh duc (Username: 0388065555) vào lúc 20/05/2024 -
                            13:31:05
                          </td>
                          <td class="text-nowrap">20/05/2024 - 01:31</td>
                          <td>
                            <code class="text-nowrap code-success">
                              Thành công
                            </code>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">9455</th>
                          <td>
                            Thanh toán mua gói VIP vàng với giá 200 Gold. Thời
                            gian từ 18/04/2024 - 07:09 đến ngày 18/05/2024 -
                            07:09
                          </td>
                          <td class="text-nowrap">18/04/2024 - 07:09</td>
                          <td>
                            <code class="text-nowrap code-success">
                              Thành công
                            </code>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">9454</th>
                          <td>
                            Administrator đã trừ 200 Gold vào tài khoản nguyen
                            minh duc (Username: 0388065555) vào lúc 18/04/2024 -
                            06:54:04
                          </td>
                          <td class="text-nowrap">18/04/2024 - 06:54</td>
                          <td>
                            <code class="text-nowrap code-success">
                              Thành công
                            </code>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">9453</th>
                          <td>
                            Thanh toán mua gói banner giữa nhỏ với giá 400 Gold.
                            Thời gian từ ngày 18/04/2024 - 06:53 đến ngày
                            18/05/2024 - 06:53
                          </td>
                          <td class="text-nowrap">18/04/2024 - 06:53</td>
                          <td>
                            <code class="text-nowrap code-success">
                              Thành công
                            </code>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">9452</th>
                          <td>
                            Giao dịch thất bại ! Mã merchant không tồn tại hoặc
                            bị khóa
                          </td>
                          <td class="text-nowrap">18/04/2024 - 06:51</td>
                          <td>
                            <code class="text-nowrap code-danger">
                              Thát bại
                            </code>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <nav class="mt-3">
                    <section class="">
                      <ul class="pagination justify-content-center">
                        <li class="page-item">
                          <a
                            class="page-link"
                            href="/thong-tin-tai-khoan.htm?view=transaction&amp;page=1"
                            tabindex="-1"
                          >
                            <i class="fa fa-angle-double-left"></i>
                          </a>
                        </li>
                        <li class="page-item">
                          <a
                            class="page-link"
                            href="/thong-tin-tai-khoan.htm?view=transaction&amp;page=1"
                            tabindex="-1"
                          >
                            <i class="fa fa-angle-left"></i>
                          </a>
                        </li>
                        <li class="page-item active">
                          <a
                            class="page-link"
                            href="/thong-tin-tai-khoan.htm?view=transaction&amp;page=1"
                            >1</a
                          >
                        </li>
                        <li class="page-item">
                          <a
                            class="page-link"
                            href="/thong-tin-tai-khoan.htm?view=transaction&amp;page=2"
                            >2</a
                          >
                        </li>
                        <li class="page-item">
                          <a
                            class="page-link"
                            href="/thong-tin-tai-khoan.htm?view=transaction&amp;page=2"
                          >
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </li>
                        <li class="page-item">
                          <a
                            class="page-link"
                            href="/thong-tin-tai-khoan.htm?view=transaction&amp;page=2"
                          >
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </section>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--//nav phải-->
        <div class="col-12 col-md-4 mt-3">
          <div class="bg-white p-3 coin-wrap mb-3">
            <div class="coin-detail">
              <div class="coin-img">
                <img
                  src="<?=BASE_URL('assets/Content/images/icon/coin.png');?>"
                />
              </div>
              <div class="coin-info">
                <div class="lb">Số dư tài khoản:</div>
                <div class="vl">
                  <?=format_cash($getUser['money']);?>
                  Gold
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <a
              class="btn btn-coin w-100"
              href="<?=base_url('client/nap-gold');?>"
              ><i class="fas fa-credit-card"></i> Nạp tiền</a
            >
            <div class="menu-cat-parent">
              <div class="coins-value mt-3">
                <a class="btn btn-category" href="/client/profile">
                  <span>
                    <i class="fa fa-angle-right"></i>
                    Thông tin cá nhân
                  </span>
                </a>
                <a class="btn btn-category" href="/client/nap-gold">
                  <span>
                    <i class="fa fa-angle-right"></i>Nạp Gold vào tài
                    khoản</span
                  >
                </a>
                <a class="btn btn-category" href="/client/quan-ly-tin-dang">
                  <span>
                    <i class="fa fa-angle-right"></i>Quản lý tin đăng</span
                  >
                </a>
                <a
                  class="btn btn-category"
                  href="<?=base_url('client/quan-ly-banner');?>"
                >
                  <span> <i class="fa fa-angle-right"></i>Quản lý banner</span>
                </a>
                <a
                  class="btn btn-category active"
                  href="<?=base_url('client/transaction');?>"
                >
                  <span>
                    <i class="fa fa-angle-right"></i>Lịch sử giao dịch</span
                  >
                </a>
                <?php if ($getUser['admin'] == '1') { ?>
                <a class="btn btn-category" href="<?=base_url('admin/home');?>">
                  <span> <i class="fa fa-angle-right"></i>Trang quản trị</span>
                </a>
                <?php } ?>
                <a
                  class="btn btn-category logout"
                  href="<?=base_url('client/logout');?>"
                >
                  <span><i class="fa fa-sign-out-alt"></i>Đăng xuất</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

<?php
require_once(__DIR__.'/footer.php');
?>
