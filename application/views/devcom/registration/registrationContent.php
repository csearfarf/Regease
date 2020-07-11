<!-- content -->
<div class="card card-stats " style="margin-top: 100px;">
                              <div class="card-header card-header-success card-header-icon">
                             

                        <div class="text-center">
                          <img src="<?php echo base_url(); ?>assets/img/umak.png" class="pb-2 pt-4 floating" style="width:30%"/>
                        </div>

                        <div class="text-center">
<?php
$event_name="";
              foreach($event as $row)
              { 
                $event_name=$row->eventName;
              echo '

              <h3 class="card-title font-weight-bold">'.$row->eventName.'</h3>
              <p class="card-category">'
              . date("M d, Y h:ia",strtotime($row->eventStart)).' - '. date("h:ia",strtotime($row->eventEnd)).
              '</p>
              <p class="card-category">'.$row->eventLocation.'</p>
              

              ';
             
              }


              if($event_name=="Global Blockchain Technology Summit"){
                   echo '
                          <div class="col-lg-6 col-md-6 col-sm-12 m-auto pb-5">
                            <div class="row">
                              <div class="container">
                                <div class="text-center">
                                  <p class="description text-primary mt-4 mb-0 ">
                                    SPONSORS
                                  </p>
                                </div>
                                <section class="customer-logos slider pb-1" style="background-color: transparent;">
                                  <div class="slide"><img src="'.base_url().'assets/img/blockchain/1.png" style="border-radius: 5px;"></div>
                                  <div class="slide"><img src="'.base_url().'assets/img/blockchain/2.png" style="border-radius: 5px;"></div>
                                  <div class="slide"><img src="'.base_url().'assets/img/blockchain/3.png" style="border-radius: 5px;"></div>
                                  <div class="slide"><img src="'.base_url().'assets/img/blockchain/4.png" style="border-radius: 5px;"></div>
                                  <div class="slide"><img src="'.base_url().'assets/img/blockchain/5.png" style="border-radius: 5px;"></div>
                                  <div class="slide"><img src="'.base_url().'assets/img/blockchain/6.png" style="border-radius: 5px;"></div>
                                  <div class="slide"><img src="'.base_url().'assets/img/blockchain/7.png" style="border-radius: 5px;"></div>
                               </section>
                              </div>
                            </div>
                          </div>
              ';

              }

           

              ?>
              </div>
                              </div>
                                 <div class="card-body ">

                                    <div class="row mb-5">
                                        <div class="col-md-4 ">
                                        </div>
                                        <div class="col-md-4">

                                        <form  id="registerForm" role="form" method="post">
                                        <div class="form-group">
                                        <input type="text" class="form-control" id="searchstudentNumber" autocomplete="off" required="required" minlength="8" maxlength="10" placeholder="Student Number" 
                                        style="text-transform:uppercase">
                                     
                                        </div>
                                           <button class="btn-primary btn btn-md btn-block mt-4" type="submit" onclick="register()">Register</button>

                                        
                                        </form>
                                        </div>

                                        <div class="col-md-4">
                                        
                                        </div>
                                    
                                    </div>
                                    
                          
                                   
    
                                  </div>
                            </div>
                          </div>




