@extends('layout')
@section('index-content')
 <div class="container card mb-3">
      <div class="card-body">
        <div class="float-right" style="margin-bottom: 5%">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Add</button>
          <button type="button" class="btn btn-warning" >Update</button>
          <button type="button" class="btn btn-danger" >Remove</button>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Address</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="checkbox" class="form-control" name=""></td>
                <td>Tiger Nixon</td>
                <td>10-123</td>
                <td>rock12234</td>
                <td>4162001234</td>
                <td>Triger1234@gmail.com</td>
              </tr>
              <tr>
                <td><input type="checkbox" class="form-control" name=""></td>
                <td>Garrett Winters</td>
                <td>10-5</td>
                <td>!@#123456</td>
                <td>6479871468</td>
                <td>DD@gmail.com</td>
              </tr>
              <tr>
                <td><input type="checkbox" class="form-control" name=""></td>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>zzz123123</td>
                <td>4658796541</td>
                <td>cc@gmail.com</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
    <div class="modal" id="modal_add">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Adding new resident</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="form_add" method="post" action="{{route('add_resident')}}">
            <div class="form-group">
              <label for="add_name">Name</label>
              <input type="text" class="form-control" id="add_name"  placeholder="Name">
            </div>
            <div class="form-group">
              <label for="add_email">Email address</label>
              <input type="email" class="form-control" id="add_email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="add_password">Password</label>
              <input type="text" class="form-control" id="add_password" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="add_address">Civic address</label>
              <input type="text" class="form-control" id="add_address" placeholder="Civic address">
            </div>            
            <div class="form-group">
              <label for="add_phone">Phone</label>
              <input type="text" class="form-control" id="add_phone" placeholder="Phone">
            </div>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">          
          <button type="button" id="btn_add" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

  <script type="text/javascript">
  $(document).on('click','#btn_add',function(){
    alert(1);
    $("#form_add").submit(function(e) {
        var form = $(this);
        var url = form.attr('action');
        alert(url);
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(data)
               {
                   alert(data); // show response from the php script.
               }
             });

        alert(e.preventDefault()); // avoid to execute the actual submit of the form.
    });
  });

</script>
@stop