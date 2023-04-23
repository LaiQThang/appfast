<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Tài khoản / Sửa</h1>
        <div class="row">
            <div class="col-xl-12">
                <?= view('messages/messages'); ?>
                <div class="card easion-card">
                    <div class="card-header">
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Thông tin tài khoản </div>
                    </div>
                    <div class="card-body ">
                        <form action="admin/user/update" method="post">
                            <input name="id" hidden value="<?= $user['id']?>">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Email</label>
                                    <input name="email" value="<?= $user['email'] ?>" type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Tên hiển thị</label>
                                <input name="name" value="<?= $user['name']?>" type="text" class="form-control" id="inputAddress" placeholder="Tên hiển thị người dùng" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Mật khẩu</label>
                                    <input name="password"  type="password" class="form-control" id="password" placeholder="Nhập vào mật khẩu" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password-confirm">Xác nhận mật khẩu</label>
                                    <input name="password_confirm"  type="password" class="form-control" id="password-confirm" placeholder="Xác nhận lại mật khẩu" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input name="change_password" type="checkbox" class="custom-control-input" id="change-password">
                                    <label class="custom-control-label" for="change-password">Thay đổi mật
                                        khẩu</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <button id="btn-reset-edit-user" type="reset" class="btn btn-secondary">Nhập
                                lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>