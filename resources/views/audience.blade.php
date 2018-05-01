@extends('layouts.app')
@extends('layouts.progressBar')
@section('script')

    <script>
        $('#info').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
        $(document).ready(function () {

            $('#btnadd').click(function(e) {
                var x = $('#list1 option:selected');
                $('#list2').append($(x).clone());
                $(x).remove();
                $('#list2 option').prop('selected', true);
                e.preventDefault();
                updateIDs();
            });
            $('#btnremove').click(function (e) {
                var x = $('#list2 option:selected');
                $('#list1').append($(x).clone());
                $(x).remove();
                e.preventDefault();
                updateIDs();
            });
            $('#btnaddall').click(function(e) {
                var x = $('#list1 option');
                $('#list2').append($(x).clone());
                $(x).remove();
                $('#list2 option').prop('selected', true);
                e.preventDefault();
                updateIDs();
            });
            $('#btnremoveall').click(function (e) {
                var x = $('#list2 option');
                $('#list1').append($(x).clone());
                $(x).remove();
                e.preventDefault();
                updateIDs();
            });

        });
        function updateIDs() {
            $('#values').val('');
            $('#list2 option').each(function(index) {
                console.log($(this).val());
                $('#values').val($('#values').val() + $(this).val() + ",");
            });
        }

    </script>
@stop

@section('content')
    <div class="checkout-wrap">
        <ul class="checkout-bar">
            <li class="visited first"><h5>Title & Description</h5></li>
            <li class="active"> <h5>Audience & Channels</h5></li>
            <li class="next"><h5>Attachments</h5></li>
            <li class="next"><h5>SMS & Discounts</h5></li>
            <li class=""><h5>Final FRD</h5></li>
        </ul>
    </div><br><br><br><br>
    <form class="add" method="POST" action="/audience/{{$id}}">@csrf
    <div class="container text-center">
        <div class="jumbotron ">
            <h2>Choose the <strong>Audience</strong> Targeted by this Request</h2><br>
            <div class="container-fluid " id="content">
                <div class="row justify-content-center  animated fadeInLeft  ">
                    <div class="col-md-4 col-lg-4 col-xl-4 col-sm-4 p-4  ">
                        <h5 class="">Available Audience</h5>

                        <select style="height:200px; width: 80%; border-radius: 7px; font-family: Arial, Helvetica, sans-serif; " multiple="" id="list1">
                            @foreach(App\Audience::all() as $audience)
                                <option style="margin-top: 10px; margin-left: 5px; font-family: 'Patua One', cursive;" value="{{$audience->id}}">{{$audience->name}}</option>
                            @endforeach
                        </select>

                        <div class="">
                            <button class="btn btn-success btn-md" id="btnadd">Add</button>
                            <button class="btn btn-success btn-md" id="btnaddall">Add All</button>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 col-xl-4 col-sm-4 p-4  ">
                        <h5 class="">Selected Audience</h5>
                        <select class="" style="height:200px; width: 80%; border-radius: 10px; font-family: Arial, Helvetica, sans-serif;" multiple="" id="list2" name="selectedAudience[]">
                        </select>

                        <button class="btn btn-danger btn-md " id="btnremove">Remove</button>
                        <button class="btn btn-danger btn-md " id="btnremoveall">Remove All</button>
                    </div>
                </div>
            </div>
        </div>
        <a href="/ReqCreate" class="btn btn-primary btn-lg">Back to request</a>
        <button type="submit" class="btn btn-success btn-lg" >Submit</button>
    </div>
    </form>

 @stop

