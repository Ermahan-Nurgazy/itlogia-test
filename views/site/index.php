<?php

/** @var yii\web\View $this */

$this->title = 'Главная страница';
?>
<div class="site-index">

    <div class="course-title">
        <h1>Дизайн UX/UI</h1>
    </div>

    <div class="course-container">

        <div class="course-preview">
            <div class="course-img"></div>
        </div>

        <div class="course-body">
            <?php if ($courseComplete): ?>
                <div class="course-complete">
                    <div class="alert alert-success" role="alert">
                        Вы успешно прошли курс!
                    </div>
                </div>
            <?php endif; ?>
            <div class="lessons-container">
                <p class="list-title">Список уроков: </p>
                <div class="lesson-list">
                    <?php foreach ($lessons as $lesson): ?>
                        <a class="lesson-item" href="<?= \yii\helpers\Url::to(['site/view','id' => $lesson->id]) ?>">
                            <div class="lesson-status">
                                <?php if ($lesson->result->is_read): ?>
                                    <img src="/img/done.png" alt="" height="20px" width="20px">
                                <?php else: ?>
                                    <img src="/img/learning.png" alt="" height="20px" width="20px">
                                <?php endif; ?>
                            </div>
                            <p><?= $lesson->title ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>

</div>
