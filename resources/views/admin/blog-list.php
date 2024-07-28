<?php
$body = [
    'title' => 'Danh sách bài viết',
    'desc'   => '',
    'keyword' => ''
];
$body['header'] = '
    <!-- DataTables -->
    <link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
';
$body['footer'] = '
    <!-- DataTables  & Plugins -->
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/jszip/jszip.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/pdfmake/pdfmake.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/pdfmake/vfs_fonts.js"></script>   
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
';
require_once(__DIR__.'/../../../models/is_admin.php');
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/sidebar.php');
require_once(__DIR__.'/nav.php');

?>
<?php

if (isset($_POST['SaveSettings'])) {
    foreach ($_POST as $key => $value) {
        $DB->update("settings", array(
            'value' => $value
        ), " `name` = '$key' ");
    }
    die('<script type="text/javascript">if(!alert("Lưu thành công !")){window.history.back().location.reload();}</script>');
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=BASE_URL('admin/');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Danh sách bài viết</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
    
                <section class="col-lg-16 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa-brands fa-blogger mr-1"></i>
                                DANH SÁCH BÀI VIẾT
                            </h3>
                        <div class="card-body">
                            <table id="datatable1" class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 5px;">#</th>
                                        <th>Tên MU</th>
                                        <th>Hình ảnh</th>
                                        <th>Tình trạng</th>
                                        <th>Trang chủ</th>
                                        <th>Fanpage hỗ trợ</th>
                                        <th>Phiên bản</th>
                                        <th>Reset</th>
                                        <th>Thể loại</th>
                                        <th>Kiểu point</th>
                                        <th>Tên máy chủ</th>
                                        <th>Miêu tả MU</th>
                                        <th>Alpha test</th>
                                        <th>Open beta</th>
                                        <th>Exp</th>
                                        <th>Drops</th>
                                        <th>Anti hack</th>
                                        <th>Mô tả chi tiết</th>
                                        <th>Thời gian</th>
                                        <th style="width: 20%">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; foreach ($DB->get_list("SELECT * FROM `blogs` ") as $row) {?>
                                    <tr>
                                        <td><?=$row['id'];?></td>
                                        <td><?=$row['title'];?></td>
                                        <td><img src="<?=$row['image'];?>" width="100px"></td>
                                        <td><?=display_status_blogs($row['status']);?></td>
                                        <td><?=$row['home'];?></td>
                                        <td><?=$row['fanpage_support'];?></td>
                                        <td><?=$row['version'];?></td>
                                        <td><?=$row['reset'];?></td>
                                        <td><?=$row['type'];?></td>
                                        <td><?=$row['point'];?></td>
                                        <td><?=$row['server_name'];?></td>
                                        <td><?=$row['description'];?></td>
                                        <td><?=date('H:i:s d/m/Y', $row['alpha_test']);?></td>
                                        <td><?=date('H:i:s d/m/Y', $row['open_beta']);?></td>
                                        <td><?=date('H:i:s d/m/Y', $row['exp']);?></td>
                                        <td><?=$row['drops'];?></td>
                                        <td><?=$row['anti_hack'];?></td>
                                        <td><?=$row['motachitiet'];?></td>
                                        <td><?=date('H:i:s d/m/Y', $row['time']);?></td>
                                        <td>
                                            <button style="color:white;" onclick="ActiveRow('<?=$row['id'];?>', '<?=$row['title'];?>')"
                                                class="btn btn-success btn-sm btn-icon-left m-b-10" type="button">
                                                <i class="fas fa-trash mr-1"></i><span class="">Duyệt</span>
                                            </button>
                                            <button style="color:white;" onclick="RemoveRow('<?=$row['id'];?>', '<?=$row['title'];?>')"
                                                class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
                                                <i class="fas fa-trash mr-1"></i><span class="">Xóa</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php
require_once(__DIR__.'/footer.php');
?>
<script type="text/javascript">
function ActiveRow(id, name) {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Duyệt Bài Viết",
        message: "Bạn có chắc chắn muốn duyệt bài viết tên " + name + " không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL("ajaxs/admin/activeBlog.php");?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(respone) {
                    if (respone.status == 'success') {
                        cuteToast({
                            type: "success",
                            message: respone.message,
                            timer: 5000
                        });
                        location.reload();
                    } else {
                        cuteAlert({
                            type: "error",
                            title: "Error",
                            message: respone.msg,
                            buttonText: "Okay"
                        });
                    }
                },
                error: function() {
                    alert(html(response));
                    location.reload();
                }
            });
        }
    })
}

function RemoveRow(id, name) {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Xóa Bài Viết",
        message: "Bạn có chắc chắn muốn xóa bài viết tên " + name + " không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL("ajaxs/admin/removeBlog.php");?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(respone) {
                    if (respone.status == 'success') {
                        cuteToast({
                            type: "success",
                            message: respone.message,
                            timer: 5000
                        });
                        location.reload();
                    } else {
                        cuteAlert({
                            type: "error",
                            title: "Error",
                            message: respone.msg,
                            buttonText: "Okay"
                        });
                    }
                },
                error: function() {
                    alert(html(response));
                    location.reload();
                }
            });
        }
    })
}
</script>
<script>
$(function() {
    $('#datatable1').DataTable();
});
</script>
