<h2 class="uk-heading-divider">User Edit</h2>
<?= form_open('users/update', ['calss' => 'uk-form-stacked']); ?>
  <?= form_hidden('id', $user->id); ?>
  <div class="uk-form-controls uk-margin-bottom">
    <?= form_label('Name', 'name');  ?>
    <?= form_input('name', set_value('name', $user->name), ['class' => 'uk-input']); ?>
    <?= form_error('username'); ?>
  </div>
  <div class="uk-form-controls uk-margin-bottom">
    <?= form_label('Email', 'email'); ?>
    <?= form_input('email', set_value('email', $user->email), ['class' => 'uk-input']); ?>
    <?= form_error('email'); ?>
  </div>
  <div class="uk-form-controls uk-margin-bottom">
    <?php $age = $user->age ? $user->age : ''; ?>
    <?= form_label('Age', 'age'); ?>
    <input type="number"
      name="age"
      min="1"
      max="120"
      class="uk-input"
      value="<?= set_value('age', $age); ?>">
    <?= form_error('age'); ?>
  </div>
  <div class="uk-form-controls uk-margin-bottom">
    <?php $memo = $user->memo ? $user->memo : ''; ?>
    <?= form_label('Memo', 'memo'); ?>
    <?= form_textarea('memo', set_value('memo', $memo), ['class' => 'uk-textarea', 'row' => 5]); ?>
  </div>
  <div class="uk-form-controls uk-margin-bottom uk-text-center">
    <?= form_submit('submit', 'Save', ['class' => 'uk-button uk-button-primary']) ?>
  </div>
<?= form_close(); ?>