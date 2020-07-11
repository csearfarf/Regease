<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Student List</h4>
                  <p class="card-category">Students that is officially registered in CCS.</p>
                </div>
                <div class="card-body">
                  
                    <div class="row">
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                      <input type="text" class="form-control" id="searchBox" placeholder="Search">
                      </div>
                      </div>

                      <div class="col-md-4">
                          <p class="text-right">
                          <button class="btn-primary btn btn-md" data-toggle="modal" data-target="#createAccount">Create</button>
                          </p>
                      </div>
                      
                    </div>
                   
                 
                     <table class="table dt-responsive nowrap text-center" id="accounts">
                     <thead class="text-primary">
                     <tr>
                        <th class="text-center font-weight-bold h4">Student Number</th>
                        <th class="text-center font-weight-bold h4">Name</th>
                        <th class="text-center font-weight-bold h4">Year</th>
                        <th class="text-center font-weight-bold h4">Section</th>
                        <th class="text-center font-weight-bold h4">Email</th>
                        <th class="text-center font-weight-bold h4">Contact #</th>
                        <th class="text-center font-weight-bold h4">Status</th>
                        <th class="text-center font-weight-bold h4">Option</th>
                     </tr>
                     </thead>
                     <tbody>
                     </tbody>
                     </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


<div class="modal fade " tabindex="-1" role="dialog" id="createAccount">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <form  id="createForm" role="form" method="post">
      <div class="modal-header">
        <h3 class="modal-title">Account Details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label>Firstname</label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Firstname" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Lastname" required="true">
            </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
            <label>Student Number</label>
            <input type="text" class="form-control" name="studentNumber" id="studentNumber"  placeholder="Enter Student Number" required>
            </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
            <label>Contact Number</label>
            <input type="text" class="form-control" name="contact" id="contact"  placeholder="Enter Contact Number" required>
            </div>
          </div>
          <div class="col-md-12">
             <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email"  placeholder="Enter Email Address" required>
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

        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" type="submit" onclick='createSave();'>Create Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

      </form>
    </div>
  </div>
</div>


<div class="modal fade " tabindex="-1" role="dialog" id="editAccount">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <form  id="editForm" role="form" method="post" accept-charset="utf-8" >
      <div class="modal-header">
        <h3 class="modal-title">Account Details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label>Firstname</label>
            <input type="text" class="form-control" name="firstname" id="efirstname" placeholder="Enter Firstname" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" name="elastname" id="elastname"  placeholder="Enter Lastname" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label>Student Number</label>
            <input type="text" class="form-control" name="estudentNumber" id="estudentNumber"  placeholder="Enter Student Number" minlength="8" required>
            </div>
          </div>
           <div class="col-md-6">
             <div class="form-group">
            <label>Contact Number</label>
            <input type="text" class="form-control" name="econtact" id="econtact"  placeholder="Enter Contact Number" required>
            </div>
          </div>
          <div class="col-md-12">
             <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="eemail" id="eemail"  placeholder="Enter Email Address" required>
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
                <option value ="0">---</option>
              </select>
            </div>
          </div>


        </div>
       
        
        <input type="hidden" name="eid" id="eid">
       

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" type="submit" onclick='editSave();'>Save Changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

        </form>
    </div>
  </div>
</div>


       
                
             