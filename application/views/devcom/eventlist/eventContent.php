<!-- content -->
<div class="card ">
   <div class="card-header card-header-success card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Active Events</h4>
                  </div>
                </div>
                <div class="card-body ">
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
                        
                          </div>

                          <div class="col-md-4">
                             
                          </div>
                          
                        </div>
                         <table class="table dt-responsive nowrap text-center" id="events">
                         <thead class="text-primary">
                         <tr>
                          <th class="text-center font-weight-bold h4">Event Name</th>
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
         
