@extends('layout')
@section('index-content')
 <div class="container card mb-3">
      <div class="card-body">
        <div class="float-right" style="margin-bottom: 5%">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Add</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_update">Update</button>
          <button type="button" class="btn btn-danger" id="btn_modal_remove">Remove</button>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Room Number</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Account</th>
              </tr>
            </thead>
            <tbody>
              @foreach($residents as $one)
              <tr>
                <td><input id="resident_{{$one->id}}" type="checkbox" class="form-control" name="resident[]" value="{{$one->id}}"></td>
                <td>{{$one->name}}</td>
                <td>{{$one->roomid}}</td>
                <td>{{$one->phone}}</td>
                <td>{{$one->mobile}}</td>
                <td>{{$one->email}}</td>
                @if($one->isaccess==1)
                <td>Activity!</td>
                @else
                <td><a class="nounderline" href="javascript:email({{$one->id}})"><span class="btn-danger rounded">Verify</span></a></td>
                @endif
              </tr>
              @endforeach
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
        <form id="form_add" method="post" action="{{route('add_resident')}}">
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name"  placeholder="Name">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Room Id</label>
              <select id="roomid" name="roomid">
                  <option value=""></option>
                @foreach($rooms as $room)
                  <option value="{{$room->id}}">{{$room->roomnumber}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Moblie</label>
              <input type="number" class="form-control" name="mobile" placeholder="Mobile">
            </div>            
            <div class="form-group">
              <label>Phone</label>
              <input type="number" class="form-control" name="phone" placeholder="Phone">
            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">          
          <button type="button" id="btn_add" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<div class="modal" id="modal_update">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 id="update_title" class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form id="form_update" method="post" action="{{route('update_resident')}}">
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
              <label>Select a resident to update</label>
              <select id="update_id" name="id" placeholder="Select a resident" style="width: 300px;">
                  <option value=""></option>

                @foreach($residents as $one)
                  <option value="{{$one->id}}">{{$one->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input id="update_name" type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input id="update_email" type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Room Number</label>
              <select id="roomid" name="roomid">
                  <option value=""></option>
                @foreach($rooms as $room)
                  <option value="{{$room->id}}">{{$room->roomnumber}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Moblie</label>
              <input id="update_mobile" type="number" class="form-control" name="mobile" placeholder="Mobile">
            </div>            
            <div class="form-group">
              <label>Phone</label>
              <input id="update_phone" type="number" class="form-control" name="phone" placeholder="Phone">
            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">          
          <button type="button" id="btn_update" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
    <div class="modal" id="modal_delete">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Are you sure to delete those residents?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form id="form_delete" method="post" action="{{route('delete_resident')}}">
          <input type="text" id="remove_list" name="remove_list" hidden>
        </form>
        <div class="modal-footer">          
          <button type="button"  data-dismiss="modal" class="btn btn-primary">Close</button>
          <button type="button" id="btn_delete" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>


  <script type="text/javascript">
  function email(uid){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.ajax({
        type: "GET",
        url: "{{route('verifymail')}}",
        data: {id: uid}, // serializes the form's elements.
        success: function(data)
        {
          snackbar(data);
         
          // location.reload();
        },
        error: function (data) {
          
          console.log(data.responseText);
          console.log(data);
        }
      });
 
  }
  $(document).ready(function(){
    $('#li_resident').addClass('active'); 
    $("#update_id").select2();
  });
  $('#update_id').on('change', function (e) {
    <?php foreach ($residents as $resident): ?>
      if({{$resident->id}}==$('#update_id').val()){
        $('#update_name').val('{{$resident->name}}');
        $('#update_email').val('{{$resident->email}}');
        $('#update_phone').val('{{$resident->phone}}');
        $('#update_mobile').val('{{$resident->mobile}}');
        $('#update_room').val('{{$resident->roomid}}'); 
      }      
    <?php endforeach ?>
});
  $('#update_id').on('select2:select',function(){
    alert('123123');
    <?php foreach ($residents as $resident): ?>
      if({{$resident->id}}==$('#update_id').val()){
        $('#update_name').val('{{$resident->name}}');
        $('#update_email').val('{{$resident->email}}');
        $('#update_phone').val('{{$resident->phone}}');
        $('#update_mobile').val('{{$resident->mobile}}');
        $('#update_room').val('{{$resident->roomid}}'); 
      }      
    <?php endforeach ?>

  });
  $(document).on('click','#btn_add',function(){
      var form = $('#form_add');
      var url = form.attr('action');
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      console.log(form.serialize());
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          $('#modal_add').modal('hide');
          location.reload();
        },
        error: function (data) {
          alert('error');
          console.log(data);
        }
      });
  });
  $(document).on('click','#btn_update',function(){
      var form = $('#form_update');
      var url = form.attr('action');
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      console.log(form.serialize());
      $.ajax({
        type: "GET",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          alert(data);
          $('#modal_update').modal('hide');
          location.reload();
        },
        error: function (data) {
          alert('error');
          console.log(data);
        }
      });
  });   
  $(document).on('click','#btn_modal_remove',function(){
    var arr=[];
    if($('input[name="resident[]"]:checked').length>0){
      $('input[name="resident[]"]:checked').each(function(){
        arr.push($(this).val());
      });
      $('#remove_list').val(arr);
      $('#modal_delete').modal('toggle');
    }else{
      snackbar('Select at least one resident to remove.');
    }
  });
  
  $(document).on('click','#btn_delete',function(){

      var form = $('#form_delete');
      var url = form.attr('action');
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      console.log(form.serialize());
      $.ajax({
        type: "GET",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          snackbar(data);
          $('#modal_delete').modal('hide');
          location.reload();
        },
        error: function (data) {
          
          console.log(data.responseText);
          console.log(data);
        }
      });
  });   
</script>
@stop