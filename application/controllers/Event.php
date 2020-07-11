<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

//DATATABLE SCRIPT API

//url = base_url + "event/fetch_user" + "/" + year + "/" + month + "/" +startDays + "/" + totalDaysInMonth;
function fetch_user($year,$month,$startDays,$totalDaysInMonth){
      // adjustable data base on current month and year 
      $start = $year."-".$month."-"."0".$startDays;
      $end   = $year."-".$month."-".$totalDaysInMonth;

      $this->load->model("events_model");  
      $fetch_data = $this->events_model->make_datatables($start,$end); 
      $data = array();  
      foreach($fetch_data as $row)  
      {  
          $sub_array = array();
          $sub_array[] =$row->id;
          $sub_array[] =$row->eventName;

          $sub_array[] =($row->status==1)? "Activated":"Deactivated";
          $sub_array[] =($row->status==1)? 
          ' <button type="button" rel="tooltip" title="Update" class="btn btn-info btn-link btn-sm" id="'.$row->id.'" onclick="edit('.$row->id.')">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Disable" class="btn btn-danger btn-link btn-sm" id="'.$row->id.'" onclick="deactivate_account('.$row->id.')">
                                <i class="material-icons">close</i>
                              </button>
                              <button type="button" rel="tooltip" title="Delete" class="btn btn-warning btn-link btn-sm" id="'.$row->id.'" onclick="deleteAccount('.$row->id.')">
                                <i class="material-icons">delete</i>
                              </button>
                              <button type="button" rel="tooltip" title="Attendance" class="btn  btn-link btn-sm" id="'.$row->id.'" onclick="attendance('.$row->id.')">
                                <i class="material-icons">assignment</i>
                              </button>
                              '
                :
                '<button type="button" rel="tooltip" title="Update" class="btn btn-info btn-link btn-sm" id="'.$row->id.'" onclick="edit('.$row->id.')">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Activate" class="btn btn-primary btn-link btn-sm" id="'.$row->id.'" onclick="activate_account('.$row->id.')">
                                <i class="material-icons">check</i>
                              </button>
                              <button type="button" rel="tooltip" title="Delete" class="btn btn-warning btn-link btn-sm" id="'.$row->id.'" onclick="deleteAccount('.$row->id.')">
                                <i class="material-icons">delete</i>
                              </button>
                              <button type="button" rel="tooltip" title="Attendance" class="btn btn-link btn-sm" id="'.$row->id.'" onclick="attendance('.$row->id.')">
                                <i class="material-icons">assignment</i>
                              </button>
                              
                              ';


               



                  
            
          $data[] = $sub_array;  
      }  
      $output = array(  
          "draw"                    =>     intval($_POST["draw"]),  
          "recordsTotal"          =>      $this->events_model->get_all_data(),  
          "recordsFiltered"     =>     $this->events_model->get_filtered_data(),  
          "data"                    =>     $data  
      );



      echo json_encode($output);
   }



   


	public function get_events()
   {
     
       $this->load->model('events_model');
        $events = $this->events_model->get_events();

        $data_events = array();


        foreach($events->result() as $r) {

            $data_events[] = array(
                "id" => $r->id,
                "title" => $r->eventName,
                "eventLocation" => $r->eventLocation,
                "end" => $r->eventEnd,
                "start" => $r->eventStart,
                "points" => $r->eventPoints
            );
        }

        echo json_encode(array("events" => $data_events));
        exit();
    }


   public function createSave()
   {

    // call the ajax pass data into array


      $account = array(
        'eventName' => $this->input->post('eventName'),
        'eventLocation' => $this->input->post('eventLocation'), 
        'eventPoints' => $this->input->post('eventPoints'), 
        'eventStart' => $this->input->post('eventStart'),
        'eventEnd' => $this->input->post('eventEnd'),
      'status' => 1   
      );
       // load model
    $this->load->model('events_model'); 
      $data = $this->events_model->createSave($account);
      if($data){
        echo "1";
      }
      else{
        echo "0";
      }


   }

   public function editSave()
   {

      // call the ajax pass data into array
        $account = array(
        'eventName' => $this->input->post('eventName'),
        'eventLocation' => $this->input->post('eventLocation'), 
        'eventPoints' => $this->input->post('eventPoints'), 
        'eventStart' => $this->input->post('eventStart'),
        'eventEnd' => $this->input->post('eventEnd'),
      'status' => 1   
      );
        $id = $this->input->post('id');
         // load model
      $this->load->model('events_model'); 
        $data = $this->events_model->editSave($account,$id);
        if($data){
          echo "1";
        }
        else{
          echo "0";
        }

   }

   public function editPreview()
   {

    $id = array('id'=>$this->input->post('id'));
       // load model
    $this->load->model('events_model'); 
      $data = $this->events_model->editPreview($id);
      if($data){
        echo json_encode($data);
      }else{
        echo "0";
      }


   }
   public function activate()
   {

      // call the ajax pass data into array
      $account = array(
        'status' => 1 ,
      );
      $id = $this->input->post('id');
       // load model
    $this->load->model('events_model'); 
      $data = $this->events_model->changeStatus($account,$id);
      if($data){
        echo "1";
      }
      else{
        echo "0";
      }

    
   }

   public function deactivate()
   {

        // call the ajax pass data into array
      $account = array(
        'status' => 0 ,
      );
      $id = $this->input->post('id');
       // load model
    $this->load->model('events_model'); 
      $data = $this->events_model->changeStatus($account,$id);
      if($data){
        echo "1";
      }
      else{
        echo "0";
      }

    
   }

     public function deleteAccount() //ajax function
  {
    $account=array(
     'id'=>$this->input->post('id')
    );

     $this->load->model('events_model');
     
     $data=$this->events_model->delete_account($account);
     if($data){ // calling the model register_user from Accounts_model 
      echo "1";
      //passing the result of model to view by this controller
     }else{
      echo "0";
     }


  }

}
