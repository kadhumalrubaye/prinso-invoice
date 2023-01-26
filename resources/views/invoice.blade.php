@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">ادارة الفواتير</h3>
    <a class="btn btn-primary p-3   m-3" href="{{url('/invoices/create')}}">اضافة</a>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">معلومات الفواتير</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                <option value="10" selected="">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>&nbsp;</label></div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>
                                <a href="{{ url()->current() . '?sortBy=id' }}">رقم الفاتورة</a>
                            </th>
                            <th> <a href="{{ url()->current() . '?sortBy=customer_id' }}">الزبون </a></th>
                            <th> <a href="{{ url()->current() . '?sortBy=id' }}">المنتج </a></th>
                            <th> <a href="{{ url()->current() . '?sortBy=location' }}">العنوان </a></th>
                            <th> <a href="{{ url()->current() . '?sortBy=delivery_agency_id' }}">جهة التوصيل</a></th>
                            <th> <a href="{{ url()->current() . '?sortBy=payment_status' }}">حالة الدفع</a></th>
                            <th> <a href="{{ url()->current() . '?sortBy=delivery_price' }}">سعر التوصيل</a></th>
                            <th> <a href="{{ url()->current() . '?sortBy=total_price' }}">السعر الكلي</a></th>



                            <th>الملاحظات</th>
                            <th> <a href="{{ url()->current() . '?sortBy=created_at' }}">تاريخ الانشاء</a></th>

                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($invoices as $invoice)

                        <tr>
                            <td>{{$invoice->id }}</td>
                            <td>

                                {{$invoice->customer->name }}
                            </td>
                            <td>
                                <select class="form-control" name="delivery_agency_id" id="delivery_agency_id">

                                    @foreach ($invoice->items as $item)
                                    <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
                                    @endforeach
                                </select>
                            </td>


                            <td>{{$invoice->location}}</td>
                            <td>

                                {{$invoice->delivery_agency->name}}

                            </td>
                            <td>{{$invoice->payment_status}}</td>
                            <td>{{$invoice->delivery_price}}</td>
                            <td>{{$invoice->total_price}}</td>
                            <td>{{
                                Str::limit(  $invoice->note, 20, ' (المزيد ...)')
                                
                            }}
                            </td>
                            <td>
                                {{$invoice->created_at->format('Y-m-d');}}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('invoices.edit', $invoice)}}"> تعديل</a>
                                <form method="post" action="{{route('invoices.destroy',$invoice)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger m-1 "> حذف</button>
                                </form>
                            </td>
                            <!-- <td>$162,700</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td> -->
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <!-- <th>الزبون</th>
                            <th>المنتج</th>
                            <th>العنوان</th>
                            <th>جهة التوصيل</th>
                            <th>حالة الدفع</th>
                            <th>سعر التوصيل</th>
                            <th>السعر الكلي</th>
                            <th>الملاحظات</th>
                            <th>طباعة</th> -->
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection