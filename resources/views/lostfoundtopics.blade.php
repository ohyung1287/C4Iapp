@extends('layout')
@section('index-content')

 <div class="container card mb-3">
      <div class="card-body">
        <div class="float-right" style="margin-bottom: 5%">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Add</button>
          <button type="button" class="btn btn-danger">Remove</button>

        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>subject</th>
                <th>message</th>
                <th>date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lostFoundTopics as $one)
              <tr>
                <td><a  href="{{route('LostFoundReplys', ['id' => $one->id])}}">{{$one->subject}}</a></td>
                <td>{{$one->message}}</td>
                <td>{{$one->date}}</td>
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
          <h4 class="modal-title">Add new Topic</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <form id="form_add" method="post" action="{{route('add_topic')}}">
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
              <label>Res ID</label>
              <input type="number" class="form-control" name="residentId">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Subject</label>
              <input type="text" class="form-control" name="subject"  placeholder="Lost/Found: ???">
            </div>
            <div class="form-group">
              <label>Message</label>
              <br>
                <textarea class="form-control" style="min-width: 100%" name="message"></textarea>
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
