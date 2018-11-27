@extends('layout')
@section('index-content')

    <div class="container card mb-3">
        <div class="card-body">
            <div class="float-right" style="margin-bottom: 5%">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Add</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_search">Search</button>
            </div>
            {{--model display current visitors--}}
            <div class="table-responsive" id="currentContent">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Room Number</th>
                        <th>Time_In</th>
                        <th>Last_Time</th>
                    </tr>
                    </thead>
                    <tbody id="dataTable">
                    @foreach($visitors as $one)
                        <tr>
                            <td>{{$one->name}}</td>
                            <td>{{$one->email}}</td>
                            <td>{{$one->phone}}</td>
                            <td>{{$one->roomNumber}}</td>
                            <td>{{$one->created_at}}</td>
                            <td>{{$one->last_time}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    {{--model_add--}}
    <div class="modal" id="modal_add">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Adding a new visitor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form id="form_add" method="post" action="{{route('add_visitor')}}">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Room Number:</label>
                            <select id="roomid" name="roomid">
                                <option value="please select">please select</option>
                                @foreach($rooms as $room)
                                    <option value="{{$room->id}}">{{$room->roomnumber}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name"  placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Phone:</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone">
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

    {{--model search--}}
    <div class="modal" id="modal_search">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Search</h4>
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                </div>
                <!-- Modal body -->
                <form id="form_search" method="post" action="{{route('search_visitor')}}">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>How you want to search?</label>
                            <select class="form-control" name="searchBy">
                                <option>name</option>
                                <option>email</option>
                                <option>phone</option>
                                <option>date</option>
                            </select>
                            <br>
                            <input id="searchKey" type="text" class="form-control" name="searchKey" placeholder="Enter Key words here">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="btn_search" class="btn btn-primary">Search</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#li_visitor').addClass('active');
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
            data: form.serialize(),
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
    $(document).on('click','#btn_search',function(){
        var form = $('#form_search');
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
            data: form.serialize(),
            success: function(data)
            {
                $('#modal_search').modal('hide');

                var string ="";
                for(var i=0;i<data.length;i++){
                    string+= "<tr>";
                    jQuery.each(data[i],function(){
                        string+="<td>"+this+"</td>";
                    });
                    string+= "</tr>";
                }
                $('#dataTable').html(string);
                
            },
            error: function (data) {
                alert('error');
                console.log(data);
            }
        });
        });
</script>

@stop