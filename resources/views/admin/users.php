<?php
$body = [
    'title' => 'Thành viên',
    'desc'   => '',
    'keyword' => ''
];
$body['header'] = '
<!-- Select2 -->
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
';
$body['footer'] = '
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

$users = $DB->get_list("SELECT * FROM `users` ORDER BY id DESC  ");

$sotin1trang = 10;
if(isset($_GET['page'])){
    $page = check_string(intval($_GET['page']));
}
else{
    $page = 1;
}

$from = ($page - 1) * $sotin1trang;
$where = ' `id` > 0 ';
$order_by = ' ORDER BY id DESC ';
$username = '';
$name = '';
$email = '';
$phone = '';
$status = '';
$role = '';
$money = '';
$ck = '';
$ip = '';
$id = '';
$total_money = '';
$ref_ck = '';

if(!empty($_GET['id'])){
    $id = check_string($_GET['id']);
    $where .= ' AND `id` = '.$id.' ';
}
if(!empty($_GET['username'])){
    $username = check_string($_GET['username']);
    $where .= ' AND `username` LIKE "%'.$username.'%" ';
}
if(!empty($_GET['name'])){
    $name = check_string($_GET['name']);
    $where .= ' AND `fullname` LIKE "%'.$name.'%" ';
}
if(!empty($_GET['phone'])){
    $phone = check_string($_GET['phone']);
    $where .= ' AND `phone` LIKE "%'.$phone.'%" ';
}
if(!empty($_GET['status'])){
    $status = check_string($_GET['status']);
    if($status == 1){
        $where .= ' AND `banned` = 0 ';
    }else if($status == 2){
        $where .= ' AND `banned` = 1 ';
    }
}
if(!empty($_GET['role'])){
    $role = check_string($_GET['role']);
    if($role == 1){
        $where .= ' AND `ctv` = 1 ';
    }else if($role == 2){
        $where .= ' AND `admin` = 1 ';
    }
}
if(!empty($_GET['money'])){
    $money = check_string($_GET['money']);
    if($money == 1){
        $order_by = ' ORDER BY `money` ASC ';
    }else if($money == 2){
        $order_by = ' ORDER BY `money` DESC ';
    }
}
if(!empty($_GET['total_money'])){
    $total_money = check_string($_GET['total_money']);
    if($total_money == 1){
        $order_by = ' ORDER BY `total_money` ASC ';
    }else if($total_money == 2){
        $order_by = ' ORDER BY `total_money` DESC ';
    }
}
if(!empty($_GET['ip'])){
    $ip = check_string($_GET['ip']);
    $where .= ' AND `ip` LIKE "%'.$ip.'%" ';
}

$listUsers = $DB->get_list("SELECT * FROM `users` WHERE $where $order_by LIMIT $from,$sotin1trang ");


