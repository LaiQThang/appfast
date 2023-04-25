<?php $pager->setSurroundCount(2) ?>

<div class="col-lg-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if($pager->hasPrevious()): ?>
                        <li class="page-item">
                            <a class="page-link fas fa-angle-double-left" href="<?= $pager->getFirst() ?>"></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link fas fa-angle-left" href="<?= $pager->getPreviousPage() ?>"></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript::void(0)">...</a>
                        </li>
                        <?php endif ?>

                        <?php foreach($pager->links() as $link): ?>
                        <li class="page-item <?= $link['active'] ? 'active' : '' ?> ">
                            <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
                        </li>
                        <?php endforeach ?>

                        <?php if($pager->hasPrevious()): ?>
                        <li class="page-item">
                            <a class="page-link" href="javascript::void(0)">...</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link fas fa-angle-right" href="<?= $pager->getNextPage() ?>"></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link fas fa-angle-double-right" href="<?= $pager->getLast() ?>"></a>
                        </li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>