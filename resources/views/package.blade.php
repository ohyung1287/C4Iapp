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
                <th>Status</th>
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
                @if ($one->status === 1)
                      <td style="color:red;">Unconfirmed</td>
                @else
                      <td style="color:green;">Confirmed Recieved</td>
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
          <h4 class="modal-title">Adding new packge</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <form id="form_add" method="post" action="{{route('add_package')}}">
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
              <label>Room Num</label>
              <select name="roomId">
                  <option value="Select Room"></option>

                @foreach($rooms as $room)
                  <option value="{{$room->id}}">{{$room->roomnumber}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Package Name</label>
              <input type="text" class="form-control" name="packageName" placeholder="Name on Package">
            </div>
            <div class="form-group">
              <label>Package Info</label>
              <input type="text" class="form-control" name="packageInfo" placeholder="Package Info">
            </div>
            <div class="form-group">
              <label>Mailbox</label>
              <select name="mailbox" >
                <option value="Select Avaliable Mailbox"></option>
                @foreach($mailbox as $mbox)
                  <option value="{{$mbox->id}}">{{$mbox->id}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>mailbox PW</label>
              <input type="number" class="form-control" name="mailboxPW">
            </div>
            <div class="form-group">
              <label>Date</label>
              <input type="date" class="form-control" name="date">
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

  <script type="text/javascript">
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
</script>
@stop
