@extends('layouts.master')

@section('content')
<div class="container">

    <h1>اضافة فاتورة</h1>

    <form method="POST" action="{{route('invoices.store')}}">

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">العنوان </label>
            <input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> سعر التوصيل</label>
            <input type="number" name="delivery_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">السعر السعر النهائي</label>
            <input type="number" name="total_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">الملاحضات </label>
            <input type="text" name="note" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>


        <button type="submit" class="btn btn-primary">اضافة</button>
    </form>
</div>
@endsection