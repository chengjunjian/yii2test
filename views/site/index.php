<?php

/** @var yii\web\View $this */
/** @var array $students */
/** @var yii\data\Pagination $pages */

use yii\helpers\Html;

$this->title = 'Yii2 Test App';
?>
<main class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Yii2 Test App</h1>
        <p class="lead text-muted">If you can see this page, the app is running on Coolify.</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="fas fa-users me-2"></i>Student List
            </h5>
        </div>
        <div class="card-body p-0">
            <?php if (empty($students)): ?>
                <div class="p-4 text-center text-muted">
                    <i class="fas fa-inbox fs-1 d-block mb-2"></i>
                    No students found.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center" style="width: 60px;">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center" style="width: 100px;">Age</th>
                                <th scope="col" class="text-center" style="width: 100px;">Gender</th>
                                <th scope="col" class="text-end" style="width: 160px;">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td class="text-center text-muted"><?= $student['id'] ?></td>
                                    <td>
                                        <i class="fas fa-user text-primary me-2"></i>
                                        <?= Html::encode($student['name']) ?>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-info text-dark"><?= $student['age'] ?></span>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($student['gender'] === 'M'): ?>
                                            <span class="badge bg-primary">Male</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Female</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end text-muted small">
                                        <?= date('Y-m-d H:i', strtotime($student['created_at'])) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
        <div class="card-footer bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-muted small fw-bold">
                    <i class="fas fa-list-ol me-1"></i>Total: <?= $pages->totalCount ?> student(s)
                </span>
                <?= \yii\bootstrap5\LinkPager::widget([
                    'pagination' => $pages,
                    'options' => ['class' => 'pagination mb-0'],
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                    'activePageCssClass' => 'active',
                    'disabledPageCssClass' => 'disabled',
                    'prevPageLabel' => '<i class="fas fa-chevron-left"></i>',
                    'nextPageLabel' => '<i class="fas fa-chevron-right"></i>',
                    'firstPageLabel' => '<i class="fas fa-angle-double-left"></i>',
                    'lastPageLabel' => '<i class="fas fa-angle-double-right"></i>',
                    'maxButtonCount' => 5,
                ]) ?>
            </div>
        </div>
    </div>
</main>
