@extends('layouts.master')

@section('content')
<div class="container">
    <h1>اضافة زبون</h1>
    <form method="POST" action="{{route('customers.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">اسم الزبون</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> رقم الهاتف</label>
            <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> العنوان</label>
            <input type="address" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>



        <button type="submit" class="btn btn-primary">اضافة</button>
    </form>
</div>

</Form:post>
@endsection