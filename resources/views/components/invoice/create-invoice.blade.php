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
                        <label for="exampleInputEmail1">اسم الزبون</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> رقم الهاتف</label>
                        <input type="phone" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> العنوان</label>
                        <input type="address" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
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

                    <label for="exampleInputEmail1"> سعر التوصيل</label>

                    <div class="form-group">

                        <input type="number" name="delivery_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>


                </div>

                <div class="col-sm">

                    <div class="form-group">
                        <label for="exampleInputEmail1"> الخصم</label>

                        <input type="number" name="discount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>

                </div>
            </div>
        </div>
        <br />


        <!-- <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم المنتح</label>
                        <input type="text" name="item_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> رقم المنتج</label>
                        <input type="number" name="item_num" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> الكمية</label>
                        <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">سعر البيع</label>
                        <input type="number" name="original_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">السعر الاصلي</label>
                        <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">نسبة التخفيض </label>
                        <input type="number" name="discount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">العنوان </label>
                        <input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> سعر التوصيل</label>
                        <input type="number" name="delivery_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">السعر النهائي</label>
                        <input type="number" name="total_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <hr class="py-1"> -->
        <!-- post items  -->
        <div id="table-container">
            <table class="table  table-bordered " id="item-form">

                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><label for="exampleInputEmail1">اسم المنتح</label></th>
                        <!-- <th scope="col"><label for="exampleInputEmail1"> رقم المنتج</label></th> -->
                        <th scope="col"> <label for="exampleInputEmail1"> الكمية</label></th>
                        <th scope="col"> <label for="exampleInputEmail1">سعر البيع</label></th>
                        <th scope="col"> <label for="exampleInputEmail1">السعر الاصلي</label></th>

                        <!-- <th scope="col"><label for="exampleInputEmail1">العنوان </label></th> -->
                        <!-- <th scope="col"><label for="exampleInputEmail1">السعر الكلي </label></th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <div class="form-group">

                                <input type="text" name="item_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </td>
                        <!-- <td>
                            <div class="form-group">

                                <input type="number" name="item_num" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </td> -->
                        <td>
                            <div class="form-group">

                                <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </td>
                        <th scope="row">
                            <div class="form-group">

                                <input type="number" name="original_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </th>
                        <td>
                            <div class="form-group">

                                <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </td>

                        <!-- <td>
                            <div class="form-group">

                                <input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </td> -->


                    </tr>


                </tbody>
                <tfoot>
                    <tr>


                    </tr>
                </tfoot>
            </table>

        </div>
        <!-- end post itmes -->

        <td>
            <script>
                function duplicateAddNewItemForm() {

                    var form = document.getElementById('item-form');
                    var container = document.getElementById('table-container');

                    var form2 = form.cloneNode(true);
                    form2.id = 'form2';
                    container.appendChild(form2);
                }
            </script>
            <div class="btn btn-primary" onclick="duplicateAddNewItemForm()">

                اضافة
            </div>
            <br />

            <div class="form-group">
        <th scope="col"><label for="exampleInputEmail1">السعر الكلي </label></th>
        <input type="number" name="total_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        <small id="emailHelp" class="form-text text-muted"></small>
</div>

</td>





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







<div class="form-group">
    <label for="exampleInputEmail1">الملاحضات </label>
    <textarea type="text" name="note" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=""></textarea>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<!-- <div class="form-group">
            <label for="category" class="form-label">المنتجات</label>
            <select class="form-control" name="item_id" id="item_id">

                @foreach ($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div> -->
<div class="form-group">
    <label for="category" class="form-label">حالة الدفع</label>
    <select class="form-control" name="payment_status" id="item_id">
        <option value="no">غير مدفوع</option>
        <option value="yes">مدفوع</option>

    </select>
</div>

<!-- <div class="form-group">
            <label for="category" class="form-label">اختر الزبون </label>
            <select class="form-control" name="customer_id" id="customer_id">

                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div> -->


<button type="submit" class="btn btn-primary">حفظ</button>
</form>

</div>




@endsection