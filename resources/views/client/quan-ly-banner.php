<?php

$body = [
    'title' => 'Quản lý Banner - '.$DB->site('title'),
    'desc'   => $DB->site('description'),
    'keyword' => $DB->site('keywords')
];
$body['header'] = '';
$body['footer'] = '';
require_once(__DIR__.'/../../../models/is_user.php');
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/navbar.php');

$query = "SELECT *
          FROM banner_list b
          WHERE b.id IN (
              SELECT MIN(id)
              FROM banner_list
              GROUP BY position
          )";
$result = $DB->query($query);
$positions = $result->fetch_all(MYSQLI_ASSOC);

?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>
<section id="main">
  <section class="home-categories">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-8 mt-3 pb-3">
          <div class="card card-categories">
            <div class="card-header">Quản lý Banner</div>
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
                        <a href="/thong-tin-tai-khoan.htm"> nguyen minh duc </a>
                      </div>
                      <div class="link">
                        <a href="/thong-tin-tai-khoan.htm"
                          >Xem thông tin cá nhân</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex link-manager">
                  <div>
                    <button
                      type="button"
                      class="btn btn-sm btn-success text-nowrap"
                      data-bs-toggle="modal"
                      data-bs-target="#banner-modal"
                    >
                      <i class="fab fa-adversal"></i> Thuê Banner
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="main-product-list">
            <div class="product-wrap p-3 mt-3 mb-3 bg-white">
              <div class="d-flex justify-content-start tab-main">
                <a
                  class="ms-3 me-3 tab-item text-nowrap active"
                  href="/quan-ly-banner-1-0-1.htm"
                >
                  Banner trái (0)
                </a>
                <a
                  class="ms-3 me-3 tab-item text-nowrap"
                  href="/quan-ly-banner-1-1-1.htm"
                >
                  Banner phải (1)
                </a>
                <a
                  class="ms-3 me-3 tab-item text-nowrap"
                  href="/quan-ly-banner-1-2-1.htm"
                >
                  Banner to giữa (0)
                </a>
                <a
                  class="ms-3 me-3 tab-item text-nowrap"
                  href="/quan-ly-banner-1-3-1.htm"
                >
                  Banner nhỏ giữa (2)
                </a>
                <a
                  class="ms-3 me-3 tab-item text-nowrap"
                  href="/quan-ly-banner-1-4-0.htm"
                >
                  Đang bị khóa (0)
                </a>
              </div>
              <div
                class="alert alert-warning alert-dismissible fade show w-100"
                role="alert"
              >
                Không có dữ liệu banner
              </div>
              <nav class="mt-3">
                <section class="d-none">
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a
                        class="page-link"
                        href="/quan-ly-banner-1-0-1.htm"
                        tabindex="-1"
                      >
                        <i class="fa fa-angle-double-left"></i>
                      </a>
                    </li>
                    <li class="page-item">
                      <a
                        class="page-link"
                        href="/quan-ly-banner-1-0-1.htm"
                        tabindex="-1"
                      >
                        <i class="fa fa-angle-left"></i>
                      </a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="/quan-ly-banner-0-0-1.htm">
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="/quan-ly-banner-0-0-1.htm">
                        <i class="fa fa-angle-double-right"></i>
                      </a>
                    </li>
                  </ul>
                </section>
              </nav>
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
                                <a class="btn btn-category " href="/client/nap-gold">
                                    <span> <i class="fa fa-angle-right"></i>Nạp Gold vào tài khoản</span>
                                </a>
                                <a class="btn btn-category" href="/client/quan-ly-tin-dang">
                                    <span> <i class="fa fa-angle-right"></i>Quản lý tin đăng</span>
                                </a>
                                <a class="btn btn-category active" href="<?=base_url('client/quan-ly-banner');?>">
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


<!--modal thuê banner-->
<div
  class="modal fade"
  id="banner-modal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  style="display: none"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <form class="modal-content" id="form-banner" novalidate="novalidate">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thuê Banner</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <!--các vị trí thuê banner-->
      <div class="modal-body modal-banner">
        <div class="row">
          <div class="col-12 col-sm-6">
            <div class="mb-3 wrap-banner">
              <label class="lb-title"
                >Chọn vị trí <span class="text-red">(*)</span></label
              >
