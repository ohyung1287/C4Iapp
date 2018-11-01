@extends('layout')
@section('index-content')

 <div class="container card mb-3">
      <div class="card-body">
        <div class="float-right" style="margin-bottom: 5%">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Add</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_update">Update</button>
          <button type="button" class="btn btn-danger">Remove</button>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th></th>
                <th>Room</th>
                <th>Date</th>
                <th>Package Name</th>
                <th>Mailbox</th>
                <th>Mailbox PW</th>
              </tr>
            </thead>
            <tbody>
              @foreach($packages as $one)
              <tr>
                <td><input id="package_{{$one->id}}" type="checkbox" class="form-control" name=""></td>
                <td>{{$one->roomId}}</td>
                <td>{{$one->date}}</td>
                <td>{{$one->packageName}}</td>
                <td>{{$one->mailboxId}}</td>
                <td>{{$one->mailboxPW}}</td>
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
              <input type="number" class="form-control" name="roomid" placeholder="Room Id">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>



@stop
