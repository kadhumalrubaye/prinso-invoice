@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">التقرير </h3>





    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">ادارة التقرير</p>
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



                            <th> التسلسل </th>
                            <th> رقم الفاتورة </th>
                            <th>التاريخ </th>
                            <th>الزبون</th>
                            <th>رقم الهاتف</th>
                            <!-- <th>المنتج</th> -->
                            <th>العنوان</th>
                            <th>جهة التوصيل</th>
                            <th>سعر التوصيل</th>
                            <th>السعر الكلي</th>
                            <th>الملاحظات</th>
                            <th>حالة الدفع</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($data as $report)
                        <tr>
                            <td> {{$report->reporta_id}}</td>

                            <td> {{$report->invoice_id}}</td>
                            <td> {{$report->created_at}}</td>

                            <td>{{$report->customer_name}}</td>
                            <td>{{$report->customer_phone??43434343}}</td>

                            <!-- <td> {{$report->item_name}}</td> -->
                            <td> {{$report->invoice_address}}</td>
                            <td> {{$report->delivery_name}}</td>

                            <td> {{$report->delivery_price}}</td>
                            <td> {{$report->total_price}}</td>
                            <td>
                                {{ Str::limit( $report->note, 10, ' (المزيد ...)')}}
                            </td>
                            <td> {{$report->payment_status}}</td>
                            <td>

                                <div class="btn btn-primary">طباعة</div>
                            </td>


                        </tr>




                        <!-- {{$report->invoice_address}}
                        {{$report->payment_status}}
                        {{$report->delivery_price}}
                        {{$report->invoice_total_price}}
                        {{$report->note}} -->

                        @endforeach


                    </tbody>
                    <tfoot>
                        <!-- <tr>
                            <td>id</td>
                            <td><strong>Name</strong></td>
                            <td><strong>Position</strong></td>
                            <td><strong>Office</strong></td>
                            <td><strong>Age</strong></td>
                            <td><strong>Start date</strong></td>
                            <td><strong>Salary</strong></td>
                            <td>Summary 7</td>
                            <td>Summary 8</td>
                            <td>Summary 9</td>
                        </tr> -->
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

<!-- <form method="POST" action="/submit">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <input type="submit" value="Submit">
</form> -->
@endsection