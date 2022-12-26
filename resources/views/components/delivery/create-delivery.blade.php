@extends('layouts.master')

@section('content')

<div class="container">
    <h1>اضافة جهة توصيل</h1>
    <form method="POST" action="{{route('deliveries.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">اسم جهة التوصيل</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> رقم الهاتف</label>
            <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>



        <button type="submit" class="btn btn-primary">اضافة</button>
    </form>
</div>
@endsection