?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=BASE_URL('admin/home');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tổng thành viên</span>
                            <span class="info-box-number"><?=format_cash($DB->num_rows("SELECT * FROM `users` "));?>
                                thành viên</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Số dư thành viên</span>
                            <span
                                class="info-box-number"><?=format_cash($DB->get_row("SELECT SUM(`money`) FROM `users` ")['SUM(`money`)']);?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Staff</span>
                            <span class="info-box-number">Admin:
                                <?=format_cash($DB->num_rows("SELECT * FROM `users` WHERE `admin` = 1 "));?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-lock"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tài khoản bị vô hiệu hoá</span>
                            <span
                                class="info-box-number"><?=format_cash($DB->num_rows("SELECT * FROM `users` WHERE `banned` = 1 "));?>
                                tài khoản</span>
                        </div>
                    </div>
                </div>
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h3 class="card-title">
                                <i class="fas fa-users mr-1"></i>
                                DANH SÁCH THÀNH VIÊN
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
                            <form action="" id="form" method="post">
                                <div class="table-responsive p-0">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5px;"><input type="checkbox" name="check_all" id="check_all"
                                                        value="option1"></th>
                                                <th>Tài khoản</th>
                                                <th>Ví</th>
                                                <th>Bảo mật</th>
                                                <th>Admin</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach ($listUsers as $row) { ?>
                                            <tr>
                                                <td><input type="checkbox" data-id="<?=$row['id'];?>" name="checkbox"
                                                        class="checkbox" value="<?=$row['id'];?>" /></td>
                                                <td>
                                                    <ul>
                                                        <li>Tên đăng nhập: <b><?=$row['username'];?></b>
                                                            [ID <b><?=$row['id'];?></b>]</li>
                                                        <li>Số điện thoại: <b style="color:blue"><?=$row['phone'];?></b>
                                                        </li>
                                                        <li>Banned: <?=display_banned($row['banned']);?></li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Số dư khả dụng: <b
                                                                style="color:blue"><?=format_cash($row['money']);?></b>
                                                        </li>
                                                        <li>Tổng số tiền nạp: <b
                                                                style="color:red"><?=format_cash($row['total_money']);?></b>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>IP: <b><?=$row['ip'];?></b></li>
                                                        <li>Status: <b><?=display_online($row['time_session']);?></b>
                                                        </li>
                                                        <li>Ngày tham gia: <b><?=date("H:i:s d/m/Y", $row['create_date']);?></b></li>
                                                        <li>Hoạt động gần đây: <b><?=date("H:i:s d/m/Y", $row['update_date']);?></b></li>
                                                    </ul>
                                                </td>
                                                <td><?=display_mark($row['admin']);?></td>
                                                <td>
                                                    <a aria-label=""
                                                        href="<?=base_url('admin/user-edit/'.$row['id']);?>"
                                                        style="color:green;"
                                                        class="btn btn-info btn-sm btn-icon-left m-b-10" type="button">
                                                        <i class="fas fa-edit mr-1"></i><span class="">Edit</span>
                                                    </a>
                                                    <button style="color:white;" onclick="RemoveRow(<?=$row['id'];?>)"
                                                        class="btn btn-danger btn-sm btn-icon-left m-b-10"
                                                        type="button">
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
                                        <button class="btn btn-danger btn-sm" type="button" onclick="deleteConfirm()"
                                            name="btn_delete"><i class="fas fa-trash mr-1"></i>Delete</button>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <?php
                                $total = $DB->num_rows(" SELECT * FROM `users` WHERE $where ORDER BY id DESC ");
                                if ($total > $sotin1trang){echo '<center>' . pagination(base_url("index.php?module=admin&action=users&username=$username&name=$name&email=$email&phone=$phone&status=$status&role=$role&money=$money&ck=$ck&ip=$ip&id=$id&"), $from, $total, $sotin1trang) . '</center>';}?>
                                    </div>
                                </div>
                        </div>
                        </form>
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

function postRemove(id) {
    $.ajax({
        url: "<?=BASE_URL('ajaxs/admin/removeUser.php');?>",
        type: 'POST',
        dataType: "JSON",
        data: {
            id: id
        },
        success: function(response) {
            if (response.status == 'success') {
                cuteToast({
                    type: "success",
                    message: "Đã xóa thành công item " + id,
                    timer: 3000
                });
            } else {
                cuteToast({
                    type: "error",
                    message: "Đã xảy ra lỗi khi xoá item " + id,
                    timer: 5000
                });
            }
        }
    });
}

function deleteConfirm() {
    var result = confirm("Bạn có thực sự muốn xóa các bản ghi đã chọn?");
    if (result) {
        var checkbox = document.getElementsByName('checkbox');
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked === true) {
                postRemove(checkbox[i].value);
            }
        }
        location.reload();
    }
}
$(document).ready(function() {
    $('#check_all').on('click', function() {
        if (this.checked) {
            $('.checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('.checkbox').on('click', function() {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $('#check_all').prop('checked', true);
        } else {
            $('#check_all').prop('checked', false);
        }
    });
});
</script>
<script type="text/javascript">
function RemoveRow(id) {
    cuteAlert({
        type: "question",
        title: "CẢNH BÁO",
        message: "Bạn có chắc chắn muốn xóa thành viên ID " + id + " không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            postRemove(id);
            location.reload();
        }
    })
}
</script>

<script>
$(function() {
    $('#datatable1').DataTable();
});
</script>