@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">ادارة التوصيل</h3>

    <a class="btn btn-primary p-3   m-3" href="{{route('deliveries.create')}}">اضافة</a>

    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">معلومات جهات التوصيل</p>
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
                            <th>رقم الهاتف</th>
                            <th>جهة التوصيل</th>
                            <th>العمليات </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $deliveries as $deliveryEntry)

                        <tr>
                            <td>{{$deliveryEntry->phone}}</td>
                            <td>{{$deliveryEntry->name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('deliveries.destroy',$deliveryEntry->id)}}"> مسح </a>
                                <a href="{{route('deliveries.edit',$deliveryEntry)}}" class="btn btn-primary">تعديل</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>

                        <tr>
                            <td><strong>جهة التوصيل</strong></td>
                            <td><strong>رقم الهاتف</strong></td>
                            <td>
                                العمليات
                            </td>

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

l>
</div>