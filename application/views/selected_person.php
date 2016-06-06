<div>
    
    <div class="white_bg">
        
        <h2><?php echo html_escape($person->firstname)." ".html_escape($person->lastname); ?></h2>
        
        <div class="center">
            <p><strong>ID: </strong><?php echo html_escape($person->person_id); ?></p>
            <p><strong>First Name: </strong><?php echo html_escape($person->firstname); ?></p>
            <p><strong>Last Name: </strong><?php echo html_escape($person->lastname); ?></p>
            <p><strong>Email: </strong><?php echo html_escape($person->email); ?></p>
            <p><strong>Birthdate: </strong><?php echo html_escape($person->birthdate); ?></p>
        </div>
        
        <br />
        
        <div class="center_buttons">
            <a href="/"><button type='button' class="other_button">Back</button></a>
        </div>
            
    </div>
    
</div>