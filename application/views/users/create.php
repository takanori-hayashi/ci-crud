<h2 class="uk-heading-divider">create user</h2>
<div class="uk-section">
  <div class="uk-container uk-container-small">
    <?= form_open('users/create', ['calss' => 'uk-form-stacked']); ?>
      <div class="uk-form-controls uk-margin-bottom">
        <?= form_label('Name', 'name');  ?>
        <?= form_input('name', '', ['class' => 'uk-input']); ?>
        <?= form_error('name'); ?>
      </div>
      <div class="uk-form-controls uk-margin-bottom">
        <?= form_label('Email', 'email'); ?>
        <?= form_input('email', '', ['type' => 'email', 'class' => 'uk-input']); ?>
        <?= form_error('email'); ?>
      </div>
      <div class="uk-form-controls uk-margin-bottom uk-text-center">
        <?= form_submit('submit', 'Submit', ['class' => 'uk-button uk-button-primary']) ?>
      </div>
    <?= form_close(); ?>

  </div>
</div>