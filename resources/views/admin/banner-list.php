<?php
$body = [
    'title' => 'Danh sách vị trí',
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
<!-- bs-custom-file-input -->
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script> 
';
require_once(__DIR__.'/../../../models/is_admin.php');
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/sidebar.php');
require_once(__DIR__.'/nav.php');
?>
<?php
if (isset($_POST['ThemViTri'])) {
    $url_image = '';
    if (check_img('image') == true) {
        $rand = random('0123456789QWERTYUIOPASDGHJKLZXCVBNM', 3);
        $uploads_dir = 'assets/storage/images/bank/'.$rand.'.png';
        $tmp_name = $_FILES['image']['tmp_name'];
        $addlogo = move_uploaded_file($tmp_name, $uploads_dir);
        if ($addlogo) {
            $url_image = 'assets/storage/images/bank/'.$rand.'.png';
        }
    }
    $isInsert = $DB->insert("banner_list", [
        'image'         => $url_image,
        'short_name'    => check_string($_POST['short_name']),
        'accountNumber' => check_string($_POST['accountNumber']),
        'accountName'   => check_string($_POST['accountName'])
    ]);
    if ($isInsert) {
        $DB->insert("logs", [
            'user_id'       => $getUser['id'],
            'ip'            => myip(),
            'device'        => $Mobile_Detect->getUserAgent(),
            'createdate'    => time(),
            'action'        => "Thêm ngân hàng (".$_POST['short_name']." - ".$_POST['accountNumber'].") vào hệ thống."
        ]);
        die('<script type="text/javascript">if(!alert("Thêm thành công !")){window.history.back().location.reload();}</script>');
    } else {
        die('<script type="text/javascript">if(!alert("Thêm thất bại !")){window.history.back().location.reload();}</script>');
    }
}
 
if (isset($_POST['SaveSettings'])) {
    foreach ($_POST as $key => $value) {
        $DB->update("settings", array(
            'value' => $value
        ), " `name` = '$key' ");
    }
    die('<script type="text/javascript">if(!alert("Lưu thành công !")){window.history.back().location.reload();}</script>');
} ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách vị trí</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=BASE_URL('admin/');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Danh sách vị trí</li>
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
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-university mr-1"></i>
                                DANH SÁCH VỊ TRÍ ĐẶT BANNER
                            </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">ID</th>
                                        <th>Tên</th>
                                        <th>Vị trí</th>
                                        <th>Giới hạn</th>
                                        <th>Giá tiền</th>
                                        <th>Chú ý</th>
                                        <th>Thời gian thêm</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($DB->get_list("SELECT * FROM `banner_list`") as $row) {?>
                                    <tr>
                                        <td><?=$row['id'];?></td>
                                        <td><?=$row['name'];?></td>
                                        <td><?=$row['position'];?></td>
                                        <td><?=$row['lim'];?></td>
                                        <td><?=$row['price'];?></td>
                                        <td><?=$row['note'];?>
                                        <td><?=date('H:i:s d/m/Y', $row['time']);?>
                                        <td>
                                            <button style="color:white;" onclick="RemoveRow('<?=$row['id'];?>', '<?=$row['name'];?>')"
                                                class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
                                                <i class="fas fa-trash mr-1"></i><span class="">Delete</span>
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
function RemoveRow(id, name) {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Xóa Vị Trí",
        message: "Bạn có chắc chắn muốn xóa vị trí " + name + " không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL('ajaxs/admin/removePosition.php');?>",
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
                            message: respone.message,
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