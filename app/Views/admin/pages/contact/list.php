<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Liên hệ</h1>
        <p class="mb-5">Danh sách vấn đề liên hệ.</p>
        <div class="row">
            <div class="col-lg-12">
            </div>
            <?php foreach($contact as $value): ?>
            <div class="col-lg-6">
                <div class="card easion-card">
                    <div class="card-header <?= $value['readed'] === "1" ? 'bg-success text-white' : "" ?>">
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> <?= $value['phone'] ?> </div>
                        <div class="easion-card-menu">
                            <div class="dropdown">
                                <a class="easion-card-menu-link" href="javascript::void(0)" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="dropdownMenuLink" x-placement="bottom-end"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(30px, 30px, 0px);">
                                    <a class="dropdown-item far fa-eye" href=""> Đánh dấu chưa đọc</a>
                                    <a class="dropdown-item far fa-trash-alt" href=""> Xóa bỏ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <h4><strong><?= $value['name'] ?> </strong></h4>
                        <hr>
                        <p> <?= $value['content'] ?> </p>
                        <hr>
                        <p><strong>Email :</strong> <span><?= $value['mail'] ?></span></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            
        </div>

        <div class="row">
            <?= $pager->links('default', 'custom_pagination') ?>
        </div>

    </div>
</main>