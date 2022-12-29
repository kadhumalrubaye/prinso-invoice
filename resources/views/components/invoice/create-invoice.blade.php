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
        <div class="form-group">
            <label for="category" class="form-label">المنتجات</label>
            <select class="form-control" name="item_id" id="item_id">

                @foreach ($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="category" class="form-label">حالة الدفع</label>
            <select class="form-control" name="payment_status" id="item_id">


                <option value="yes">yes</option>
                <option value="no">no</option>

            </select>
        </div>
        <div class="form-group">
            <label for="category" class="form-label">جهة التوصيل</label>
            <select class="form-control" name="delivery_agency_id" id="delivery_agency_id">

                @foreach ($deliveries as $delivery)
                <option value="{{ $delivery->id }}">{{ $delivery->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="category" class="form-label">اختر الزبون </label>
            <select class="form-control" name="customer_id" id="customer_id">

                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">اضافة</button>
    </form>
</div>




@endsection