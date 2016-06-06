<div class='white_bg'>
<h2>Are you sure you want to delete this record (<?php echo html_escape($person->firstname)." ".html_escape($person->lastname); ?>)?</h2>
<div class='center_buttons'>
<a href='../delete/<?php echo $person->person_id ?>'><button class='delete'>Delete</button></a>
<a href='/'><button class="other_button">No</button></a>
</div>
</div>