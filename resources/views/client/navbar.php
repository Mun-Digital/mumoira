 <?php
$token = isset($_SESSION['token']) ? $_SESSION['token'] : null;
if  (!empty($token)){
    require_once(__DIR__.'/../../../models/is_user.php');
}
?>

<!--giao diện mobile-->
<!--giao diện chưa login-->
<?php if (empty($token)): ?>
<section>
  <div id="pageslide" class="">
    <div class="header-mobile">
      <a class="navbar-brand img-logo" href="<?=base_url('');?>">
        <img
          src="<?=base_url('assets/Content/images/logo/header_logo.png');?>"
          title="Mu Mới Ra - Kênh tổng hợp MU lớn nhất Việt Nam | MuMoiRa.tv"
          alt="Mu Mới Ra - Kênh tổng hợp MU lớn nhất Việt Nam | MuMoiRa.tv"
        />
      </a>
      <ul class="navbar-nav">
        <li class="nav-item" data-menu="/">
          <a class="nav-link" href="<?=base_url('');?>">
            <span></span>
            Trang chủ
          </a>
        </li>
        <li class="nav-item" data-menu="#">
          <a class="nav-link" href="<?=base_url('client/mu-alpha-test');?>">
            <span></span>
            Mu Alpha test hôm nay
          </a>
        </li>
        <li class="nav-item" data-menu="#">
          <a class="nav-link" href="<?=base_url('client/mu-open-beta');?>">
            <span></span>
            Mu Open hôm nay
          </a>
        </li>
        <li class="nav-item" data-menu="#">
          <a class="nav-link" href="<?=base_url('client/huong-dan-choi-mu-online');?>">
            <span></span>
            Hướng dẫn chơi game
          </a>
        </li>
        <li class="nav-item" data-menu="#">
          <a class="nav-link" href="<?=base_url('client/thong-tin-thue-banner');?>">
            <span></span>
            Thuê banner
          </a>
        </li>
        <li class="nav-item" data-menu="#">
          <a class="nav-link" href="<?=base_url('client/contact');?>">
            <span></span>
            Liên hệ
          </a>
        </li>
      </ul>
      <div class="upload-adv-absolute">
        <div class="social btn-upload-adv">
          <a rel="nofollow" href="<?=base_url('client/dang-quang-cao-mu-online');?>">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Đăng MU Mới
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php else: ?>
<!--giao diện khi login-->
<section>
  <div id="pageslide" class="">
    <div class="header-mobile">
      <a class="navbar-brand img-logo" href="">
        <img
          src="<?=base_url('assets/Content/images/logo/header_logo.png');?>"
          title="Mu Mới Ra - Kênh tổng hợp MU lớn nhất Việt Nam | MuMoiRa.tv"
          alt="Mu Mới Ra - Kênh tổng hợp MU lớn nhất Việt Nam | MuMoiRa.tv"
        />
      </a>
      <div class="sidebar-header">
        <div class="user-pic">
          <img
            class="img-responsive img-rounded"
            src="<?=base_url('assets/Content/images/icon/avataremty.png');?>"
            alt="User picture"
          />
        </div>
        <a class="user-info" href="<?=base_url('client/profile');?>">
          <span class="user-name"> Phan Hữu Toại </span>
          <span class="user-role">Xem trang cá nhân</span>
        </a>
      </div>
      <div class="mt-2 mb-3">
        <div class="mt-1">
          <a
            class="coin-center coin-center-mb d-flex justify-content-center align-items-center"
            href="<?=base_url('client/nap-gold');?>"
          >
            <i class="icon-coin-mb"></i>
            <span class="coin">00 Gold</span>
          </a>
        </div>
        <div class="mt-3">
          <a
            class="btn btn-sm btn-warning text-nowrap"
            style="width: 150px; text-align: left"
            href="<?=base_url('client/quan-ly-tin-dang');?>"
          >
            <i class="fa fa-clipboard-list"></i>
            Quản lý tin
          </a>
        </div>
        <div class="mt-1">
          <a
            class="btn btn-sm btn-warning text-nowrap"
            style="width: 150px; text-align: left"
            href="<?=base_url('client/quan-ly-banner');?>"
          >
            <i class="fa fa-layer-group"></i>
            Quản lý Banner
          </a>
        </div>
        <div class="mt-1">
          <a
            class="btn btn-sm btn-warning text-nowrap"
            style="width: 150px; text-align: left"
            href="<?=base_url('client/nap-gold');?>"
          >
            <i class="fa fa-dollar-sign"></i>
            Nạp Gold
          </a>
        </div>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item" data-menu="/">
          <a class="nav-link" href="<?=base_url('');?>">
            <span></span>
            Trang chủ
          </a>
        </li>
        <li class="nav-item" data-menu="#">
          <a class="nav-link" href="<?=base_url('client/thong-tin-thue-banner');?>">
            <span></span>
            Thuê banner
          </a>
        </li>
        <li class="nav-item" data-menu="#">
          <a class="nav-link" href="<?=base_url('client/contact');?>">
            <span></span>
            Liên hệ
          </a>
        </li>
      </ul>
      <div class="upload-adv-absolute">
        <div class="social btn-upload-adv">
          <a rel="nofollow" href="<?=base_url('client/dang-quang-cao-mu-online');?>">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Đăng MU Mới
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>

<!--giao diện laptop-->

