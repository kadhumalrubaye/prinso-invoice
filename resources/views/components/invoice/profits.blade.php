@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4"> تقرير الارباح</h3>

    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>المبلغ المستحصل</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{$profits}}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>تم الدفع</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{$payed}}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span style="color: var(--bs-danger);">لم يتم الدفع</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{$notPayed}}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>عدد التقارير</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{$total}}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="row">
            <div class="col">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">اختار التاريخ </p>
                </div>
            </div>
            <div class="col">@include('components.datetime_picker')</div>
            <div class="col"></div>
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
                            <th>رقم الفاتورة</th>
                            <th>حالة الدفع</th>
                            <th>سعر التوصيل</th>
                            <th>السعر الكلي</th>
                            <th>تاريخ الانشاء</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($invoices as $invoice)

                        <tr>
                            <td>{{$invoice->id }}</td>
                            <td>{{$invoice->payment_status}}</td>
                            <td>{{$invoice->delivery_price}}</td>
                            <td>{{$invoice->total_price}}</td>
                            <td>
                                {{$invoice->created_at}}
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