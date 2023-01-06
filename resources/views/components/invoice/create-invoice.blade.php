@extends('layouts.master')

@section('content')
<div class="container">



    <div class="container">
        <div class="row">
            <div class="col-sm">
                <br />
                <h3>
                    <div class="badge bg-secondary fs-0 ">
                        @foreach ($id as $i)
                        {{$i->id + 1}}
                        @endforeach
                    </div>


                    <br />
                    {{Carbon\Carbon::now()}}
                    <br />
                    <hr>
                </h3>
            </div>
        </div>
    </div>


    <form method="POST" action="{{route('invoices.store')}}">

        @csrf
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="customerName">اسم الزبون</label>
                        <input type="text" name="customer_name" class="form-control" id="customerName" aria-describedby="customerName">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> رقم الهاتف</label>
                        <input type="number" name="customer_phone" class="form-control" id="customerPhone" aria-describedby="customerPhone">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="address"> العنوان</label>
                        <input type="text" name="customer_address" class="form-control" id="address" aria-describedby="addressHelp">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="category">جهة التوصيل</label>
                        <select class="form-control" name="delivery_agency_id" id="delivery_agency_id">

                            @foreach ($deliveries as $delivery)
                            <option value="{{ $delivery->id }}">{{ $delivery->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm">

                    <label for="deliveryPriceLabel"> سعر التوصيل</label>

                    <div class="form-group">

                        <input type="number" name="delivery_price" class="form-control" id="deliveryPrice" aria-describedby="deliveryPrice">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>


                </div>

                <div class="col-sm">

                    <div class="form-group">
                        <label for="discount"> الخصم</label>

                        <input type="number" name="discount" class="form-control" id="discount" aria-describedby="discount" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>

                </div>
            </div>
        </div>
        <br />

        <div class="h3">اضافة منتجات</div>
        <div id="table-container">
            @include('components.invoice.post-items')
        </div>

        <!-- post items  2-->

        <td>
            <script>

            </script>
            <div id="duplicateItemForm" class="btn btn-primary">

                اضافة
            </div>
            <br />

            <div class="form-group">
        <th scope="col"><label for="exampleInputEmail1">السعر الكلي </label></th>
        <input type="number" name="total_price" class="form-control" id="invoiceTotalPrice" aria-describedby="emailHelp" placeholder="">
        <small id="emailHelp" class="form-text text-muted"></small>
</div>

</td>







<div class="form-group">
    <label for="exampleInputEmail1">الملاحضات </label>
    <textarea type="text" name="note" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=""></textarea>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>

<div class="form-group">
    <label for="category" class="form-label">حالة الدفع</label>
    <select class="form-control" name="payment_status" id="item_id">
        <option value="no">غير مدفوع</option>
        <option value="yes">مدفوع</option>

    </select>
</div>



<button id="formSubmitButton" type="submit" class="btn btn-primary">حفظ</button>
</form>

</div>




@endsection