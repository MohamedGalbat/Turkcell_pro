@extends('layouts.app')
@extends('layouts.progressBar')
@section('content')
    <div class="checkout-wrap">
        <ul class="checkout-bar">
            <li class="visited first"><h5>Title & Description</h5></li>
            <li class="previous visited"><h5>Audience & Channels</h5></li>
            <li class="previous visited"><h5>Attachments</h5></li>
            <li class="active"><h5>SMS & Discounts</h5></li>
            <li class=""><h5>Final FRD</h5></li>
        </ul>
    </div><br><br><br><br>
    <form method="POST" action="/discounts/{{$id}}" enctype="multipart/form-data">
        @csrf
        <div class="container ">
            <div class="jumbotron ">
                <a href="/displayAll/{{$id}}" class="btn btn-danger btn-lg" style="float: right">Skip</a>
                <h2><strong>Discounts Prioritization </strong></h2><br>
                <hr>

                <div class="container ">
                    <table class="table table-hover table-bordered table-striped">
                        <tr>
                            <th>Discount Name</th>
                            <th>Discount Code</th>
                            <th>Created By</th>
                            <th>Created At</th>
                        </tr>
                        @foreach($discounts as $discount)
                            @if($discount['status']==1)
                            <tr>
                                <td>{{$discount['discount_name']}}</td><!-- in arrays we can't access this way  -> -->
                                <td>{{$discount['discount_code']}}</td>
                                <td>{{$discount['added_by']}}</td>
                                <td>{{$discount['date']}}</td>
                            </tr>
                            @endif
                        @endforeach

                    </table>
                    <br>
                    <input placeholder="Discount Name" name="name" type="text"
                           class="form-control items_input"><br>
                    <h6 style="color: red">*Only numbers allowed</h6>
                    <input type="number" placeholder="Discount Code" name="code"
                           class="form-control items_input"><br>
                    <a href="/sms/{{$id}}" class="btn btn-primary btn-lg ">Back</a>
                    <input type="submit" class="btn btn-success btn-lg">
                </div>
            </div>

        </div>
    </form>
@stop