<?php  
   class Select extends CI_Model  
   {  
      function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct();  
      }  
      //we will use the select function  
      public function selectdatadebitur()  
      {  
         //data is retrive from this query  
         $query = $this->db->get('customer');  
         return $query->result();  
      }
      public function selectdataacc()  
      {  
         //data is retrive from this query  
         $query = $this->db->get('account');  
         return $query;  
      }
      public function selectdatatransaksi()  
      {  
         //data is retrive from this query  
         $query = $this->db->get('transaksi');  
         return $query;  
      }   

      public function get_by_cif(){
         $this->db->select('*');
         $this->db->from('customer');
         $this->db->join('account','account.nomor_cif = customer.nomor_cif');
         $query = $this->db->get();
         return $query->result();
      }  

      public function getDatadebiturDetail($CIF){
         $this->db->where('nomor_cif', $CIF);
         $query = $this->db->get('customer');
         return $query->row();
      }
      public function getDataRekening($CIF){
         $this->db->where('nomor_rekening', $CIF);
         $query = $this->db->get('account');
         return $query->row();
      }
      public function getDatadebiturRekening($CIF){
         $this->db->where('nomor_cif', $CIF);
         $query = $this->db->get('account');
         return $query->row();
      }
      public function updateDataDebitur($CIF, $data){
         $this->db->where('nomor_cif', $CIF);
         $this->db->update('customer', $data);
      }
      public function updateDataRekening($CIF, $data){
         $this->db->where('nomor_rekening', $CIF);
         $this->db->update('account', $data);
      }
      public function addpembukaanRekening($CIF, $data){
            $this->db->where('nomor_cif', $CIF);
            $this->db->insert('account', $data);
      }
      public function setorTunai($CIF, $datatosaldo){
         $this->db->where('nomor_rekening', $CIF);
         $this->db->update('account', $datatosaldo);
      }
      public function adddatatransaksi($CIF, $datatotransaksi){
         $this->db->where('nomor_rekening', $CIF);
         $this->db->insert('transaksi', $datatotransaksi);
      }

      function hapusDataDebitur($CIF){
         $this->db->where('nomor_cif', $CIF);
         $this->db->delete('customer');
      } 
      function hapusRekening($CIF){
         $this->db->where('nomor_cif', $CIF);
         $this->db->delete('account');
      }  

      function getbyId($id){
         
      }
} 
?>  
