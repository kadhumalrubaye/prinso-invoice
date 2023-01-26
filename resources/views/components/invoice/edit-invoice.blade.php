@extends('layouts.master')

@section('content')
<div class="container ">



    <div class="container">
        <div class="row">
            <div class="col-sm">
                <br />
                <h3>
                    <div class="badge bg-secondary fs-0 ">
                        {{$invoice->id}}
                    </div>
                    <br />
                    {{$invoice->created_at}}
                    <br />
                    <br />
                    <br />
                    <hr>
                </h3>
            </div>
        </div>
    </div>

    <form method="post" action="{{route('invoices.update',$invoice)}}">
        @method('patch')
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم الزبون</label>
                        <input value="{{$customer->name}}" type="text" name="customer_name" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> رقم الهاتف</label>
                        <input value="{{$customer->phone}}" type="number" name="customer_phone" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> العنوان</label>
                        <input value="{{$customer->address}}" type="text" name="customer_address" class="form-control" id="customerAddress" aria-describedby="addressHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="category">جهة التوصيل</label>

                        <select class="form-control" name="delivery_agency_id" id="delivery_agency_id">

                            <option value="{{ $invoice_delivery->id }}"><u>[{{ $invoice_delivery->name }}]</u></option>
                            @foreach ($deliveries as $delivery)
                            <option value="{{ $delivery->id }}">{{ $delivery->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm">
                    <label for="exampleInputEmail1"> سعر التوصيل</label>
                    <div class="form-group">
                        <input value="{{$invoice->delivery_price}}" type="number" name="delivery_price" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>


                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> الخصم</label>
                        <input value="{{$invoice->discount}}" type="number" name="discount" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
            </div>
        </div>
        <br />

        <div class="h3">اضافة منتجات</div>
        <div id="table-container">
            @foreach ($items as $item )
            <table class="table  table-bordered " id="item-form">
                <tbody>
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>
                            <div class="form-group">
                                <input type="text" name="items[{{$item->id}}][item_name]" class="form-control  " id="itemName_0" aria-describedby="text" placeholder="اسم المنتج" value="{{$item->item_name}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" name="items[{{$item->id}}][quantity]" class="form-control itemQuantity" id="itemQuantity_0" aria-describedby="text" placeholder="الكمية" value="{{$item->quantity}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </td>
                        <th scope="row">
                            <div class="form-group">

                                <input type="number" name="items[{{$item->id}}][original_price]" class="form-control itemCostPrice " id="itemOrginalPrice_0" aria-describedby="text" placeholder="السعر الكلفة" value="{{$item->original_price}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </th>
                        <!-- <th scope="row">
                total origianl
            </th> -->
                        <td>
                            <div class="form-group-">

                                <input type="number" name="items[{{$item->id}}][price]" class="form-control itemPrice" id="itemPrice_0" aria-describedby="text" placeholder="سعر البيع" value="{{$item->price}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </td>
                        <td>
                            <div id="removeItemBtn" class=" btn btn-danger remove-item">حذف</div>
                        </td>
                        <!-- <td>
                total price
            </td> -->


                    </tr>


                </tbody>
                <tfoot>
                    <tr>


                    </tr>
                </tfoot>
            </table>

            @endforeach
        </div>

        <!-- post items  2-->

        <td>
            <script>

            </script>
            <div id="duplicateItemForm" class="btn btn-primary">

                اضافة
            </div>
            <br />

            <div class="row">
                <div class="col">
                    <div class="form-group">
        <th scope="col"><label for="exampleInputEmail1">السعر الاصلي الكلي </label></th>
        <input type="number" name="total_price" class="form-control" id="invoiceTotalPrice" aria-describedby="text" placeholder="">
        <small id="emailHelp" class="form-text text-muted"></small>
</div>

</div>
<div class="form-group">
    <th scope="col"><label for="exampleInputEmail1">السعر الكلفة الكلي </label></th>
    <input type="number" name="cost_total_price" class="form-control costTotalPrice" id="costTotalPrice" aria-describedby="text" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
</div>
</td>

<div class="form-group">
    <label for="exampleInputEmail1">الملاحضات </label>
    <textarea type="text" name="note" class="form-control" id="exampleInputEmail1" aria-describedby="text" placeholder="">{{$invoice->note}}</textarea>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>

<div class="form-group ">
    <label for="category" class="form-label"> حالة الدفع:</label>
    <span class="lable label-primary font-weight-bold"> {{$invoice->payment_status}}</span>
    <select class="form-control" name="payment_status" id="item_id">
        <option value="no">غير مدفوع</option>
        <option value="yes">مدفوع</option>
    </select>
</div>
<br />

<div class="row">
    <div class="col">
        <button id="formSubmitButton" type="submit" class="btn btn-primary">حفظ</button>
    </div>
    <div class="col d-flex justify-content-end">
        <form method="post" action="{{route('invoices.destroy',$invoice)}}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger ml-auto  ">حذف</button>
        </form>
    </div>
</div>
</form>
</div>
<br />
<br />
@endsection