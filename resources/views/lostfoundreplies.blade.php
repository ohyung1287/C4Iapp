@extends('layout')
@section('index-content')

<div class="container card mb-3">
     <div class="card-body">
       <div class="float-right" style="margin-bottom: 5%">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_reply">Reply</button>
         <button type="button" class="btn btn-danger">Remove</button>
       </div>


         @foreach($topic as $t)
          <h3>{{$t->subject}}</h3>
          <h5>{{$t->message}}</h5>
         @endforeach

       <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
               <th>residentId</th>
               <th>message</th>
               <th>date</th>
             </tr>
           </thead>
           <tbody>
             @foreach($lostFoundReplies as $one)
             <tr>
               <td>{{$one->residentId}}</td>
               <td>{{$one->message}}</td>
               <td>{{$one->date}}</td>
             </tr>
             @endforeach
           </tbody>
         </table>
       </div>
     </div>
 </div>


 <div class="modal" id="modal_reply">
   <div class="modal-dialog">
     <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Reply</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>

       <!-- Modal body -->
       <form id="form_reply" method="post" action="{{route('reply', ['id' => $id])}}">
       <div class="modal-body">
           {{csrf_field()}}

           <input type="hidden" name="topicId"  value="{{$id}}">
           <div class="form-group">
             <label>Res ID</label>
             <input type="number" class="form-control" name="residentId">
           </div>
           <div class="form-group">
             <label>Email address</label>
             <input type="email" class="form-control" name="email" placeholder="Enter email">
           </div>
           <div class="form-group">
             <label>Message</label>
             <br>
               <textarea class="form-control" style="min-width: 100%" name="message"></textarea>
           </div>

       </div>
       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" id="btn_reply" class="btn btn-primary">Submit</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
       </form>
     </div>
   </div>
 </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script type="text/javascript">

$(document).on('click','#btn_reply',function(){
    var form = $('#form_reply');
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
        $('#modal_reply').modal('hide');
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
