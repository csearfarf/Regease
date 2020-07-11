
<div class="content" >
        <div class="container-fluid" >
          <div class="row pt-5 " >
            <div class="col-md-12 ">
              <div class="card " >
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Event List</h4>
                  <p class="card-category">List of CCS Events held within a year.</p>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-md-6">
                        <!--calendar--> 
                          <!--title customize in js -->
                          <p id="titleMonth" class="title text-left font-weight-bold h2"></p>
                          <p class="text-muted h5">Total Events : <span id="totalEvent"></span></p>
                          <p class="text-right">
                          <button type="button" id="prev" class="btn btn-primary"><</button>
                          <button type="button" id="next" class="btn btn-primary">></button></p>
                       <div id="calendar">
                       </div>
                    </div>

                    <div class="col-md-6 pt-5">

                        <div class="row mt-5">
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
                         <table class="table dt-responsive nowrap text-center" id="events">
                         <thead class="text-primary">
                         <tr>

                          <th class="text-center font-weight-bold h4"></th>
                          <th class="text-center font-weight-bold h4">Event Name</th>
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
        </div>
</div>

<div class="modal fade " tabindex="-1" role="dialog" id="createAccount">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">

      <form  id="createForm" method="post" accept-charset="utf-8" >
      <div class="modal-header">
        <h3 class="modal-title">Event Details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label for="">Event Name</label>
            <input type="text" class="form-control" name="eventname" id="eventname" minlength="5" placeholder="Enter Event Name" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label for="">Event Location</label>
            <input type="text" class="form-control" name="eventLocation" id="eventLocation"  minlength="5" placeholder="Enter Event Location" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label for="">Event Points</label>
            <input type="text" class="form-control" id="eventPoints"  placeholder="Enter Points"  required>
            </div>
          </div>
          <div class="col-md-6">
            <!-- input with datetimepicker -->
            <div class="form-group">
                <label class="label-control">Event Start</label>
                <input type="text" class="form-control datetimepicker" id="eventStart" required />
                <!-- datepicker -->
            </div>
          </div>
          <div class="col-md-6">
            <!-- input with datetimepicker -->
            <div class="form-group">
                <label class="label-control">Event End</label>
                <input type="text" class="form-control datetimepicker" id="eventEnd" required/>
                <!-- datepicker -->
            </div>
          </div>
         


        </div>
       

      

      </div>
      <div class="modal-footer">
        <button type="submit" type="submit" class="btn btn-primary" onclick='createSave();'>Create Save</button>
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
        <h3 class="modal-title">Event Details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label for="">Event Name</label>
            <input type="text" class="form-control"  id="eeventname" placeholder="Enter Event Name" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label for="">Event Location</label>
            <input type="text" class="form-control" id="eeventLocation"  placeholder="Enter Event Location" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label for="">Event Points</label>
            <input type="text" class="form-control" id="eeventPoints"  placeholder="Enter Points">
            </div>
          </div>
          <div class="col-md-6">
            <!-- input with datetimepicker -->
            <div class="form-group">
                <label class="label-control">Event Start</label>
                <input type="text" class="form-control datetimepicker" id="eeventStart" required />
                <!-- datepicker -->
            </div>
          </div>
          <div class="col-md-6">
            <!-- input with datetimepicker -->
            <div class="form-group">
                <label class="label-control">Event End</label>
                <input type="text" class="form-control datetimepicker" id="eeventEnd" required />
                <!-- datepicker -->
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



       
                
             