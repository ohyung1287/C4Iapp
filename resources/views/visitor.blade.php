
@extends('layout')
@section('index-content')

    <div class="container card mb-3">
        <div class="card-body">
            <div class="float-right" style="margin-bottom: 5%">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Add</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_search">Search</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Room Number</th>
                        <th>Time_in</th>
                        <th>Time_out</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($visitors as $one)
                        <tr>
                            <td>{{$one->name}}</td>
                            <td>{{$one->email}}</td>
                            <td>{{$one->phone}}</td>
                            <td>{{$one->roomNumber}}</td>
                            <td>{{$one->time_in}}</td>
                            <td>{{$one->time_out}}</td>
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
                    <h4 class="modal-title">Adding new visitor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form id="form_add" method="post" action="{{route('addVisitor')}}">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control" name="phone" placeholder="Room Id">
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
                            <label>Time_in</label>
                            <input type="text" class="form-control" name="time_in" placeholder="time_in">
                        </div>
                        <div class="form-group">
                            <label>Time_out</label>
                            <input type="text" class="form-control" name="time_out" placeholder="time_out">
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
    <div class="modal" id="modal_search">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Search</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form id="form_add" method="post" action="{{route('add_resident')}}">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>How you want to search?</label>
                            <select class="form-control" name="search">
                                <option>By Name</option>
                                <option>By Email</option>
                                <option>By Phone</option>
                                <option>By Date</option>
                            </select>
                            <br>
                            <input id="update_name" type="text" class="form-control" name="name" placeholder="Enter here">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="btn_add" class="btn btn-primary">Search</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>


@stop