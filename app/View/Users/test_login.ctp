<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('請輸入帳號密碼/Please enter your username and password'); ?>
        </legend>
<?php echo $this->Form->input('username');
echo $this->Form->input('password');
?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
</legend></fieldset></div>
