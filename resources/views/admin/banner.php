<?php
$body = [
    'title' => 'Danh sách banner',
    'desc'   => '',
    'keyword' => ''
];
$body['header'] = '
<!-- Select2 -->
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
';
$body['footer'] = '
<script>
$(function() {
    $("#reservationtime").daterangepicker({
        locale: {
            format: "YYYY/MM/DD/"
        }
    })
    //Date picker
    $("#reservationdate").datetimepicker({
        format: "L"
    });
});
</script>

<!-- Select2 -->
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
    $(".select2").select2()
    $(".select2bs4").select2({
        theme: "bootstrap4"
    });
});
</script>
';
require_once(__DIR__.'/../../../models/is_admin.php');
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/sidebar.php');
require_once(__DIR__.'/nav.php');

$sotin1trang = 10;
if(isset($_GET['page'])){
    $page = check_string(intval($_GET['page']));
}
else{
    $page = 1;
}
$from = ($page - 1) * $sotin1trang;
$where = " `id` > 0 ";
$user_id = '';
$content = '';
$createdate = '';
$ip = '';
$device  = '';

if(!empty($_GET['user_id'])){
    $user_id = check_string($_GET['user_id']);
    $where .= ' AND `user_id` = "'.$user_id.'" ';
}

$listDatatable = $DB->get_list(" SELECT * FROM `banner` WHERE $where ORDER BY `id` DESC LIMIT $from,$sotin1trang ");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=BASE_URL('admin/home');?>">Dashboard</a></li>
                        <li class="breadcrumb-item">Danh sách banner</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h3 class="card-title">
                                <i class="fas fa-history mr-1"></i>
                                DANH SÁCH BANNER
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i
                                        class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">

                            </div>
                            <div class="table-responsive p-0">
                                <table id="datatable2" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Home</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>EXP</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listDatatable as $row) {?>
                                        <tr>
                                            <td><?=$row['id'];?></td>
                                            <td><?=getRowRealtime("users", $row['user_id'], "username");?></td>
                                            <td><?=$row['name'];?></td>
                                            <td><?=$row['home'];?></td>
                                            <td><?=$row['position'];?></td>
                                            <td><?=$row['status'];?></td>
                                            <td><?=date('H:i:s d/m/Y', $row['exp']);?></td>
                                            <td><?=date('H:i:s d/m/Y', $row['time']);?></td>
                                            <td>
                                                <button style="color:white;" onclick="ActiveRow(<?=$row['id'];?>)"
                                                    class="btn btn-success btn-sm btn-icon-left m-b-10" type="button">
                                                        <i class="fas fa-trash mr-1"></i><span class="">Active</span>
                                                    </button>
                                                <button style="color:white;" onclick="RemoveRow(<?=$row['id'];?>)"
                                                    class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
                                                        <i class="fas fa-trash mr-1"></i><span class="">Delete</span>
                                                    </button>

                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">

                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <?php
                                $total = $DB->num_rows(" SELECT * FROM `banner` WHERE $where ORDER BY id DESC ");
                                if ($total > $sotin1trang){echo '<center>' . pagination(base_url("admin/banner"), $from, $total, $sotin1trang) . '</center>';}?>
                                </div>
                            </div>
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
function RemoveRow(id) {
    cuteAlert({
        type: "question",
        title: "CẢNH BÁO",
        message: "Bạn có chắc chắn muốn xóa banner ID " + id + " không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            postRemove(id);
            location.reload();
        }
    })
}
function postRemove(id) {
    $.ajax({
        url: "<?=BASE_URL('ajaxs/admin/removeBanner.php');?>",
        type: 'POST',
        dataType: "JSON",
        data: {
            id: id
        },
        success: function(response) {
            if (response.status == 'success') {
                cuteToast({
                    type: "success",
                    message: "Đã xóa thành công banner " + id,
                    timer: 3000
                });
            } else {
                cuteToast({
                    type: "error",
                    message: "Đã xảy ra lỗi khi xoá banner " + id,
                    timer: 5000
                });
            }
        }
    });
}
function ActiveRow(id) {
    cuteAlert({
        type: "question",
        title: "CẢNH BÁO",
        message: "Bạn có chắc chắn muốn duyệt banner ID " + id + " không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            postActive(id);
            location.reload();
        }
    })
}
function postActive(id) {
    $.ajax({
        url: "<?=BASE_URL('ajaxs/admin/activeBanner.php');?>",
        type: 'POST',
        dataType: "JSON",
        data: {
            id: id
        },
        success: function(response) {
            if (response.status == 'success') {
                cuteToast({
                    type: "success",
                    message: "Đã duyệt thành công banner " + id,
                    timer: 3000
                });
            } else {
                cuteToast({
                    type: "error",
                    message: "Đã xảy ra lỗi khi duyệt banner " + id,
                    timer: 5000
                });
            }
        }
    });
}

</script>

<script>
$(function() {
    $('#datatable2').DataTable();
});
</script>