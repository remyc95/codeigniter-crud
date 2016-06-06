<div class="white_bg">

    <h2>CodeIgniter - <span class="create">C</span><span class="read">R</span><span class="update">U</span><span class="delete">D</span> Demo</h2>
    <?php
    $this->table->set_heading('ID', 'First Name', 'Last Name', 'Email', 'Birthdate', 'Action');
    echo $this->table->generate($people);
    ?>
    
    <br>
    
    <div class="center_buttons">
        <a href="create">
           <button class="create">Create</button>
        </a>
    </div>

</div>