

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Users List</h4>
                  <p class="card-category">Users that are to be registrator, or Admin for a given role.</p>
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
                      <th class="text-center font-weight-bold h4">Name</th>
                      <th class="text-center font-weight-bold h4">Username</th>
                      <th class="text-center font-weight-bold h4">Account Type</th>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form  id="createForm" role="form" method="post" accept-charset="utf-8" >
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
            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Lastname" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" id="username"  placeholder="Enter Username" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Password</label>
            <input type="Password" class="form-control" name="password" id="password"  placeholder="Enter Password" required >
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
            <label>Re-type Password</label>
            <input type="Password" class="form-control" name="repassword" id="repassword"  placeholder="Re-type Password" equalto="#password">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Account Type</label>
              <select id="type" class="form-control">
                <option value="1">Admin</option>
                <option value="2">Devcom</option>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <form id="editForm" role="form" method="post" accept-charset="utf-8">
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
            <input type="text" class="form-control" name="efirstname" id="efirstname" placeholder="Enter Firstname" required>
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
            <label>Username</label>
            <input type="text" class="form-control" name="eusername" id="eusername"  placeholder="Enter Username" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Password</label>
            <input type="Password" class="form-control" name="epassword" id="epassword"  placeholder="Enter Password" required>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
            <label>Re-type Password</label>
            <input type="Password" class="form-control" name="erepassword" id="erepassword"  placeholder="Re-type Password" equalto="#epassword" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Account Type</label>
              <select id="etype" class="form-control" required>
                <option value="1">Admin</option>
                <option value="2">Devcom</option>
              </select>
            </div>
          </div>

        </div>

        <input type="hidden" name="eid" id="eid">
       


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" type="submit" onclick='editSave();'>Save Changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>


        </form>
    </div>
  </div>
</div>  


       
                
             