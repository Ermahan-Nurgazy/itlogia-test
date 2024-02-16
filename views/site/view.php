<?php

/** @var yii\web\View $this */

$this->title = $lesson->title;
$this->params['breadcrumbs'][] = $lesson->title;
?>
<div class="site-index">

    <div class="lesson-title">
        <p><?= $lesson->title ?></p>
    </div>

    <div class="lesson-container">
        <div class="lesson-body">
            <?= $lesson->description ?>
        </div>
        <div class="lesson-actions">
            <?php if ($lesson->id === $firstLesson->id): ?>
                <?php if (!$lesson->result->is_read): ?>
                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'enableAjaxValidation' => true,
                        'action' => ['/site/lesson-read', 'id' => $lesson->id]
                    ]); ?>
                        <input name="lesson_complete" type="hidden" value="1">
                        <button type="submit" class="btn btn-success">Прочитано</button>
                    <?php \yii\widgets\ActiveForm::end(); ?>
                <?php else: ?>
                    <a href="<?= \yii\helpers\Url::to(['/site/view', 'id' => $lesson->id + 1]); ?>" class="btn btn-primary">Следующий</a>
                    <button disabled class="btn btn-secondary">Прочитано</button>
                <?php endif; ?>
            <?php elseif ($lesson->id === $lastLesson->id): ?>
                <?php if (!$lesson->result->is_read): ?>
                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'enableAjaxValidation' => true,
                        'action' => ['/site/lesson-read', 'id' => $lesson->id]
                    ]); ?>
                        <input name="lesson_complete" type="hidden" value="1">
                        <button type="submit" class="btn btn-success">Прочитано</button>
                    <?php \yii\widgets\ActiveForm::end(); ?>
                <?php else: ?>
                    <a href="<?= \yii\helpers\Url::to(['/site/index']); ?>" class="btn btn-secondary">Вернуться к курсу</a>
                    <button disabled class="btn btn-secondary">Прочитано</button>
                <?php endif; ?>
            <?php else: ?>
                <?php if (!$lesson->result->is_read): ?>
                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'enableAjaxValidation' => true,
                        'action' => ['/site/lesson-read', 'id' => $lesson->id]
                    ]); ?>
                        <input name="lesson_complete" type="hidden" value="1">
                        <button type="submit" class="btn btn-success">Прочитано</button>
                    <?php \yii\widgets\ActiveForm::end(); ?>
                <?php else: ?>
                    <a href="<?= \yii\helpers\Url::to(['/site/view', 'id' => $lesson->id - 1]); ?>" class="btn btn-primary">Предыдущий</a>
                    <a href="<?= \yii\helpers\Url::to(['/site/view', 'id' => $lesson->id + 1]); ?>" class="btn btn-primary">Следующий</a>
                    <button disabled class="btn btn-secondary">Прочитано</button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

</div>
