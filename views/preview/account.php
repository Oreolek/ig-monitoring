<?php

/**
 * @var $this yii\web\View
 * @var $model app\models\Account
 * @var array $lastDailyChange
 * @var array $dailyChanges
 * @var array $lastMonthlyChange
 * @var array $monthlyChanges
 * @var array $dailyStats
 */

$this->title = "{$model->usernamePrefixed} :: Dashboard";

/** @var \app\components\Formatter $formatter */
$formatter = Yii::$app->formatter;
?>
<div class="account-view">
    <div class="row">
        <div class="col-lg-3">
            <?= $this->render('_profile', ['model' => $model]) ?>
        </div>
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-body">

                    <?= \app\modules\admin\widgets\NoStatsDataAlert::widget(['model' => $model]) ?>

                    <?php if ($lastDailyChange): ?>
                        <?= $this->render('@app/modules/admin/views/account/_change-row', [
                            'header' => 'Daily change',
                            'change' => $lastDailyChange,
                        ]); ?>
                    <?php endif; ?>

                    <?php if ($lastMonthlyChange): ?>
                        <?= $this->render('@app/modules/admin/views/account/_change-row', [
                            'header' => 'Monthly change',
                            'change' => $lastMonthlyChange,
                        ]); ?>
                    <?php endif; ?>

                    <?php if ($dailyStats): ?>
                        <h2 class="page-header">
                            Stats from the last month
                        </h2>
                        <?= \app\widgets\ProgressChart::widget(['stats' => $dailyStats]) ?>
                    <?php endif; ?>

                    <?php if ($dailyChanges): ?>
                        <br>
                        <h2 class="page-header">
                            Daily changes from the last month
                            <small class="text-muted">Followed by</small>
                        </h2>
                        <?= \app\widgets\DiffChart::widget(['changes' => $dailyChanges]) ?>
                    <?php endif; ?>

                    <?php if ($monthlyChanges): ?>
                        <br>
                        <h2 class="page-header">
                            Monthly changes from last year
                            <small class="text-muted">Followed by</small>
                        </h2>
                        <?= \app\widgets\DiffChart::widget(['changes' => $monthlyChanges]) ?>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
