@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">المنتجات</h3>


    <a class="btn btn-primary p-3   m-3" href="{{url('/items/create')}}">اضافة</a>


    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">ادارة المنتجات</p>
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
                            <th>id</th>
                            <th>اسم المنتج</th>
                            <th>العدد</th>
                            <th>السعر الاصلي</th>
                            <th>سعر البيع</th>

                            <!-- <th>السعر النهائي</th> -->
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->item_name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>د.ع{{$item->original_price}} </td>
                            <td>د.ع{{$item->price}}</td>


                            <!-- <td>د.ع {{$item->final_price}}</td> -->
                            <td>
                                <a class="btn btn-primary" href="{{route('items.destroy',$item->id)}}"> مسح </a>
                                <a href="{{route('items.edit',$item)}}" class="btn btn-primary">تعديل</a>
                            </td>
                            <!-- <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td> -->
                        </tr>
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