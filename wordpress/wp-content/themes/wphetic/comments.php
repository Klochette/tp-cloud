<?php
    $count = absint(get_comments_number());
?>

<?php if ($count > 0):?>
    <h3><?= $count ?> Commentaire<?= $count > 1 ? 's' : ''; ?></h3>
<?php else : ?>
    <h3>Commentaire</h3>
<?php endif ?>

<?php comment_form(['title_reply' => '', 'class_container' => 'dodoremifasl', 'logged_in_as' => '' ]) ?>
<ul class="comment">
    <?php wp_list_comments() ?>
</ul>