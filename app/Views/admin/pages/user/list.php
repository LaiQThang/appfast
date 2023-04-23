<div class="container-fluid">
    <h1 class="dash-title">Trang chủ / Tài khoản</h1>

    <div class="row">
        <div class="col-lg-12">
            <?= view('messages/messages'); ?>
        </div>
        <div class="col-lg-12">
            <div class="card easion-card">
                <div class="card-header">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="easion-card-title">Danh sách tài khoản</div>
                </div>
                <div class="card-body ">
                    <table id="datatable" class="cell-border">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Quyền</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $value) : ?>
                                <tr>
                                    <td> <?= $value['id'] ?> </td>
                                    <td><?= $value['email'] ?> </td>
                                    <td><?= $value['password'] ?> </td>
                                    <td><?= $value['name'] ?> </td>
                                    <td class="text-center">
                                        <a href="admin/user/edit/<?= $value['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a data-url="<?= base_url() ?>/admin/user/delete/<?= $value['id'] ?>" class="btn btn-danger btn-del-confirm">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>