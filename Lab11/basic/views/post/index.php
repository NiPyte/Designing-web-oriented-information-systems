<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

// Connect the CSS file for styling
$this->registerCssFile('@web/css/post.css');

$this->title = 'My Blog';
?>

    <h1>Blog Posts</h1>

<?php foreach ($posts as $post) : ?>
    <div class="post-card">
        <h2 class="post-title">
            <?= Html::encode($post->title) ?>
        </h2>

        <p class="post-text">
            <?= Html::encode($post->content) ?>
        </p>

        <?php if ($post->published) : ?>
            <p class="post-date">
                Published: <?= $post->published_at ?>
            </p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<?= LinkPager::widget(['pagination' => $pagination]) ?>