<?php //echo form_open('/create'); ?>
<div class="white_bg">
<form method="post" action="/create">
    
    <?php echo validation_errors(); ?>

    <h2>Create Person</h2>
    <div>
        <?php echo form_label('First Name: ', 'firstname'); ?><br />
        <?php echo form_input('firstname', set_value('firstname')); ?>
    </div><br />
    <div>
        <?php echo form_label('Last Name: ', 'lastname'); ?><br />
        <?php echo form_input('lastname', set_value('lastname')); ?>
    </div><br />
    <div>
        <?php echo form_label('Email:', 'myemail'); ?><br />
        <?php echo form_input('myemail', set_value('myemail')); ?>
    </div><br />
    <div>
        <?php echo form_label('Birthdate:', 'birthdate'); ?><br />
        <?php echo form_input('birthdate', set_value('birthdate')); ?>
    </div><br />
    <div class="center_buttons">
        <?php echo form_submit('save', 'Create', "class='create'"); ?>
        <a href="/"><button type='button' class='other_button'>Back</button></a>
    </div>
</form>
</div>

<?php //echo form_close(); ?>