<main class="dash-content">
    <h1 class="dash-title">Trang chủ / Gói dịch vụ</h1>
    <div class="row">
        <div class="col-lg-12">
            <?= view('messages/messages'); ?>
            
            <div class="card easion-card">
                <div class="card-header">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="easion-card-title">Danh sách gói dịch vụ</div>
                </div>
                <div class="card-body ">
                    <table id="datatable" class="cell-border">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Tên gói</th>
                                <th scope="col">Giá bán</th>
                                <th scope="col">Số lượng email</th>
                                <th scope="col">Dung lượng nhớ</th>
                                <th scope="col">Số lượng database</th>
                                <th scope="col">Số lượng domains</th>
                                <th scope="col">Hỗ trợ</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($purchases as $value):?>
                            <tr>
                                <td><?= $value['id']?></td>
                                <td><?= $value['name']?></td>
                                <td><?= $value['price']?></td>
                                <td><?= $value['email_address']?></td>
                                <td><?= $value['storage']?></td>
                                <td><?= $value['databases']?></td>
                                <td><?= $value['domain']?></td>
                                <td><?= $value['support']?></td>
                                <td class="text-center">
                                    <a href="admin/purchases/edit/<?= $value['id']?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a data-url="<?= base_url()?>admin/purchases/delete/<?= $value['id']?>" class="btn btn-danger btn-del-confirm"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>