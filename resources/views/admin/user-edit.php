<?php
$body = [
    'title' => 'Chỉnh sửa người dùng',
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
if (isset($_GET['id'])) {
    $DB = new DB();
    $id = check_string($_GET['id']);
    $user = $DB->get_row("SELECT * FROM `users` WHERE `id` = '$id' ");
    if (!$user) {
        die('ID user không tồn tại trong hệ thống');
    }
    // submit form edit
    if (isset($_POST['phone'])) {
        if(check_string($_POST['admin']) != $user['admin']){
            $DB->insert("logs", [
                'user_id'       => $getUser['id'],
                'createdate'    => time(),
                'device'        => $Mobile_Detect->getUserAgent(),
                'ip'            => myip(),
                'action'        => '[Admin] Thay đổi quyền Admin cho thành viên '.$user['username'].'['.$user['id'].'] từ '.$user['admin'].' -> '.check_string($_POST['admin']).'.'
            ]);
            $DB->insert("logs", [
                'user_id'       => $user['id'],
                'createdate'    => gettime(),
                'action'        => 'Bạn được Admin '.$getUser['username'].' thay đổi quyền Admin.'
            ]);
        }
        $DBUser = new users();
        $isUpdate = $DBUser->update_by_id([
            'token'     => check_string($_POST['token']),
            'phone'     => check_string($_POST['phone']),
            'admin'     => check_string($_POST['admin']),
            'banned'    => check_string($_POST['banned'])
        ], $user['id']);
        if ($isUpdate) {
            if (!empty($_POST['password'])) {
                $DBUser->update_by_id([
                    'password' => TypePassword(check_string($_POST['password']))
                ], $user['id']);
            }
            $DB->insert("logs", [
                'user_id'       => $getUser['id'],
                'createdate'    => time(),
                'device'        => $Mobile_Detect->getUserAgent(),
                'ip'            => myip(),
                'action'        => '[Admin] Cập nhật thông tin thành viên '.$user['username'].'['.$user['id'].'].'
            ]);
            $DB->insert("logs", [
                'user_id'       => $user['id'],
                'createdate'    => time(),
                'action'        => 'Bạn được Admin thay đổi thông tin.'
            ]);
            die('<script type="text/javascript">if(!alert("Cập nhật thông tin thành công")){window.history.back().location.reload();}</script>');
        }
    }
    if (isset($_POST['cong_tien'])) {
        if ($_POST['amount'] <= 0) {
            die('<script type="text/javascript">if(!alert("Số tiền không hợp lệ!")){window.history.back().location.reload();}</script>');
        }
        $amount = check_string($_POST['amount']);
        $reason = check_string($_POST['reason']);
        $DB->insert("logs", [
            'user_id'       => $getUser['id'],
            'createdate'    => time(),
            'device'        => $Mobile_Detect->getUserAgent(),
            'ip'            => myip(),
            'action'        => '[Admin] Cộng '.$amount.' cho User '.$user['username'].'['.$user['id'].'].'
        ]);
        /* Xử lý cộng tiền */
        $DBUser = new users();
        $DBUser->AddCredits($id, $amount, $reason);
        die('<script type="text/javascript">if(!alert("Cộng tiền thành công!")){window.history.back().location.reload();}</script>');
    }
    if (isset($_POST['tru_tien'])) {
        if ($_POST['amount'] <= 0) {
            die('<script type="text/javascript">if(!alert("Số tiền không hợp lệ!")){window.history.back().location.reload();}</script>');
        }
        if ($user['money'] - $_POST['amount'] < 0) {
            die('<script type="text/javascript">if(!alert("Bạn không thể trừ âm tiền!")){window.history.back().location.reload();}</script>');
        }
        $amount = check_string($_POST['amount']);
        $reason = check_string($_POST['reason']);
        $DB->insert("logs", [
            'user_id'       => $getUser['id'],
            'createdate'    => time(),
            'device'        => $Mobile_Detect->getUserAgent(),
            'ip'            => myip(),
            'action'        => '[Admin] Trừ '.$amount.' cho User '.$user['username'].'['.$user['id'].'].'
        ]);
        /* Xử lý trừ tiền */
        $DBUser = new users();
        $DBUser->RemoveCredits($id, $amount, $reason);
        die('<script type="text/javascript">if(!alert("Trừ tiền thành công !")){window.history.back().location.reload();}</script>');
    }
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User: <?=$user['username'];?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=BASE_URL('admin/home');?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?=BASE_URL('admin/users');?>">Users</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                                <i class="fas fa-user-edit mr-1"></i>
                                CHỈNH SỬA THÀNH VIÊN
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
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Token (*)</label>
                                    <input type="text" class="form-control" value="<?=$user['token'];?>" name="token"
                                        required>
                                    <i>Không được để lộ Token của thành viên tránh hacker chiếm quyền đăng nhập bằng
                                        token.</i>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mật khẩu (*)</label>
                                            <input type="text" class="form-control" placeholder="**********"
                                                name="password">
                                            <i>Nhập mật khẩu cần thay đổi, hệ thống sẽ tự động mã hoá (để trống nếu
                                                không muốn
                                                thay đổi)</i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Số điện thoại (*)</label>
                                            <input type="text" class="form-control" value="<?=$user['phone'];?>"
                                                name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Level (*)</label>
                                            <select class="form-control select2bs4" name="admin">
                                                <option value="1" <?=$user['admin'] == 1 ? 'selected' : '';?>>Admin
                                                </option>
                                                <option value="0" <?=$user['admin'] == 0 ? 'selected' : '';?>>Member
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Banned (*)</label>
                                                <select class="form-control select2bs4" name="banned">
                                                    <option <?=$user['banned'] == 1 ? 'selected' : '';?> value="1">
                                                        Banned</option>
                                                    <option <?=$user['banned'] == 0 ? 'selected' : '';?> value="0">Live
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Money</label>
                                            <input type="text" class="form-control"
                                                value="<?=format_cash($user['money']);?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total Money</label>
                                            <input type="text" class="form-control"
                                                value="<?=format_cash($user['total_money']);?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Used Money</label>
                                            <input type="text" class="form-control"
                                                value="<?=format_cash($user['total_money']-$user['money']);?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>IP Login</label>
                                            <input type="text" class="form-control" value="<?=$user['ip'];?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Device Login</label>
                                            <input type="text" class="form-control" value="<?=$user['device'];?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Login</label>
                                            <input type="text" class="form-control" value="<?=date('H:i:s d/m/Y', $user['create_date']);?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Login</label>
                                            <input type="text" class="form-control" value="<?=date('H:i:s d/m/Y', $user['update_date']);?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                            <div class="card-footer clearfix">
                                <button aria-label="" class="btn btn-info btn-icon-left m-b-10" type="submit"><i
                                        class="fas fa-save mr-1"></i>Lưu Ngay</button>
                            </div>
                        </form>
                    </div>
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-money-bill-alt mr-1"></i>
                                CỘNG TIỀN
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
                            <form class="" action="" method="POST" role="form">
                                <div class="form-group">
                                    <label>Amount (*)</label>
                                    <input type="hidden" class="form-control" id="id" value="<?=$user['id'];?>">
                                    <input type="number" class="form-control" name="amount"
                                        placeholder="Nhập số tiền cần cộng" required>
                                </div>
                                <div class="form-group">
                                    <label>Reason (*)</label>
                                    <textarea class="form-control" name="reason"
                                        placeholder="Nhập nội dung nếu có"></textarea>
                                </div>
                                <br>
                                <button aria-label="" name="cong_tien" class="btn btn-info btn-icon-left m-b-10"
                                    type="submit"><i class="fas fa-paper-plane mr-1"></i>Submit</button>
                            </form>
                        </div>
                    </div>
                </section>
                <section class="col-lg-6 connectedSortable">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-money-bill-alt mr-1"></i>
                                TRỪ TIỀN
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
                            <form class="" action="" method="POST" role="form">
                                <div class="form-group">
                                    <label>Amount (*)</label>
                                    <input type="hidden" class="form-control" id="id" value="<?=$user['id'];?>">
                                    <input type="number" class="form-control" name="amount"
                                        placeholder="Nhập số tiền cần trừ" required>
                                </div>
                                <div class="form-group">
                                    <label>Reason (*)</label>
                                    <textarea class="form-control" name="reason"
                                        placeholder="Nhập nội dung nếu có"></textarea>
                                </div>
                                <br>
                                <button aria-label="" name="tru_tien" class="btn btn-info btn-icon-left m-b-10"
                                    type="submit"><i class="fas fa-paper-plane mr-1"></i>Submit</button>
                            </form>
                        </div>
                    </div>
                </section>
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h3 class="card-title">
                                <i class="fas fa-history mr-1"></i>
                                BIẾN ĐỘNG SỐ DƯ
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
                            <div class="table-responsive p-0">
                                <table id="datatable1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Username</th>
                                            <th>Số tiền trước</th>
                                            <th>Số tiền thay đổi</th>
                                            <th>Số tiền hiện tại</th>
                                            <th>Thời gian</th>
                                            <th>Nội dung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($DB->get_list("SELECT * FROM `dongtien` WHERE `user_id` = '".$user['id']."' ORDER BY id DESC  ") as $row) {?>
                                        <tr>
                                            <td class="text-center"><?=$i++;?></td>
                                            <td class="text-center"><a
                                                    href="<?=base_url('admin/user-edit/'.$row['user_id']);?>"><?=getRowRealtime("users", $row['user_id'], "username");?></a>
                                            </td>
                                            <td class="text-center"><b
                                                    style="color: green;"><?=format_cash($row['sotientruoc']);?></b>
                                            </td>
                                            <td class="text-center"><b
                                                    style="color:red;"><?=format_cash($row['sotienthaydoi']);?></b>
                                            </td>
                                            <td class="text-center"><b
                                                    style="color: blue;"><?=format_cash($row['sotiensau']);?></b>
                                            </td>
                                            <td class="text-center"><i><?=date('H:i:s d/m/Y', $row['time']);?></i></td>
                                            <td><i><?=$row['noidung'];?></i></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h3 class="card-title">
                                <i class="fas fa-history mr-1"></i>
                                NHẬT KÝ HOẠT ĐỘNG
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
                            <div class="table-responsive p-0">
                                <table id="datatable2" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Username</th>
                                            <th width="40%">Action</th>
                                            <th>Time</th>
                                            <th>Ip</th>
                                            <th width="25%">Device</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($DB->get_list("SELECT * FROM `logs` WHERE `user_id` = '".$user['id']."' ORDER BY id DESC  ") as $row) {?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><a
                                                    href="<?=base_url('admin/user-edit/'.$row['user_id']);?>"><?=getRowRealtime("users", $row['user_id'], "username");?></a>
                                            </td>
                                            <td><?=$row['action'];?></td>
                                            <td><?=date('H:i:s d/m/Y', $row['createdate']);?></td>
                                            <td><?=$row['ip'];?></td>
                                            <td><?=$row['device'];?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
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
 