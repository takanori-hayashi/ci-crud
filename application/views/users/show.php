<h2 class="uk-heading-divider">User detail</h2>
<?php if (isset($_SESSION['update'])) : ?>
<div class="uk-alert-success" uk-alert>
  <a class="uk-alert-close" uk-close></a>
  <p><?= $_SESSION['update']; ?></p>
</div>
<?php endif; ?>
<h3 class="uk-heading-bullet"><?= $user->name; ?></h3>
<dl class="uk-description-list">
  <dt>id</dt>
  <dd><?= $user->id; ?></dd>
  <dt>name</dt>
  <dd><?= $user->name; ?></dd>
  <dt>email</dt>
  <dd><?= $user->email; ?></dd>
  <?php if ($user->age) : ?>
  <dt>age</dt>
  <dd><?= $user->age; ?></dd>
  <?php endif; ?>
  <?php if ($user->memo) : ?>
  <dt>mamo</dt>
  <dd><?= $user->memo; ?></dd>
  <?php endif; ?>
</dl>
<hr>
<a class="uk-button uk-button-default" href="/">一覧</a>
<a class="uk-button uk-button-secondary" href="<?= site_url('/users/edit/' . $user->id); ?>">編集</a>
<?= form_open('users/delete/' . $user->id, ['calss' => 'uk-form-stacked', 'style' => 'display:inline']); ?>
<?= form_submit('delete', '削除', ['class' => 'uk-button uk-button-danger']) ?>
<?= form_close(); ?>