<header class="header">
  <div class="header-area bg-main fixed-top">
    <div class="header-top">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <div class="container-fluid">
          <a class="navbar-brand img-logo" href="<?=base_url('');?>">
            <img
              src="<?=base_url('assets/Content/images/logo/header_logo.png');?>"
              title="Mu Mới Ra - Kênh tổng hợp MU lớn nhất Việt Nam | MuMoiRa.tv"
              alt="Mu Mới Ra - Kênh tổng hợp MU lớn nhất Việt Nam | MuMoiRa.tv"
            />
          </a>
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item" data-menu="/">
                <a class="nav-link" href="/">
                  <span></span>
                  MU mới ra
                </a>
                <ul class="sub" style="width: 200px">
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="<?=base_url('mu-alpha-test');?>"
                    >
                      Mu Alpha test hôm nay
                    </a>
                  </li>
                  <li class="">
                    <a href="<?=base_url('client/mu-open-beta');?>">Mu Open hôm nay</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item" data-menu="#">
                <a class="nav-link" href="#">
                  <span></span>
                  Mu theo phiên bản
                </a>
                <ul class="sub" style="width: 200px">
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="<?=base_url('client/mu-version/season-2/6');?>"
                    >
                      Season 2
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/client/mu-version/season-3/2"
                    >
                      Season 3
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/client/mu-version/season-6/3"
                    >
                      Season 6
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/client/mu-version/season-7/4"
                    >
                      Season 7
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/client/mu-version/season-16/19"
                    >
                      Season 16
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item" data-menu="#">
                <a class="nav-link" href="#">
                  <span></span>
                  Mu theo loại
                </a>
                <ul class="sub" style="width: 200px">
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/client/mu-reset/non-reset/1"
                    >
                      Non Reset
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/client/mu-reset/reset-web/2"
                    >
                      Reset Web
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/client/mu-reset/mu-reset-in-game/3"
                    >
                      Reset In Game
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/mu-type/mu-nguyen-ban-webzen/1"
                    >
                      Mu Nguyên bản Webzen
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/mu-type/mu-custom-them-do-moi/2"
                    >
                      Mu Custom thêm đồ mới
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/mu-point/mu-reset-point/1"
                    >
                      Nguyên bản
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/mu-point/keep-point/2"
                    >
                      Keep point
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item" data-menu="#">
                <a class="nav-link" href="<?=base_url('client/huong-dan-choi-mu-online');?>">
                  <span></span>
                  Hướng dẫn chơi game
                </a>
              </li>
              <li class="nav-item" data-menu="#">
                <a class="nav-link" href="#">
                  <span></span>
                  Quảng Cáo
                </a>
                <ul class="sub" style="width: 200px">
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/client/contact"
                    >
                      Liên hệ
                    </a>
                  </li>
                  <li class="">
                    <a
                      style="line-height: 15px; padding: 0 10px"
                      href="/client/thong-tin-thue-banner"
                    >
                      Thuê banner
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        <?php if (!empty($token)): ?>
          <div class="area-user d-none d-sm-flex align-items-center">
            <div class="dropdown">
              <a
                class="header-user dropdown-toggle me-3"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <div class="img-user-header d-inline">
                  <img
                    src="<?=base_url('assets/Content/images/icon/avataremty.png')?>"
                    onerror='this.onerror=null;this.src="<?=base_url('assets/Content/images/icon/avataremty.png')?>";'
                  />
                </div>
                <div class="name-user d-inline"><?=$getUser['username'];?></div>
              </a>
              <ul class="dropdown-menu arrow info-account">
                <li>
                  <a href="/thong-tin-tai-khoan.htm">
                    <div class="d-flex p-2">
                      <div class="img-user-header">
                        <img
                          style="width: 40px"
                          src="<?=base_url('assets/Content/images/icon/avataremty.png')?>"
                          onerror='this.onerror=null;this.src="<?=base_url('assets/Assest/images/commons/avataremty.pn')?>g";'
                          class="rounded-circle"
                          alt="..."
                        />
                      </div>
                      <div class="name-user">
                        <p class="name"><?=$getUser['username'];?></p>
                        <a href="<?=base_url('client/profile')?>" class="a_profile">Xem trang cá nhân</a>
                      </div>
                    </div>
                  </a>
                  <div class="hr-m0"></div>
                  <a
                    class="coin-center d-flex justify-content-center align-items-center"
                    href="<?=base_url('client/nap-gold')?>"
                  >
                    <i class="icon-coin"></i>
                    <span class="coin"><?=format_cash($getUser['money']);?> Gold</span>
                  </a>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <a href="<?=base_url('client/nap-gold')?>">
                    <i class="fas fa-dollar-sign fa-custom"></i>
                    <span>Nạp GOLD</span>
                  </a>
                </li>
                <li>
                  <a href="<?=base_url('client/quan-ly-tin-dang')?>">
                    <i class="fas fa-clipboard-list fa-custom"></i>
                    <span>Quản lý tin đăng</span>
                  </a>
                </li>
                <li>
                  <a href="<?=base_url('client/quan-ly-banner')?>">
                    <i class="fas fa-layer-group fa-custom"></i>
                    <span>Quản lý banner</span>
                  </a>
                </li>
                <li>
                  <a href="<?=base_url('client/dang-quang-cao-mu-online')?>">
                    <i class="icon-loa"></i>
                    <span>Đăng MU mới</span>
                  </a>
                </li>
                <li>
                  <a href="<?=base_url('client/logout')?>">
                    <i class="icon-log-out"></i>
                    <span>Đăng xuất</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="social btn-upload-adv">
                <a href="<?=base_url('client/dang-quang-cao-mu-online')?>" rel="nofollow">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Đăng MU Mới
                </a>
            </div>
          </div>
            <?php else: ?>
            <div class="social btn-upload-adv">
                <a href="<?=base_url('client/dang-quang-cao-mu-online')?>" rel="nofollow">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Đăng MU Mới
                </a>
            </div>
            <?php endif; ?>
          
          <div class="menu-bar d-block d-sm-block d-md-none">
            <button class="btn btn-success first" type="button">
              <i class="fa fa-bars"></i>
            </button>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>