<div class="modal fade" tabindex="-1" role="dialog" id="createStudent">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <form  id="createForm" role="form" method="post">
      <div class="modal-header">
        <h3 class="modal-title">Student Details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label>Firstname</label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Firstname" required style="text-transform:uppercase">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Lastname" required style="text-transform:uppercase">
            </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
            <label>Student Number</label>
            <input type="text" class="form-control" name="studentNumber" id="studentNumber"  placeholder="Enter Student Number" required style="text-transform:uppercase">
            </div>
          </div>
             <div class="col-md-6">
             <div class="form-group">
            <label>Contact Number</label>
            <input type="Number" class="form-control" name="contact" id="contact"  placeholder="Enter Contact Number" >
            </div>
          </div>
          <div class="col-md-12">
             <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email"  placeholder="Enter Email Address" >
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label>Program</label>
              <select id="program" name="program" class="form-control" required>
                <option value ="">---</option>
              <?php
              foreach($program as $row)
              { 
              echo '<option value="'.$row->id.'">'.$row->programName.'</option>';
              }
              ?>
              </select>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
            <label>Year</label>
              <select id="year" name="year" class="form-control" required> 
              <?php
              foreach($year as $row)
              { 
              echo '<option value="'.$row->id.'">'.$row->yearName.'</option>';
              }
              ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Section</label>
              <select id="section" name="section" class="form-control" required>
                <option value ="">---</option>
              </select>
            </div>
          </div>
          <input type="hidden" name="id">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" type="submit" onclick='createSave();'>Save & Register</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

      </form>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="eupdateStudent">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <form  id="eupdateForm" role="form" method="post">
      <div class="modal-header">
        <h3 class="modal-title">Student Details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label>Firstname</label>
            <input type="text" class="form-control" name="efirstname" id="efirstname" placeholder="Enter Firstname" required style="text-transform:uppercase">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" name="elastname" id="elastname"  placeholder="Enter Lastname" required style="text-transform:uppercase">
            </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
            <label>Student Number</label>
            <input type="text" class="form-control" name="estudentNumber" id="estudentNumber"  placeholder="Enter Student Number" required style="text-transform:uppercase">
            </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
            <label>Contact Number</label>
            <input type="number" class="form-control" name="contact" id="econtact"  placeholder="Enter Contact Number" >
            </div>
          </div>
          <div class="col-md-12">
             <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="eemail"  placeholder="Enter Email Address" >
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label>Program</label>
              <select id="eprogram" name="eprogram" class="form-control" required>
                <option value ="">---</option>
              <?php
              foreach($program as $row)
              { 
              echo '<option value="'.$row->id.'">'.$row->programName.'</option>';
              }
              ?>
              </select>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
            <label>Year</label>
              <select id="eyear" name="eyear" class="form-control" required> 
              <?php
              foreach($year as $row)
              { 
              echo '<option value="'.$row->id.'">'.$row->yearName.'</option>';
              }
              ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Section</label>
              <select id="esection" name="esection" class="form-control" required>
                <option value ="">---</option>
              </select>
            </div>
          </div>
          <input type="hidden" name="eid" id="eid">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning" type="submit" onclick='updateSave();'>Save & Register</button>


        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

      </form>
    </div>
  </div>
</div>




<div class="modal fade" tabindex="-1" role="dialog" id="manualStudent">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <form  id="manualForm" role="form" method="post">
      <div class="modal-header">
        <h3 class="modal-title">Student Details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label>Firstname</label>
            <input type="text" class="form-control" name="mfirstname" id="mfirstname" placeholder="Enter Firstname" required style="text-transform:uppercase">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" name="mlastname" id="mlastname"  placeholder="Enter Lastname" required style="text-transform:uppercase">
            </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
            <label>Student Number</label>
            <input type="text" class="form-control" name="mstudentNumber" id="mstudentNumber"  placeholder="Enter Student Number" required style="text-transform:uppercase">
            </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
            <label>Contact Number</label>
            <input type="number" class="form-control" name="contact" id="mcontact"  placeholder="Enter Contact Number" >
            </div>
          </div>
          <div class="col-md-12">
             <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="memail"  placeholder="Enter Email Address" >
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label>Program</label>
              <select id="mprogram" name="mprogram" class="form-control" required>
                <option value ="">---</option>
              <?php
              foreach($program as $row)
              { 
              echo '<option value="'.$row->id.'">'.$row->programName.'</option>';
              }
              ?>
              </select>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
            <label>Year</label>
              <select id="myear" name="myear" class="form-control" required> 
              <?php
              foreach($year as $row)
              { 
              echo '<option value="'.$row->id.'">'.$row->yearName.'</option>';
              }
              ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Section</label>
              <select id="msection" name="msection" class="form-control" required>
                <option value ="">---</option>
              </select>
            </div>
          </div>
          <input type="hidden" name="mid" id="mid">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" type="submit" onclick='updateManual();'>Save Changes</button>
        <button type="submit" class="btn btn-danger" type="submit" onclick='cancelRegistration();'>Cancel Registration</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

      </form>
    </div>
  </div>
</div>



         

