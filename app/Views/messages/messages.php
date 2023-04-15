<?php if (session('errorsMas')) : ?>
    <?php foreach (session('errorsMas') as $err) : ?>
        <div class="alert alert-warning alert-danger fade show" role="alert">
            <strong><?= $err ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endforeach ?>
<?php endif ?>
<?php if (session('successMas')) : ?>
    <?php foreach (session('successMas') as $success) : ?>
        <div class="alert alert-success alert-success  fade show" role="alert">
            <strong><?= $success ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endforeach ?>
<?php endif ?>