<!-- Chọn vị trí -->
<!-- Bắt đầu phần hiển thị cho vị trí "mh" và "mt" -->
<!-- Hiển thị cho vị trí "mh" và "mt" -->
<div class="main-position">
    <div class="d-flex justify-content-around">
        <?php foreach ($positions as $position): ?>
            <?php if ($position['position'] == 'mh' || $position['position'] == 'mt'): ?>
                <div class="position-item <?php echo $position['position'] == 'mh' ? 'active' : ''; ?>"
                    data-position="<?php echo $position['position']; ?>"
                    data-width="<?php echo $position['width']; ?>"
                    data-height="<?php echo $position['height']; ?>">
                    <?php echo $position['name']; ?> (<?php echo $position['width']; ?> x <?php echo $position['height']; ?>)
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<!-- Hiển thị cho vị trí "l" và "r" -->
<div class="main-position">
    <div class="d-flex justify-content-around">
        <?php foreach ($positions as $position): ?>
            <?php if ($position['position'] == 'l' || $position['position'] == 'r'): ?>
                <div class="position-item"
                    data-position="<?php echo $position['position']; ?>"
                    data-width="<?php echo $position['width']; ?>"
                    data-height="<?php echo $position['height']; ?>">
                    <?php echo $position['name']; ?> (<?php echo $position['width']; ?> x <?php echo $position['height']; ?>)
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>


              <!--hết chọn vị trí-->
            </div>
            
            <div class="clearfix"></div>
            <div class="mb-3 mt-3 wrap-banner wrap-push">
              <label class="lb-title"
                >Chọn thời gian <span class="text-red">(*)</span></label
              >
              <!--đổ dữ liệu tiền cho từng vị trí theo từng thời gian-->
              <div class="main-position position-loaded">
                <div class="d-flex justify-content-around">
                  <div class="push-item active" data-option="2">
                    <i class="far fa-bookmark"></i>
                    <p class="time">2 tuần</p>
                    <p class="coin">1,500 Gold</p>
                  </div>
                  <div class="push-item" data-option="3">
                    <i class="far fa-bookmark"></i>
                    <p class="time">1 Tháng</p>
                    <p class="coin">2,200 Gold</p>
                  </div>
                </div>
                <div class="d-flex justify-content-around">
                  <div class="push-item" data-option="4">
                    <i class="far fa-bookmark"></i>
                    <p class="time">2 Tháng</p>
                    <p class="coin">4,350 Gold</p>
                  </div>
                  <div class="push-item" data-option="5">
                    <i class="far fa-bookmark"></i>
                    <p class="time">3 Tháng</p>
                    <p class="coin">6,500 Gold</p>
                  </div>
                </div>
                <div class="d-flex justify-content-around">
                  <div class="push-item" data-option="8">
                    <i class="far fa-bookmark"></i>
                    <p class="time">6 Tháng</p>
                    <p class="coin">11,880 Gold</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <div class="mb-3 wrap-banner">
              <label class="lb-title">Thông tin Banner </label>
              <div class="main-info">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label"
                    >Tên Mu <span class="text-red">(*)</span>:</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="Title"
                    id="txt_Title"
                    autocomplete="off"
                  />
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label"
                    >Trang chủ <span class="text-red">(*)</span>:</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="HomeUrl"
                    id="txt_HomeUrl"
                    autocomplete="off"
                  />
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label"
                    >Chọn Banner <span class="text-red">(*)</span>:</label
                  >
                  <div class="file-upload-container custom-banner img-780-280">
                    <div class="col-12">
                      <div class="img-upload mb-3">
                        <a
                          href="/Content/images/icon/no_image_giua_to.jpg"
                          data-fancybox="gallery"
                          data-caption="#"
                          class="fancybox lightbox-preview"
                          rel="group"
                          id="a_Avatar"
                        >
                          <img
                            src="/Content/images/icon/no_image_giua_to.jpg"
                            alt="avatar"
                            class="default-image img-polaroid file-upload-preview"
                          />
                        </a>
                        <span class="btn file-upload-thumb-remove">X</span>
                      </div>
                    </div>
                    <div class="col-12">
                      <input
                        type="file"
                        class="skip file-upload-control file-image"
                        accept="image/*"
                      />
                      <input
                        type="hidden"
                        id="txt_Avatar"
                        class="full-file-url-full"
                      />
                      <br />
                      <span> Ảnh hỗ trợ: *.jpg, *.jpeg, *.gif, *.png </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div
              class="alert alert-warning alert-dismissible fade show w-100"
              role="alert"
            >
              (*) Lưu ý: Sau khi mua thành công! Dữ liệu sẽ hiển thị ngoài trang
              chủ chậm nhất 30 phút
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Đóng
        </button>
        <button type="submit" class="btn btn-success" id="btn-action">
          Thuê Banner
        </button>
      </div>
    </form>
  </div>
