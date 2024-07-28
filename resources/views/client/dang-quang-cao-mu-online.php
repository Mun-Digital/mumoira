<?php

$body = [
    'title' => 'Trang cá nhân - '.$DB->site('title'),
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
  <div class="container">
    <div class="card p-3">
      <div class="alert alert-info" role="alert">
        Vui lòng điền đầy đủ thông tin bên dưới để đăng bài giới thiệu server Mu
        mới của bạn.
        <br />
        Bài của bạn sẽ được kiểm duyệt trong vòng 24h.
      </div>
      <form
        class="form-mu"
        id="form-mu"
        method="post"
        action="/dang-quang-cao-mu-online.htm"
        novalidate="novalidate"
      >
        <div class="row mb-3">
          <div class="note">
            Ghi chú: <span class="text-red">(*)</span> nghĩa là nội dung bắt
            buộc phải điền.
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Tên MU <span>(*)</span>:</label>
          </div>
          <div class="col-12 col-sm-10">
            <input
              type="text"
              class="form-control"
              name="Title"
              placeholder="Tên mu mới (vd: Mu Vệ Binh)"
              alt="Tên mu mới (vd: Mu Vệ Binh)"
              title="Tên mu mới (vd: Mu Vệ Binh)"
              autocomplete="off"
              maxlength="20"
            />
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Hình ảnh <span>(*)</span>:</label>
          </div>
          <div class="col-12 col-sm-10">
            <div class="row file-upload-container">
              <div class="col-12">
                <div class="img-upload mb-3">
                  <a
                    href="/Content/images/icon/no_image_full.jpg"
                    data-fancybox="gallery"
                    data-caption=""
                    class="fancybox lightbox-preview"
                    rel="group"
                    id="a_Avatar"
                  >
                    <img
                      src="/Content/images/icon/no_image_full.jpg"
                      alt="avatar"
                      class="default-image img-polaroid file-upload-preview"
                    />
                  </a>
                  <span class="btn file-upload-thumb-remove">X</span>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <input
                  type="file"
                  class="skip file-upload-control"
                  id="file-image"
                  data-max-size="32154"
                  accept="image/*"
                />
                <br />
                <span>
                  Ảnh hỗ trợ: *.jpg, *.jpeg, *.gif, *.png.<br />
                  Kích thước: 780x110
                </span>
              </div>
              <div class="col-12 col-sm-8">
                <div class="url-img w-100">
                  <div class="input-group custom">
                    <div class="group-url">
                      <input
                        name="Avatar"
                        value="https://i.imgur.com/OzNoPQY.jpg"
                        type="text"
                        class="form-control full-file-url-full w-100"
                        placeholder="Hoặc nhập URL image"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title=""
                        readonly="true"
                        data-bs-original-title="Nhấp đôi chuột để bắt đầu chỉnh sửa"
                        aria-label="Nhấp đôi chuột để bắt đầu chỉnh sửa"
                      />
                    </div>
                    <span
                      class="input-group-text bg-blue cursor-pointer file-upload-url-remove"
                      id="basic-addon2"
                      >X</span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Trang chủ <span>(*)</span>:</label>
          </div>
          <div class="col-12 col-sm-10">
            <input
              type="text"
              name="HomeUrl"
              class="form-control"
              placeholder="Trang chủ game mu của bạn (vd: http://muonline.com)"
              alt="Trang chủ game mu của bạn (vd: http://muonline.com)"
              title="Trang chủ game mu của bạn"
              autocomplete="off"
              maxlength="100"
            />
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Fanpage Hỗ Trợ:</label>
          </div>
          <div class="col-12 col-sm-10">
            <input
              type="text"
              name="FanpageUrl"
              class="form-control"
              placeholder="Trang fanpage của mu (vd: https://www.facebook.com/MuMoiRa.tv)"
              maxlength="100"
            />
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label"
              >Thông tin kỹ thuật <span>(*)</span>:</label
            >
          </div>
          <div class="col-12 col-sm-10 d-block d-sm-flex">
            <div class="me-3 mb-3">
              <select class="form-select" name="MuVersionId">
                <option value="default">Chọn phiên bản</option>
                <option value="6">Season 2</option>
                <option value="2">Season 3</option>
                <option value="3">Season 6</option>
                <option value="4">Season 7</option>
                <option value="19">Season 16</option>
              </select>
            </div>
            <div class="me-3 mb-3">
              <select class="form-select" name="MuResetTypeId">
                <option value="default">Chọn kiểu reset</option>
                <option value="1">Non Reset</option>
                <option value="2">Reset Web</option>
                <option value="3">Reset In Game</option>
              </select>
            </div>
            <div class="me-3 mb-3">
              <select class="form-select" name="MuTypeId">
                <option value="default">Chọn thể loại</option>
                <option value="1">Mu Nguyên bản Webzen</option>
                <option value="2">Mu Custom thêm đồ mới</option>
              </select>
            </div>
            <div class="me-3 mb-3">
              <select class="form-select" name="MuPointId">
                <option value="default">Chọn kiểu point</option>
                <option value="1">Nguyên bản</option>
                <option value="2">Keep point</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Tên Máy Chủ <span>(*)</span>:</label>
          </div>
          <div class="col-12 col-sm-10">
            <input
              type="text"
              name="NameServer"
              class="form-control"
              placeholder="Tên máy chủ Mu (Vd: máy chủ Lorencia)"
              maxlength="30"
            />
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Miêu Tả Mu <span>(*)</span>: </label>
          </div>
          <div class="col-12 col-sm-10">
            <input
              type="text"
              name="Description"
              class="form-control"
              placeholder="Miêu tả ngắn gọn (vd: Miễn phí 99%, không webshop, cày cuốc)"
              title="Miêu tả ngắn gọn (vd: Miễn phí 99%, không webshop, cày cuốc)"
              autocomplete="off"
              maxlength="35"
            />
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Alpha Test <span>(*)</span>:</label>
          </div>
          <div class="col-12 col-sm-10">
            <div class="col-12">
              <div class="d-flex">
                <div>
                  <select
                    class="form-select"
                    style="width: 100px; margin-right: 15px"
                    name="AlphaTestTime"
                  >
                    <option value="default">Giờ</option>
                    <option value="8">8h</option>
                    <option value="9">9h</option>
                    <option value="10">10h</option>
                    <option value="11">11h</option>
                    <option value="12">12h</option>
                    <option value="13">13h</option>
                    <option value="14">14h</option>
                    <option value="15">15h</option>
                    <option value="16">16h</option>
                    <option value="17">17h</option>
                    <option value="18">18h</option>
                    <option value="19">19h</option>
                    <option value="20">20h</option>
                    <option value="21">21h</option>
                    <option value="22">22h</option>
                    <option value="23">23h</option>
                    <option value="24">24h</option>
                  </select>
                </div>
                <div>
                  <input
                    type="text"
                    name="AlphaTestDateStr"
                    class="form-control datetimepicker"
                    placeholder="Ngày/Tháng/Năm"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Open Beta <span>(*)</span>:</label>
          </div>
          <div class="col-12 col-sm-10">
            <div class="col-12">
              <div class="d-flex">
                <div>
                  <select
                    class="form-select"
                    style="width: 100px; margin-right: 15px"
                    name="OpenBetaTime"
                  >
                    <option value="default">Giờ</option>
                    <option value="8">8h</option>
                    <option value="9">9h</option>
                    <option value="10">10h</option>
                    <option value="11">11h</option>
                    <option value="12">12h</option>
                    <option value="13">13h</option>
                    <option value="14">14h</option>
                    <option value="15">15h</option>
                    <option value="16">16h</option>
                    <option value="17">17h</option>
                    <option value="18">18h</option>
                    <option value="19">19h</option>
                    <option value="20">20h</option>
                    <option value="21">21h</option>
                    <option value="22">22h</option>
                    <option value="23">23h</option>
                    <option value="24">24h</option>
                  </select>
                </div>
                <div>
                  <input
                    type="text"
                    name="OpenBetaDateStr"
                    class="form-control datetimepicker"
                    placeholder="Ngày/Tháng/Năm"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Exp <span>(*)</span>:</label>
          </div>
          <div class="col-12 col-sm-10">
            <div class="col-12">
              <div class="d-block d-sm-flex align-items-center exp">
                <div>
                  <input
                    type="number"
                    name="MuExp"
                    class="form-control"
                    placeholder="Exp rate"
                  />
                </div>
                <div class="unit">x</div>
                <div>(vd: 1x, 5x, 100x, 500x, 9999x)</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Drop <span>(*)</span>:</label>
          </div>
          <div class="col-12 col-sm-10">
            <div class="col-12">
              <div class="d-block d-sm-flex align-items-center exp">
                <div>
                  <input
                    type="number"
                    name="MuDrop"
                    class="form-control"
                    placeholder="Drop rate"
                  />
                </div>
                <div class="unit">%</div>
                <div>(vd: 10%, 40%, 50%, 80%)</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Anti Hack:</label>
          </div>
          <div class="col-12 col-sm-10">
            <input
              type="text"
              name="AntiHack"
              class="form-control"
              placeholder="Antihack mà game sử dụng (vd: GoldShield)"
              maxlength="30"
            />
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12">
            <label class="col-form-label"
              >Miêu tả chi tiết game Mu Online của bạn <span>(*)</span>: bài
              viết càng chi tiết sẽ càng thu hút nhiều người xem</label
            >
          </div>
          <div class="col-12">
            <textarea
              class="form-control tinyeditor"
              id="textarea_Content"
              name="Content"
              style="display: none"
              aria-hidden="true"
            ></textarea>
            <div
              role="application"
              class="tox tox-tinymce tox-platform-touch"
              aria-disabled="false"
              style="visibility: hidden; width: 100%; height: 300px"
              data-mce-style="visibility: hidden; width: 100%; height: 300px;"
            >
              <div class="tox-editor-container">
                <div
                  data-alloy-vertical-dir="toptobottom"
                  class="tox-editor-header"
                >
                  <div class="tox-toolbar-overlord">
                    <div
                      role="group"
                      class="tox-toolbar tox-toolbar--scrolling"
                      aria-disabled="false"
                    >
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <button
                          aria-label="Undo"
                          title="Undo"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn tox-tbtn--disabled"
                          aria-disabled="true"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M6.4 8H12c3.7 0 6.2 2 6.8 5.1.6 2.7-.4 5.6-2.3 6.8a1 1 0 01-1-1.8c1.1-.6 1.8-2.7 1.4-4.6-.5-2.1-2.1-3.5-4.9-3.5H6.4l3.3 3.3a1 1 0 11-1.4 1.4l-5-5a1 1 0 010-1.4l5-5a1 1 0 011.4 1.4L6.4 8z"
                                fill-rule="nonzero"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Redo"
                          title="Redo"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn tox-tbtn--disabled"
                          aria-disabled="true"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M17.6 10H12c-2.8 0-4.4 1.4-4.9 3.5-.4 2 .3 4 1.4 4.6a1 1 0 11-1 1.8c-2-1.2-2.9-4.1-2.3-6.8.6-3 3-5.1 6.8-5.1h5.6l-3.3-3.3a1 1 0 111.4-1.4l5 5a1 1 0 010 1.4l-5 5a1 1 0 01-1.4-1.4l3.3-3.3z"
                                fill-rule="nonzero"
                              ></path></svg
                          ></span>
                        </button>
                      </div>
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <div
                          aria-pressed="false"
                          aria-label="Bullet list"
                          title="Bullet list"
                          role="button"
                          aria-haspopup="true"
                          unselectable="on"
                          tabindex="-1"
                          class="tox-split-button"
                          aria-disabled="false"
                          aria-expanded="false"
                          aria-describedby="aria_6755379591911719315458013"
                          style="user-select: none"
                        >
                          <span
                            role="presentation"
                            tabindex="-1"
                            class="tox-tbtn"
                            aria-disabled="false"
                            ><span class="tox-icon tox-tbtn__icon-wrap"
                              ><svg width="24" height="24" focusable="false">
                                <path
                                  d="M11 5h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0 6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0 6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zM4.5 6c0-.4.1-.8.4-1 .3-.4.7-.5 1.1-.5.4 0 .8.1 1 .4.4.3.5.7.5 1.1 0 .4-.1.8-.4 1-.3.4-.7.5-1.1.5-.4 0-.8-.1-1-.4-.4-.3-.5-.7-.5-1.1zm0 6c0-.4.1-.8.4-1 .3-.4.7-.5 1.1-.5.4 0 .8.1 1 .4.4.3.5.7.5 1.1 0 .4-.1.8-.4 1-.3.4-.7.5-1.1.5-.4 0-.8-.1-1-.4-.4-.3-.5-.7-.5-1.1zm0 6c0-.4.1-.8.4-1 .3-.4.7-.5 1.1-.5.4 0 .8.1 1 .4.4.3.5.7.5 1.1 0 .4-.1.8-.4 1-.3.4-.7.5-1.1.5-.4 0-.8-.1-1-.4-.4-.3-.5-.7-.5-1.1z"
                                  fill-rule="evenodd"
                                ></path></svg></span></span
                          ><span
                            role="presentation"
                            tabindex="-1"
                            class="tox-tbtn tox-split-button__chevron"
                            aria-disabled="false"
                            ><svg width="10" height="10" focusable="false">
                              <path
                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                fill-rule="nonzero"
                              ></path></svg></span
                          ><span
                            aria-hidden="true"
                            id="aria_6755379591911719315458013"
                            style="display: none"
                            >To open the popup, press Shift+Enter</span
                          >
                        </div>
                        <div
                          aria-pressed="false"
                          aria-label="Numbered list"
                          title="Numbered list"
                          role="button"
                          aria-haspopup="true"
                          unselectable="on"
                          tabindex="-1"
                          class="tox-split-button"
                          aria-disabled="false"
                          aria-expanded="false"
                          aria-describedby="aria_9852921591931719315458013"
                          style="user-select: none"
                        >
                          <span
                            role="presentation"
                            tabindex="-1"
                            class="tox-tbtn"
                            aria-disabled="false"
                            ><span class="tox-icon tox-tbtn__icon-wrap"
                              ><svg width="24" height="24" focusable="false">
                                <path
                                  d="M10 17h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0-6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0-6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 110-2zM6 4v3.5c0 .3-.2.5-.5.5a.5.5 0 01-.5-.5V5h-.5a.5.5 0 010-1H6zm-1 8.8l.2.2h1.3c.3 0 .5.2.5.5s-.2.5-.5.5H4.9a1 1 0 01-.9-1V13c0-.4.3-.8.6-1l1.2-.4.2-.3a.2.2 0 00-.2-.2H4.5a.5.5 0 01-.5-.5c0-.3.2-.5.5-.5h1.6c.5 0 .9.4.9 1v.1c0 .4-.3.8-.6 1l-1.2.4-.2.3zM7 17v2c0 .6-.4 1-1 1H4.5a.5.5 0 010-1h1.2c.2 0 .3-.1.3-.3 0-.2-.1-.3-.3-.3H4.4a.4.4 0 110-.8h1.3c.2 0 .3-.1.3-.3 0-.2-.1-.3-.3-.3H4.5a.5.5 0 110-1H6c.6 0 1 .4 1 1z"
                                  fill-rule="evenodd"
                                ></path></svg></span></span
                          ><span
                            role="presentation"
                            tabindex="-1"
                            class="tox-tbtn tox-split-button__chevron"
                            aria-disabled="false"
                            ><svg width="10" height="10" focusable="false">
                              <path
                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                fill-rule="nonzero"
                              ></path></svg></span
                          ><span
                            aria-hidden="true"
                            id="aria_9852921591931719315458013"
                            style="display: none"
                            >To open the popup, press Shift+Enter</span
                          >
                        </div>
                      </div>
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <button
                          title="Formats"
                          aria-label="Formats"
                          aria-haspopup="true"
                          type="button"
                          unselectable="on"
                          tabindex="-1"
                          class="tox-tbtn tox-tbtn--select tox-tbtn--bespoke"
                          aria-expanded="false"
                          style="user-select: none"
                        >
                          <span class="tox-tbtn__select-label">Paragraph</span>
                          <div class="tox-tbtn__select-chevron">
                            <svg width="10" height="10" focusable="false">
                              <path
                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                fill-rule="nonzero"
                              ></path>
                            </svg>
                          </div>
                        </button>
                      </div>
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <button
                          title="Fonts"
                          aria-label="Fonts"
                          aria-haspopup="true"
                          type="button"
                          unselectable="on"
                          tabindex="-1"
                          class="tox-tbtn tox-tbtn--select tox-tbtn--bespoke"
                          aria-expanded="false"
                          style="user-select: none"
                        >
                          <span class="tox-tbtn__select-label"
                            >System Font</span
                          >
                          <div class="tox-tbtn__select-chevron">
                            <svg width="10" height="10" focusable="false">
                              <path
                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                fill-rule="nonzero"
                              ></path>
                            </svg>
                          </div></button
                        ><button
                          title="Font sizes"
                          aria-label="Font sizes"
                          aria-haspopup="true"
                          type="button"
                          unselectable="on"
                          tabindex="-1"
                          class="tox-tbtn tox-tbtn--select tox-tbtn--bespoke"
                          aria-expanded="false"
                          style="user-select: none"
                        >
                          <span class="tox-tbtn__select-label">12pt</span>
                          <div class="tox-tbtn__select-chevron">
                            <svg width="10" height="10" focusable="false">
                              <path
                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                fill-rule="nonzero"
                              ></path>
                            </svg>
                          </div></button
                        ><button
                          aria-label="Bold"
                          title="Bold"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M7.8 19c-.3 0-.5 0-.6-.2l-.2-.5V5.7c0-.2 0-.4.2-.5l.6-.2h5c1.5 0 2.7.3 3.5 1 .7.6 1.1 1.4 1.1 2.5a3 3 0 01-.6 1.9c-.4.6-1 1-1.6 1.2.4.1.9.3 1.3.6s.8.7 1 1.2c.4.4.5 1 .5 1.6 0 1.3-.4 2.3-1.3 3-.8.7-2.1 1-3.8 1H7.8zm5-8.3c.6 0 1.2-.1 1.6-.5.4-.3.6-.7.6-1.3 0-1.1-.8-1.7-2.3-1.7H9.3v3.5h3.4zm.5 6c.7 0 1.3-.1 1.7-.4.4-.4.6-.9.6-1.5s-.2-1-.7-1.4c-.4-.3-1-.4-2-.4H9.4v3.8h4z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Underline"
                          title="Underline"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M16 5c.6 0 1 .4 1 1v5.5a4 4 0 01-.4 1.8l-1 1.4a5.3 5.3 0 01-5.5 1 5 5 0 01-1.6-1c-.5-.4-.8-.9-1.1-1.4a4 4 0 01-.4-1.8V6c0-.6.4-1 1-1s1 .4 1 1v5.5c0 .3 0 .6.2 1l.6.7a3.3 3.3 0 002.2.8 3.4 3.4 0 002.2-.8c.3-.2.4-.5.6-.8l.2-.9V6c0-.6.4-1 1-1zM8 17h8c.6 0 1 .4 1 1s-.4 1-1 1H8a1 1 0 010-2z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Italic"
                          title="Italic"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M16.7 4.7l-.1.9h-.3c-.6 0-1 0-1.4.3-.3.3-.4.6-.5 1.1l-2.1 9.8v.6c0 .5.4.8 1.4.8h.2l-.2.8H8l.2-.8h.2c1.1 0 1.8-.5 2-1.5l2-9.8.1-.5c0-.6-.4-.8-1.4-.8h-.3l.2-.9h5.8z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Strikethrough"
                          title="Strikethrough"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <g fill-rule="evenodd">
                                <path
                                  d="M15.6 8.5c-.5-.7-1-1.1-1.3-1.3-.6-.4-1.3-.6-2-.6-2.7 0-2.8 1.7-2.8 2.1 0 1.6 1.8 2 3.2 2.3 4.4.9 4.6 2.8 4.6 3.9 0 1.4-.7 4.1-5 4.1A6.2 6.2 0 017 16.4l1.5-1.1c.4.6 1.6 2 3.7 2 1.6 0 2.5-.4 3-1.2.4-.8.3-2-.8-2.6-.7-.4-1.6-.7-2.9-1-1-.2-3.9-.8-3.9-3.6C7.6 6 10.3 5 12.4 5c2.9 0 4.2 1.6 4.7 2.4l-1.5 1.1z"
                                ></path>
                                <path
                                  d="M5 11h14a1 1 0 010 2H5a1 1 0 010-2z"
                                  fill-rule="nonzero"
                                ></path>
                              </g></svg
                          ></span>
                        </button>
                      </div>
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <button
                          aria-label="Horizontal line"
                          title="Horizontal line"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M4 11h16v2H4z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Align left"
                          title="Align left"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 4h8c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 8h8c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2zm0-4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Align center"
                          title="Align center"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm3 4h8c.6 0 1 .4 1 1s-.4 1-1 1H8a1 1 0 110-2zm0 8h8c.6 0 1 .4 1 1s-.4 1-1 1H8a1 1 0 010-2zm-3-4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Align right"
                          title="Align right"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm6 4h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0 8h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm-6-4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Justify"
                          title="Justify"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2zm0 4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span>
                        </button>
                      </div>
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <button
                          aria-label="Insert/edit link"
                          title="Insert/edit link"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M6.2 12.3a1 1 0 011.4 1.4l-2.1 2a2 2 0 102.7 2.8l4.8-4.8a1 1 0 000-1.4 1 1 0 111.4-1.3 2.9 2.9 0 010 4L9.6 20a3.9 3.9 0 01-5.5-5.5l2-2zm11.6-.6a1 1 0 01-1.4-1.4l2-2a2 2 0 10-2.6-2.8L11 10.3a1 1 0 000 1.4A1 1 0 119.6 13a2.9 2.9 0 010-4L14.4 4a3.9 3.9 0 015.5 5.5l-2 2z"
                                fill-rule="nonzero"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Insert/edit image"
                          title="Insert/edit image"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M5 15.7l3.3-3.2c.3-.3.7-.3 1 0L12 15l4.1-4c.3-.4.8-.4 1 0l2 1.9V5H5v10.7zM5 18V19h3l2.8-2.9-2-2L5 17.9zm14-3l-2.5-2.4-6.4 6.5H19v-4zM4 3h16c.6 0 1 .4 1 1v16c0 .6-.4 1-1 1H4a1 1 0 01-1-1V4c0-.6.4-1 1-1zm6 8a2 2 0 100-4 2 2 0 000 4z"
                                fill-rule="nonzero"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Upload image"
                          title="Upload image"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M18 19v-2a1 1 0 012 0v3c0 .6-.4 1-1 1H5a1 1 0 01-1-1v-3a1 1 0 012 0v2h12zM11 6.4L8.7 8.7a1 1 0 01-1.4-1.4l4-4a1 1 0 011.4 0l4 4a1 1 0 11-1.4 1.4L13 6.4V16a1 1 0 01-2 0V6.4z"
                                fill-rule="nonzero"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Insert/edit media"
                          title="Insert/edit media"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                          aria-pressed="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M4 3h16c.6 0 1 .4 1 1v16c0 .6-.4 1-1 1H4a1 1 0 01-1-1V4c0-.6.4-1 1-1zm1 2v14h14V5H5zm4.8 2.6l5.6 4a.5.5 0 010 .8l-5.6 4A.5.5 0 019 16V8a.5.5 0 01.8-.4z"
                                fill-rule="nonzero"
                              ></path></svg
                          ></span>
                        </button>
                      </div>
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <button
                          aria-label="Paste as text"
                          title="Paste as text"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn tox-tbtn--enabled"
                          aria-disabled="false"
                          aria-pressed="true"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M18 9V5h-2v1c0 .6-.4 1-1 1H9a1 1 0 01-1-1V5H6v13h3V9h9zM9 20H6a2 2 0 01-2-2V5c0-1.1.9-2 2-2h3.2A3 3 0 0112 1a3 3 0 012.8 2H18a2 2 0 012 2v4h1v12H9v-1zm1.5-9.5v9h9v-9h-9zM12 3a1 1 0 00-1 1c0 .5.4 1 1 1s1-.5 1-1-.4-1-1-1zm0 9h6v2h-.5l-.5-1h-1v4h.8v1h-3.6v-1h.8v-4h-1l-.5 1H12v-2z"
                                fill-rule="nonzero"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Clear formatting"
                          title="Clear formatting"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M13.2 6a1 1 0 010 .2l-2.6 10a1 1 0 01-1 .8h-.2a.8.8 0 01-.8-1l2.6-10H8a1 1 0 110-2h9a1 1 0 010 2h-3.8zM5 18h7a1 1 0 010 2H5a1 1 0 010-2zm13 1.5L16.5 18 15 19.5a.7.7 0 01-1-1l1.5-1.5-1.5-1.5a.7.7 0 011-1l1.5 1.5 1.5-1.5a.7.7 0 011 1L17.5 17l1.5 1.5a.7.7 0 01-1 1z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span>
                        </button>
                      </div>
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <button
                          aria-label="Increase indent"
                          title="Increase indent"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M7 5h12c.6 0 1 .4 1 1s-.4 1-1 1H7a1 1 0 110-2zm5 4h7c.6 0 1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm0 4h7c.6 0 1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm-5 4h12a1 1 0 010 2H7a1 1 0 010-2zm-2.6-3.8L6.2 12l-1.8-1.2a1 1 0 011.2-1.6l3 2a1 1 0 010 1.6l-3 2a1 1 0 11-1.2-1.6z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span></button
                        ><button
                          aria-label="Decrease indent"
                          title="Decrease indent"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn tox-tbtn--disabled"
                          aria-disabled="true"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M7 5h12c.6 0 1 .4 1 1s-.4 1-1 1H7a1 1 0 110-2zm5 4h7c.6 0 1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm0 4h7c.6 0 1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm-5 4h12a1 1 0 010 2H7a1 1 0 010-2zm1.6-3.8a1 1 0 01-1.2 1.6l-3-2a1 1 0 010-1.6l3-2a1 1 0 011.2 1.6L6.8 12l1.8 1.2z"
                                fill-rule="evenodd"
                              ></path></svg
                          ></span>
                        </button>
                      </div>
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <div
                          aria-pressed="false"
                          aria-label="Text color"
                          title="Text color"
                          role="button"
                          aria-haspopup="true"
                          unselectable="on"
                          tabindex="-1"
                          class="tox-split-button"
                          aria-disabled="false"
                          aria-expanded="false"
                          aria-describedby="aria_8402750151951719315458021"
                          style="user-select: none"
                        >
                          <span
                            role="presentation"
                            tabindex="-1"
                            class="tox-tbtn"
                            aria-disabled="false"
                            ><span class="tox-icon tox-tbtn__icon-wrap"
                              ><svg width="24" height="24" focusable="false">
                                <g fill-rule="evenodd">
                                  <path
                                    id="tox-icon-text-color__color"
                                    d="M3 18h18v3H3z"
                                  ></path>
                                  <path
                                    d="M8.7 16h-.8a.5.5 0 01-.5-.6l2.7-9c.1-.3.3-.4.5-.4h2.8c.2 0 .4.1.5.4l2.7 9a.5.5 0 01-.5.6h-.8a.5.5 0 01-.4-.4l-.7-2.2c0-.3-.3-.4-.5-.4h-3.4c-.2 0-.4.1-.5.4l-.7 2.2c0 .3-.2.4-.4.4zm2.6-7.6l-.6 2a.5.5 0 00.5.6h1.6a.5.5 0 00.5-.6l-.6-2c0-.3-.3-.4-.5-.4h-.4c-.2 0-.4.1-.5.4z"
                                  ></path>
                                </g></svg></span></span
                          ><span
                            role="presentation"
                            tabindex="-1"
                            class="tox-tbtn tox-split-button__chevron"
                            aria-disabled="false"
                            ><svg width="10" height="10" focusable="false">
                              <path
                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                fill-rule="nonzero"
                              ></path></svg></span
                          ><span
                            aria-hidden="true"
                            id="aria_8402750151951719315458021"
                            style="display: none"
                            >To open the popup, press Shift+Enter</span
                          >
                        </div>
                        <div
                          aria-pressed="false"
                          aria-label="Background color"
                          title="Background color"
                          role="button"
                          aria-haspopup="true"
                          unselectable="on"
                          tabindex="-1"
                          class="tox-split-button"
                          aria-disabled="false"
                          aria-expanded="false"
                          aria-describedby="aria_7721473301971719315458022"
                          style="user-select: none"
                        >
                          <span
                            role="presentation"
                            tabindex="-1"
                            class="tox-tbtn"
                            aria-disabled="false"
                            ><span class="tox-icon tox-tbtn__icon-wrap"
                              ><svg width="24" height="24" focusable="false">
                                <g fill-rule="evenodd">
                                  <path
                                    id="tox-icon-highlight-bg-color__color"
                                    d="M3 18h18v3H3z"
                                  ></path>
                                  <path
                                    fill-rule="nonzero"
                                    d="M7.7 16.7H3l3.3-3.3-.7-.8L10.2 8l4 4.1-4 4.2c-.2.2-.6.2-.8 0l-.6-.7-1.1 1.1zm5-7.5L11 7.4l3-2.9a2 2 0 012.6 0L18 6c.7.7.7 2 0 2.7l-2.9 2.9-1.8-1.8-.5-.6"
                                  ></path>
                                </g></svg></span></span
                          ><span
                            role="presentation"
                            tabindex="-1"
                            class="tox-tbtn tox-split-button__chevron"
                            aria-disabled="false"
                            ><svg width="10" height="10" focusable="false">
                              <path
                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                fill-rule="nonzero"
                              ></path></svg></span
                          ><span
                            aria-hidden="true"
                            id="aria_7721473301971719315458022"
                            style="display: none"
                            >To open the popup, press Shift+Enter</span
                          >
                        </div>
                        <button
                          aria-label="Emoticons"
                          title="Emoticons"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M9 11c.6 0 1-.4 1-1s-.4-1-1-1a1 1 0 00-1 1c0 .6.4 1 1 1zm6 0c.6 0 1-.4 1-1s-.4-1-1-1a1 1 0 00-1 1c0 .6.4 1 1 1zm-3 5.5c2.1 0 4-1.5 4.4-3.5H7.6c.5 2 2.3 3.5 4.4 3.5zM12 4a8 8 0 100 16 8 8 0 000-16zm0 14.5a6.5 6.5 0 110-13 6.5 6.5 0 010 13z"
                                fill-rule="nonzero"
                              ></path></svg
                          ></span>
                        </button>
                      </div>
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <button
                          title="Table"
                          aria-label="Table"
                          aria-haspopup="true"
                          type="button"
                          data-alloy-tabstop="true"
                          unselectable="on"
                          tabindex="-1"
                          class="tox-tbtn tox-tbtn--select"
                          aria-expanded="false"
                          style="user-select: none"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                fill-rule="nonzero"
                                d="M19 4a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6c0-1.1.9-2 2-2h14zM5 14v4h6v-4H5zm14 0h-6v4h6v-4zm0-6h-6v4h6V8zM5 12h6V8H5v4z"
                              ></path></svg
                          ></span>
                          <div class="tox-tbtn__select-chevron">
                            <svg width="10" height="10" focusable="false">
                              <path
                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                fill-rule="nonzero"
                              ></path>
                            </svg>
                          </div>
                        </button>
                      </div>
                      <div
                        title=""
                        role="toolbar"
                        data-alloy-tabstop="true"
                        tabindex="-1"
                        class="tox-toolbar__group"
                      >
                        <button
                          aria-label="Preview"
                          title="Preview"
                          type="button"
                          tabindex="-1"
                          class="tox-tbtn"
                          aria-disabled="false"
                        >
                          <span class="tox-icon tox-tbtn__icon-wrap"
                            ><svg width="24" height="24" focusable="false">
                              <path
                                d="M3.5 12.5c.5.8 1.1 1.6 1.8 2.3 2 2 4.2 3.2 6.7 3.2s4.7-1.2 6.7-3.2a16.2 16.2 0 002.1-2.8 15.7 15.7 0 00-2.1-2.8c-2-2-4.2-3.2-6.7-3.2a9.3 9.3 0 00-6.7 3.2A16.2 16.2 0 003.2 12c0 .2.2.3.3.5zm-2.4-1l.7-1.2L4 7.8C6.2 5.4 8.9 4 12 4c3 0 5.8 1.4 8.1 3.8a18.2 18.2 0 012.8 3.7v1l-.7 1.2-2.1 2.5c-2.3 2.4-5 3.8-8.1 3.8-3 0-5.8-1.4-8.1-3.8a18.2 18.2 0 01-2.8-3.7 1 1 0 010-1zm12-3.3a2 2 0 102.7 2.6 4 4 0 11-2.6-2.6z"
                                fill-rule="nonzero"
                              ></path></svg
                          ></span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="tox-anchorbar"></div>
                </div>
                <div class="tox-sidebar-wrap">
                  <div class="tox-edit-area">
                    <iframe
                      id="textarea_Content_ifr"
                      frameborder="0"
                      allowtransparency="true"
                      title="Rich Text Area. Press ALT-0 for help."
                      class="tox-edit-area__iframe"
                    ></iframe>
                  </div>
                  <div role="complementary" class="tox-sidebar">
                    <div
                      data-alloy-tabstop="true"
                      tabindex="-1"
                      class="tox-sidebar__slider tox-sidebar--sliding-closed"
                      style="width: 0px"
                    >
                      <div class="tox-sidebar__pane-container"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tox-statusbar">
                <div class="tox-statusbar__text-container">
                  <div
                    role="navigation"
                    data-alloy-tabstop="true"
                    class="tox-statusbar__path"
                    aria-disabled="false"
                  >
                    <div
                      role="button"
                      data-index="0"
                      tab-index="-1"
                      aria-level="1"
                      tabindex="-1"
                      class="tox-statusbar__path-item"
                      aria-disabled="false"
                    >
                      p
                    </div>
                  </div>
                  <button
                    type="button"
                    data-alloy-tabstop="true"
                    tabindex="-1"
                    class="tox-statusbar__wordcount"
                  >
                    0 words</button
                  ><span class="tox-statusbar__branding"
                    ><a
                      href="https://www.facebook.com/MuMoiRa.tv"
                      rel="nofollow noopener noreferrer"
                      target="_blank"
                      tabindex="-1"
                      aria-label="Powered by MUMoiRa.tv"
                      >Powered by MUMoiRa.tv</a
                    ></span
                  >
                </div>
              </div>
              <div
                aria-hidden="true"
                class="tox-throbber"
                style="display: none"
              ></div>
            </div>
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 col-sm-2">
            <label class="col-form-label">Xác nhận CAPCHA:</label>
          </div>
          <div class="col-12 col-sm-10">
            <div
              class="g-recaptcha"
              data-sitekey="6LdtRp4cAAAAAK4Cki7r6GWeZyDaKrWdCOpRjKB3"
              data-callback="recaptchaValidated"
            >
              <div style="width: 304px; height: 78px">
                <div>
                  <iframe
                    title="reCAPTCHA"
                    width="304"
                    height="78"
                    role="presentation"
                    name="a-uo12ecx9uijm"
                    frameborder="0"
                    scrolling="no"
                    sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                    src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdtRp4cAAAAAK4Cki7r6GWeZyDaKrWdCOpRjKB3&amp;co=aHR0cHM6Ly9tdW1vaXJhLnR2OjQ0Mw..&amp;hl=vi&amp;v=KXX4ARWFlYTftefkdODAYWZh&amp;size=normal&amp;cb=i8u7n3d77766"
                  ></iframe>
                </div>
                <textarea
                  id="g-recaptcha-response"
                  name="g-recaptcha-response"
                  class="g-recaptcha-response"
                  style="
                    width: 250px;
                    height: 40px;
                    border: 1px solid rgb(193, 193, 193);
                    margin: 10px 25px;
                    padding: 0px;
                    resize: none;
                    display: none;
                  "
                ></textarea>
              </div>
              <iframe style="display: none"></iframe>
            </div>
            <div
              class="alert alert-danger hide mt-3"
              role="alert"
              id="recaptchaErrorMessage"
            >
              Capcha không hợp lệ
            </div>
          </div>
        </div>
        <div class="row mb-3 align-items-center">
          <div class="col-12 text-end">
            <button
              type="submit"
              class="btn btn-success font-weight-bold"
              id="btn-action"
            >
              <i class="fa fa-cloud-upload-alt"></i>
              Đăng MU Mới
            </button>
          </div>
        </div>
        <input
          name="__RequestVerificationToken"
          type="hidden"
          value="CfDJ8NErE2f8l85JsNfmIbP4jivTjgdil3Y00ASra-T_Zg93xu2HDybJiSPzUs39X1pJ-fpw1PxmkhkKZ_e9eI2NvkivdLngoubEpP0aZKh1-EfDRAUrlgTrE1OwO5VV-jQsZffIoPUzqFyXWTt7oHzURuh5f66vis_nfvUwHoOyxqii1VPho2EkdD2n-Cx3Lcw8Zw"
        />
      </form>
    </div>
  </div>
</section>

</body>


    <?php
require_once(__DIR__.'/footer.php');
?>