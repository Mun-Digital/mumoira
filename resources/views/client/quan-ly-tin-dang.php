<?php

$body = [
    'title' =>
'Quản lý tin đăng | MuMoiRa.tv - '.$DB->site('title'), 'desc' => 'ok', 'keyword'
=> 'ok' ]; $body['header'] = ''; $body['footer'] = '';
require_once(__DIR__.'/../../../models/is_user.php');
require_once(__DIR__.'/header.php'); 
require_once(__DIR__.'/navbar.php'); ?>

<body>
  <section id="main">
    <section class="home-categories">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-8 mt-3 pb-3">
            <div class="card card-categories">
              <div class="card-header">Quản lý tin đăng</div>
              <div class="card-body">
                <div class="user-manager d-block d-sm-flex">
                  <div style="width: 100%">
                    <div class="img-user">
                      <img
                        src="<?=base_url('assets/Content/images/icon/avataremty.png');?>"
                        onerror='this.onerror=null;this.src="~/Content/images/icon/avataremty.png";'
                      />
                    </div>
                    <div>
                      <div class="info-user">
                        <div class="name">
                          <a href="/client/profile">
                           <?=$getUser['username'];?>
                          </a>
                        </div>
                        <div class="link">
                          <a href="/client/profile"
                            >Xem thông tin cá nhân</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex link-manager">
                    <div></div>
                  </div>
                </div>
              </div>
            </div>
            <div id="main-product-list">
              <div class="product-wrap p-3 mt-3 mb-3 bg-white">
                <div class="d-flex justify-content-start tab-main">
                  <a
                    class="ms-3 me-3 tab-item text-nowrap active"
                    href="/quan-ly-tin-dang-1-1.htm"
                  >
                    Đã duyệt (1)
                  </a>
                  <a
                    class="ms-3 me-3 tab-item text-nowrap"
                    href="/quan-ly-tin-dang-1-2.htm"
                  >
                    Chờ duyệt (0)
                  </a>
                  <a
                    class="ms-3 me-3 tab-item text-nowrap"
                    href="/quan-ly-tin-dang-1-0.htm"
                  >
                    Đang ẩn (0)
                  </a>
                  <a
                    class="ms-3 me-3 tab-item text-nowrap"
                    href="/quan-ly-tin-dang-1-3.htm"
                  >
                    Bị từ chối (0)
                  </a>
                </div>
                <div class="list-content-product mt-3">
                  <ul class="list-post">
                    <li class="mb-3">
                      <div
                        class="d-block d-sm-flex justify-content-between align-items-center item-post"
                      >
                        <div class="item-post-left">
                          <p class="stt">1</p>
                        </div>
                        <div class="item-post-middle">
                          <div class="img-post">
                            <video autoplay="" loop="" muted="" playsinline="">
                              <source
                                src="https://i.imgur.com/lvsQHNi.mp4"
                                type="video/mp4"
                                loading="lazy"
                              />
                            </video>
                          </div>
                          <a
                            class="item-title"
                            title="Mu Việt Nam - Season 6 Exp 9999x - Drop 60% - Miễn Phí 100%"
                            href="/chi-tiet-mu-moi-ra/mu-viet-nam-season-6-exp-9999x-drop-60-mien-phi-100-11244"
                          >
                            Mu Việt Nam - Season 6 Exp 9999x - Drop 60% - Miễn
                            Phí 100%
                          </a>
                          <div class="post-info">
                            <div class="info-line d-flex">
                              <div class="key-value">
                                <div class="key">- Sever:</div>
                                <div class="value">Huyền Thoại</div>
                              </div>
                              <div class="key-right">
                                <div class="key">- Alpha Test:</div>
                                <div class="value">
                                  19/04<span class="year">/2024</span> (13h)
                                </div>
                              </div>
                            </div>
                            <div class="info-line d-flex">
                              <div class="key-value">
                                <div class="key">- Phiên Bản:</div>
                                <div class="value">Season 6</div>
                              </div>
                              <div class="key-right">
                                <div class="key">- Open Beta:</div>
                                <div class="value text-bold-red">
                                  21/04<span class="year">/2024</span> (13h)
                                </div>
                              </div>
                            </div>
                            <div class="info-line d-flex">
                              <div class="key-value">
                                <div class="key">- Ngày đăng:</div>
                                <div class="value">18/04/2024 - 07:08</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="item-post-right text-center">
                          <div class=""></div>
                        </div>
                      </div>
                      <div class="info-post float-end">
                        <div class="align-self-end me-3">
                          <div class="dropdown">
                            <button
                              class="btn btn-sm btn-xs btn-warning dropdown-toggle"
                              type="button"
                              id="dropdownMenuButton"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              Hành động
                            </button>
                            <div
                              class="dropdown-menu"
                              aria-labelledby="dropdownMenuButton"
                              data-id="80"
                            >
                              <a
                                class="dropdown-item hidden-post"
                                href="/dang-quang-cao-mu-online-11244.htm"
                              >
                                <i class="fa fa-pen"></i> Sửa tin
                              </a>
                              <a
                                class="dropdown-item hidden-post"
                                href="/change-status/11244/0"
                              >
                                <i class="fa fa-eye-slash"></i> Ẩn tin
                              </a>
                              <div
                                class="dropdown-item delete-post text-red cursor-pointer"
                                data-url="/delete-post/11244/1"
                              >
                                <i class="fa fa-trash"></i> Xóa tin
                              </div>
                            </div>
                            <button
                              class="btn btn-sm btn-xs btn-success btn-push"
                              data-id="11244"
                            >
                              <i class="fa fa-level-up-alt"></i>
                              Mua VIP Vàng
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="content-sub d-block d-sm-flex">
                        <div class="item-vip-left"></div>
                        <div class="content">
                          <p>Mu Việt Nam - Miễn Phí 100%</p>
                          <p>
                            Mu mới ra tháng 04 2024 - Mở máy chủ Huyền Thoại vào
                            13h ngày 21/04/2024
                          </p>
                          <p>
                            Trang chủ:
                            <a
                              class="text-red"
                              target="_blank"
                              href="http://muvn8x.com/"
                              title="Trang chủ của Mu Việt Nam Season 6"
                              rel="nofollow noopener"
                              >http://muvn8x.com/</a
                            >
                          </p>
                          <p>Phiên bản: Season 6</p>
                          <p>Exp: 9999x - Drop: 60%</p>
                          <p>Kiểu reset: Reset In Game</p>
                          <p>Thể loại: Mu Nguyên bản Webzen</p>
                          <p>Kiểu Point: Nguyên bản</p>
                          <p>Antihack mà Mu sử dụng:</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <nav class="mt-3">
                    <section class="d-none">
                      <ul class="pagination justify-content-center">
                        <li class="page-item">
                          <a
                            class="page-link"
                            href="/quan-ly-tin-dang-1-1.htm"
                            tabindex="-1"
                          >
                            <i class="fa fa-angle-double-left"></i>
                          </a>
                        </li>
                        <li class="page-item">
                          <a
                            class="page-link"
                            href="/quan-ly-tin-dang-1-1.htm"
                            tabindex="-1"
                          >
                            <i class="fa fa-angle-left"></i>
                          </a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="/quan-ly-tin-dang-1-1.htm"
                            >1</a
                          >
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="/quan-ly-tin-dang-1-1.htm">
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="/quan-ly-tin-dang-1-1.htm">
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
          <div class="col-12 col-md-4 mt-3">
            <div class="bg-white p-3 coin-wrap mb-3">
              <div class="coin-detail">
                <div class="coin-img">
                  <img
                    src="<?=base_url('assets/Content/images/icon/coin.png');?>"
                  />
                </div>
                <div class="coin-info">
                  <div class="lb">Số dư tài khoản:</div>
                  <div class="vl"><?=format_cash($getUser['money']);?> Gold</div>
                </div>
              </div>
              <div class="clearfix"></div>
              <a class="btn btn-coin w-100" href="<?=base_url('client/nap-gold');?>"
                ><i class="fas fa-credit-card"></i> Nạp Gold</a
              >
              <div class="menu-cat-parent">
                <div class="coins-value mt-3">
                  <a class="btn btn-category" href="<?=base_url('client/nap-gold');?>">
                    <span>
                      <i class="fa fa-angle-right"></i>
                      Thông tin cá nhân
                    </span>
                  </a>
                  <a class="btn btn-category" href="<?=base_url('client/nap-gold');?>>
                    <span>
                      <i class="fa fa-angle-right"></i> Nạp Gold</span
                    >
                  </a>
                  <a
                    class="btn btn-category active"
                    href="<?=base_url('client/quan-ly-tin-dang');?>""
                  >
                    <span>
                      <i class="fa fa-angle-right"></i> Quản lý tin đăng</span
                    >
                  </a>
                  <a class="btn btn-category" href="/client/quan-ly-banner">
                    <span>
                      <i class="fa fa-angle-right"></i> Quản lý banner</span
                    >
                  </a>
                  <a
                    class="btn btn-category"
                    href="/client/transaction"
                  >
                    <span>
                      <i class="fa fa-angle-right"></i> Lịch sử giao dịch</span
                    >
                  </a>
                <?php if ($getUser['admin'] == '1') { ?>
                <a class="btn btn-category" href="<?=base_url('admin/home');?>">
                  <span> <i class="fa fa-angle-right"></i>Trang quản trị</span>
                </a>
                <?php } ?>

                  <a class="btn btn-category logout" href="/client/logout">
                    <span><i class="fa fa-sign-out-alt"></i> Đăng xuất</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
</body>

<?php
require_once(__DIR__.'/footer.php');
?>
