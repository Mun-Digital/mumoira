<?php

$body = [
    'title' => 'Nạp Gold vào tài khoản - '.$DB->site('title'),
    'desc'   => $DB->site('description'),
    'keyword' => $DB->site('keywords')
];
$body['header'] = '';
$body['footer'] = '';
require_once(__DIR__.'/../../../models/is_user.php');
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/navbar.php');
?>

<body>
    <section id="main">
  <section class="home-categories">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-8 mt-3 pb-3">
          <div class="card card-categories">
            <div class="card-header">Nạp Gold vào tài khoản</div>
            <div class="card-body">
              <div class="user-manager d-block d-sm-flex">
                <div style="width: 100%">
                  <div class="img-user">
                    <img
                      src="<?=BASE_URL('assets/Content/images/icon/avataremty.png');?>"
                      onerror='this.onerror=null;this.src="~/Content/images/icon/avataremty.png";'
                    />
                  </div>
                  <div>
                    <div class="info-user">
                      <div class="name">
                        <a href="/clent/profile"> nguyen minh duc </a>
                      </div>
                      <div class="link">
                        <a href="/clent/profile"
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
          <div class="p-3 mt-3 bg-white" id="top-up-panel">
            <div>
              <ul class="nav nav-tabs" id="tab-head-parent" role="tablist">
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link active text-nowrap"
                    id="atm-online-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#atm-online"
                    type="button"
                    role="tab"
                    aria-controls="home"
                    aria-selected="true"
                  >
                    1 - Thẻ ATM
                  </button>
                </li>
              </ul>
            </div>
            <div class="tab-content" id="wallet-child-content">
              <div
                class="tab-pane fade show active"
                id="atm-online"
                role="tabpanel"
                aria-labelledby="atm-online-tab"
              >
                <form
                  id="amountForm"
                  onsubmit="if (!window.__cfRLUnblockHandlers) return false; return false;"
                >
                  <div class="d-block d-sm-flex">
                    <div class="flex-grow-1" style="text-align: center">
                      <img
                        width="280"
                        id="imageToReload"
                        src="https://api.vietqr.io/image/970422-3666666866-qr_only.jpg?accountName=MUONLINE&amp;amount=100000&amp;addInfo=mmr 7421"
                        alt="Reloadable Image"
                      />
                      <div class="clearfix"></div>
                    </div>
                    <div class="bg-pop" id="boxMoneyATM">
                      <div class="note">
                        <b class="color-main">SỐ TIỀN NẠP</b>
                        <em class="orange">(1.000 đ = 1 Gold)</em>
                      </div>
                      <input
                        type="number"
                        class="form-control"
                        id="amountInput"
                        value="100000"
                        placeholder="Nhập số tiền..."
                        min="100000"
                        step="10000"
                        required=""
                      />
                      <div
                        class="d-block justify-content-end mb-3 mt-3"
                        style="text-align: center"
                      >
                        <div class="note">
                          <em class="orange"
                            >Nhập đúng nội dung để tự động cộng GOLD:</em
                          >
                        </div>
                        <input
                          class="form-control"
                          value="mmr 7421"
                          disabled=""
                        />
                      </div>
                    </div>
                  </div>
                </form>
                <div class="alert alert-warning m-0" role="alert">
                  <ul class="ps-3">
                    <li style="list-style: disc !important">
                      Hãy quét mã QR để nạp tiền chính xác nhất.
                    </li>
                    <li style="list-style: disc !important">
                      Sau khi giao dịch thành công hệ thống sẽ tự động cộng GOLD
                      sau 1-5 phút.
                    </li>
                  </ul>
                </div>
                <div class="clearfix"></div>
                <script type="text/javascript">
                  document
                    .getElementById("amountInput")
                    .addEventListener("input", reloadImage);

                  function reloadImage() {
                    const amount = document.getElementById("amountInput").value;
                    const img = document.getElementById("imageToReload");
                    const baseSrc =
                      "https://api.vietqr.io/image/970422-3666666866-qr_only.jpg?accountName=MUONLINE&addInfo=mmr 7421";
                    img.src = `${baseSrc}&amount=${amount}&timestamp=${new Date().getTime()}`;
                  }
                </script>
              </div>
            </div>
          </div>
        </div>
                <div class="col-12 col-md-4 mt-3">
                    <div class="bg-white p-3 coin-wrap mb-3">
                        <div class="coin-detail">
                            <div class="coin-img">
                                <img src="<?=BASE_URL('assets/Content/images/icon/coin.png');?>">
                            </div>
                            <div class="coin-info">
                                <div class="lb">Số dư tài khoản:</div>
                                <div class="vl"><?=format_cash($getUser['money']);?> Gold</div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <a class="btn btn-coin w-100" href="<?=base_url('client/nap-gold');?>"><i class="fas fa-credit-card"></i> Nạp tiền</a>
                        <div class="menu-cat-parent">
                            <div class="coins-value mt-3 ">
                                <a class="btn btn-category " href="/client/profile">
                                  <span>
                                    <i class="fa fa-angle-right"></i>
                                    Thông tin cá nhân
                                  </span>
                                </a>
                                <a class="btn btn-category active" href="/client/nap-gold">
                                    <span> <i class="fa fa-angle-right"></i>Nạp Gold vào tài khoản</span>
                                </a>
                                <a class="btn btn-category" href="/client/quan-ly-tin-dang">
                                    <span> <i class="fa fa-angle-right"></i>Quản lý tin đăng</span>
                                </a>
                                <a class="btn btn-category" href="<?=base_url('client/quan-ly-banner');?>">
                                    <span> <i class="fa fa-angle-right"></i>Quản lý banner</span>
                                </a>
                                <a class="btn btn-category" href="<?=base_url('client/transaction');?>">
                                    <span> <i class="fa fa-angle-right"></i>Lịch sử giao dịch</span>
                                </a>
                                <?php if ($getUser['admin'] == '1') { ?>
                                    <a class="btn btn-category" href="<?=base_url('admin/home');?>">
                                        <span> <i class="fa fa-angle-right"></i>Trang quản trị</span>
                                    </a>
                                <?php } ?>
                                <a class="btn btn-category logout" href="<?=base_url('client/logout');?>">
                                    <span><i class="fa fa-sign-out-alt"></i>Đăng xuất</span>
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