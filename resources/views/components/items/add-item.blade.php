@extends('layouts.master')

@section('content')
<div class="container">
    <h1>اضافة منتج</h1>
    <form method="POST" action="{{route('items.store')}}">

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">اسم المنتح</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> رقم المنتج</label>
            <input type="number" name="item_num" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> الكمية</label>
            <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">سعر البيع</label>
            <input type="number" name="original_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">السعر الاصلي</label>
            <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <!-- <div class="form-group">
            <label for="exampleInputEmail1">السعر الاصلي الكلي</label>
            <input type="number" name="total_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div> -->
        <!-- <div class="form-group">
            <label for="exampleInputEmail1">سعر البيع الكلي</label>
            <input type="number" name="original_totla_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div> -->





        <button type="submit" class="btn btn-primary">اضافة</button>
    </form>
</div>
@endsection