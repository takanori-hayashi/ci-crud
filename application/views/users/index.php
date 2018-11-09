<h1 class="uk-heading-divider">Users</h1>

<?php if (isset($_SESSION['create'])) : ?>
<div class="uk-alert-success" uk-alert>
  <a class="uk-alert-close" uk-close></a>
  <p><?= $_SESSION['create']; ?></p>
</div>
<?php elseif (isset($_SESSION['delete'])) : ?>
<div class="uk-alert-danger" uk-alert>
  <a class="uk-alert-close" uk-close></a>
  <p><?= $_SESSION['delete']; ?></p>
</div>
<?php endif; ?>

<table class="uk-table uk-table-striped uk-table-justyfy uk-table-middle">
  <thead>
    <th>id</th>
    <th>name</th>
    <th>email</th>
  </thead>
  <tbody>
    <?php foreach ($users as $user) : ?>
    <tr>
      <td><?= $user->id; ?></td>
      <td><a class="uk-link-muted" href="/users/show/<?= $user->id; ?>"><?= $user->name; ?></a></td>
      <td><?= $user->email; ?></td>
      <td><a href="/users/show/<?= $user->id; ?>" class="uk-button uk-button-default uk-button-small">more</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>