</div>


<!--modal 2 thuê banner-->

<div
  class="modal fade"
  id="extend-modal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <form class="modal-content" id="form-banner">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gia hạn Banner</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body modal-banner">
        <div class="row">
          <div class="col-12">
            <div class="mb-3 wrap-banner wrap-push">
              <div class="main-position position-extend-loaded">
                <div class="d-flex justify-content-evenly">
                  <div class="push-item active" data-option="1">
                    <i class="far fa-bookmark"></i>
                    <p class="time">1 tuần</p>
                    <p class="coin">Gold</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Đóng
        </button>
        <button type="button" class="btn btn-success" id="btn-action-extend">
          Gia hạn ngay
        </button>
      </div>
    </form>
  </div>
</div>


<!--modal 3 thuê banner-->

<div
  class="modal fade"
  id="banner-modal-edit"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <form class="modal-content" id="form-banner-edit" novalidate="novalidate">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa Banner</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body modal-banner">
        <div class="row">
          <div class="col-12">
            <div class="mb-3 wrap-banner">
              <div class="main-info">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label"
                    >Tên Mu <span class="text-red">(*)</span>:</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="Title"
                    id="txt_Title_Edit"
                    autocomplete="off"
                  />
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label"
                    >Trang chủ <span class="text-red">(*)</span>:</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="HomeUrl"
                    id="txt_HomeUrl_Edit"
                    autocomplete="off"
                  />
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label"
                    >Chọn Banner <span class="text-red">(*)</span>:</label
                  >
                  <div class="file-upload-container custom-banner img-780-280">
                    <div class="col-12">
                      <div class="img-upload mb-3">
                        <a
                          href="/Content/images/icon/no_image_giua_to.jpg"
                          data-fancybox="gallery"
                          data-caption="#"
                          class="fancybox lightbox-preview"
                          rel="group"
                          id="a_Avatar_Edit"
                        >
                          <img
                            src="/Content/images/icon/no_image_giua_to.jpg"
                            alt="avatar"
                            class="default-image img-polaroid file-upload-preview"
                          />
                        </a>
                        <span class="btn file-upload-thumb-remove">X</span>
                      </div>
                    </div>
                    <div class="col-12">
                      <input
                        type="file"
                        class="skip file-upload-control file-image"
                        accept="image/*"
                        data-is-edit="1"
                      />
                      <input
                        type="hidden"
                        id="txt_Avatar_Edit"
                        class="full-file-url-full"
                      />
                      <br />
                      <span> Ảnh hỗ trợ: *.jpg, *.jpeg, *.gif, *.png </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="name" id="txt_Id_Edit" />
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Đóng
        </button>
        <button type="submit" class="btn btn-success" id="btn-action-edit">
          Sửa Banner
        </button>
      </div>
    </form>
  </div>
</div>

<script>
$(document).ready(function() {
    $('.position-item').on('click', function() {
        $('.position-item').removeClass('active');
        $(this).addClass('active');
        
        // Update modal with new data
        var position = $(this).data('position');
        var width = $(this).data('width');
        var height = $(this).data('height');
        
        // Update the modal data here
        console.log('Position:', position);
        console.log('Width:', width);
        console.log('Height:', height);

        // Example: update an input field in the modal
        $('#txt_Title').val('Banner tại vị trí ' + position + ' (' + width + ' x ' + height + ')');
    });
    
    $('#btn-rent-banner').on('click', function() {
        // Reset to default position 1
        $('.position-item').removeClass('active');
        $('.position-item[data-position="1"]').addClass('active');
        
        // Update the modal data for position 1
        var position = 1;
        var width = 210;
        var height = 400;
        
        $('#txt_Title').val('Banner tại vị trí ' + position + ' (' + width + ' x ' + height + ')');
    });
});
</script>

</body>




    <?php
require_once(__DIR__.'/footer.php');
?>