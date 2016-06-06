<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_Controller extends CI_Controller {
    
    //Load home page with all the people in a table
    public function index(){
        $this->load->view('header');
        $this->load->database();
        $this->loadPeople();
        $this->load->view('footer');
    }
    
    //Create a person
    public function create(){
        $this->load->database();
        $this->load->helper('form');
        $this->load->view('header');
        
        $this->setValidation();
        
        //If validation passes
        if($this->form_validation->run()){
            
            $this->load->model('Person');
            $person = new Person();
            $person->firstname = $this->input->post('firstname');
            $person->lastname = $this->input->post('lastname');
            $person->email = $this->input->post('myemail');
            $person->birthdate = $this->input->post('birthdate');

            $person->insert();
            $this->load->view('create_success', array(
            'person' => $person,
        ));

        }
        
        else {
            //Reload view
            $this->load->view('add_form');
        }

        $this->load->view('footer');
    }
    
    
    //Read a person and get their details
    public function read($person_id){
        $this->load->database();
        $this->load->view('header');
        $this->load->model('Person');
        $person = new Person();
        $person->load($person_id);
        if(!$person->person_id){
            show_404();
        }
        
        $this->load->view('selected_person', array(
            'person' => $person,
        ));
        
        $this->load->view('footer');
        
    }
    
    //Update a person
    public function update($person_id){
        $this->load->database();
        $this->load->helper('form');
        $this->load->view('header');
        
        $this->setValidation();
        $this->load->model('Person');
        
        //If validation passes
        if($this->form_validation->run()){
            $person = new Person();
            $person->person_id = $this->uri->segment(2);;
            $person->firstname = $this->input->post('firstname');
            $person->lastname = $this->input->post('lastname');
            $person->email = $this->input->post('myemail');
            $person->birthdate = $this->input->post('birthdate');

            $person->update();
            $this->load->view('update_success', array(
            'person' => $person,
        ));
        }
        
        else {
            //Reload view
            $person = new Person();
            $person->load($person_id);
            
            if(!$person->existsRecord($person_id)){
                show_404();
            }
        
            $this->load->view('update_form', array(
            'person' => $person,
        ));
        }

        $this->load->view('footer');
    }
    
    //Confirm delete a person by primary key
    public function delete_confirm($person_id){
        $this->load->database();
        $this->load->view('header');
        $this->load->model('Person');
        $person = new Person();
        $person->load($person_id);
        
        if(!$person->existsRecord($person_id)){
            show_404();
        }
    
        $this->load->view('confirm_delete', array(
            'person' => $person,
        ));
        $this->load->view('footer');
    }
    
    //Delete a person by primary key
    public function delete($person_id){
        $this->load->database();
        $this->load->view('header');
        $this->load->model('Person');
        $person = new Person();
        $person->load($person_id);
        
        if(!$person->existsRecord($person_id)){
            show_404();
        }
        
        $person->delete();
    
        $this->load->view('delete_success', array(
            'person' => $person,
        ));
        $this->load->view('footer');
    }
    
    //Load all people in a table to display
    public function loadPeople(){
        $this->load->model('Person');
        $this->load->library('table');
        $this->load->helper('url'); 
        $people = $this->Person->get();
        foreach ($people as $person) {
            $peoplelist[] = array(
                $person->person_id,
                $person->firstname,
                $person->lastname,
                $person->email,
                $person->birthdate,
                //anchor($this->config->site_url().'read/'.$person->person_id, 'View').' | '. 
                //anchor($this->config->site_url().'delete/'.$person->person_id, 'Delete'),
                "<a href='read/$person->person_id'><button class='read'>Read</button></a>".
                "<a href='update/$person->person_id'><button class='update'>Update</button></a>".
                "<a href='delete_confirm/$person->person_id'><button class='delete'>Delete</button></a>",
            );
        }
        $this->load->view('people', array(
            'people' => $peoplelist,
        ));
    }
    
     /**
     * Set validation for forms.
     */
    public function setValidation(){
        // Validation.
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
               'field' => 'firstname',
               'label' => 'First Name',
               'rules' => 'required',
            ),
            array(
               'field' => 'lastname',
               'label' => 'Last Name',
               'rules' => 'required',
            ),
            array(
               'field' => 'myemail',
               'label' => 'Email',
               'rules' => 'required|valid_email',
            ),
            array(
               'field' => 'birthdate',
               'label' => 'Birthdate',
               'rules' => 'required|callback_date_validation',
            ),
        ));
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }
    
     /**
     * Date validation callback.
     * @param string $input
     * @return boolean
     */
    public function date_validation($input) {
        $test_date = explode('-', $input);
        if (!@checkdate($test_date[1], $test_date[2], $test_date[0])) {
            $this->form_validation->set_message('date_validation', 'The %s field must be in YYYY-MM-DD format.');
            return FALSE;
        }
        return TRUE;
    }
    
}