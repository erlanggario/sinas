<?php  
   class tables extends CI_Controller  
   {  
      public function index()  
      {  
         //load the database  
         $this->load->database();  
         //load the model  
         $this->load->model('select');  
         //load the method of model  
         $data['h']=$this->select->select();  
         //return the data in view  
         $this->load->view('home/tables', $data);  
      }  
      public function addData(){
         $this->load->view('templates/header');
        $this->load->view('register');
        $this->load->view('templates/footer');
      }
   }  
?>  