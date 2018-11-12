@extends('layout')
@section('index-content')

<div class="container card mb-3">
     <div class="card-body">
       <div class="float-right" style="margin-bottom: 5%">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Add</button>
         <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_update">Update</button>
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>



@stop
