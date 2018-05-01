@extends('layouts.app')
@extends('layouts.progressBar')
@section('script')
    <script>
        var init = 1;
        $("#add").click(function () {

            init++;
            //Append a new row of code to the "#items" div
            $("#items").append('<div class="container text-center"><textarea name="Title['+init+']" placeholder="Attachment Description" class="col-lg-auto m-auto"\n' +
                'style="height: 140px; width: 50%;"></textarea><br>\n' +
                '                <input type="file" name="File['+init+']"/></div><br>');
        });
    </script>
@endsection
@section('content')
    <div class="checkout-wrap">
        <ul class="checkout-bar">
            <li class="visited first"><h5>Title & Description</h5></li>
            <li class="previous visited"> <h5>Audience & Channels</h5></li>
            <li class="active"><h5>Attachments</h5></li>
            <li class="next"><h5>SMS & Discounts</h5></li>
            <li class=""><h5>Final FRD</h5></li>
        </ul>
    </div><br><br><br><br>
    <form method="POST" action="/storeAtt/{{$id}}"  enctype="multipart/form-data" >
        @csrf
        <div class="container ">
            <div class="jumbotron ">
                <div class="container text-center">
                    <h2>Add <strong>Attachments</strong> if any</h2>
                    <div class="container text-center"><textarea name="Title[1]" placeholder="Attachment Description" class="col-lg-auto m-auto"
                        style="height: 140px; width: 50%;"></textarea><br>
                        <input type="file" name="File[1]"/></div>
                    <ul class="list-group " id="items" style="margin-top: 25px;"> </ul><!-- where to add the attachment button -->
                        <a href="/channel/{{$id}}" class="btn btn-primary btn-lg">Back to channels</a>
                        <button type="button" class="btn btn-secondary btn-lg" id="add" >Add attachment</button><!-- onclick calls the add function to add the attachment button -->
                    <br>
                </div>
            </div>

            <div class="container text-center">
                <input type="submit" class="btn btn-success btn-lg">
                <a href="/sms/{{$id}}" class="btn btn-danger btn-lg">Skip</a>
            </div>
        </div>
        <br>
    </form>
@endsection


