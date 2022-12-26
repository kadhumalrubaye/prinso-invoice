@extends('layouts.master')

@section('content')
<div class="container">

    <h1>تعديل زبون</h1>
    <form method="PUT" action="{{route('customers.update',$customer)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">اسم الزبون</label>
            <input type="text" name="name" value="{{ $customer->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> رقم الهاتف</label>
            <input type="phone" name="phone" value="{{ $customer->phone }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> العنوان</label>
            <input type="address" name="address" value="{{ $customer->address }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>



        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
</div>

</Form:post>
@endsection