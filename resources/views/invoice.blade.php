@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">ادارة الفواتير</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Employee Info</p>
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
                            <th>الزبون</th>
                            <th>المنتج</th>
                            <th>العنوان</th>
                            <th>جهة التوصيل</th>
                            <th>حالة الدفع</th>
                            <th>سعر التوصيل</th>
                            <th>السعر الكلي</th>
                            <th>الملاحظات</th>
                            <th>طباعة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                            <td>Accountant</td>
                            <td>بغداد - السيدية</td>
                            <td>شركة البسيط</td>
                            <td>تم</td>
                            <td>$162,700</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                            <td>Chief Executive Officer(CEO)</td>
                            <td>ديالى - حمرين</td>
                            <td>شركة البسيط</td>
                            <td>انتظار<br></td>
                            <td>$1,200,000</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar3.jpeg">Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>العمارة - الحمزة</td>
                            <td>محمد</td>
                            <td>الغاء<br></td>
                            <td>$86,000</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar4.jpeg">Bradley Greer</td>
                            <td>Software Engineer</td>
                            <td>بغداد - اليرموك</td>
                            <td>شركة البسيط</td>
                            <td>انتظار<br></td>
                            <td>$132,000</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar5.jpeg">Brenden Wagner</td>
                            <td>Software Engineer</td>
                            <td>بغداد - البلديات</td>
                            <td>شركة البسيط</td>
                            <td>تم<br></td>
                            <td>$206,850</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>بغداد - الحسينية</td>
                            <td>محمد</td>
                            <td>تم<br></td>
                            <td>$372,000</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Bruno Nash<br></td>
                            <td>Software Engineer</td>
                            <td>ديالى - شهربان</td>
                            <td>محمد</td>
                            <td>تم<br></td>
                            <td>$163,500</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar3.jpeg">Caesar Vance</td>
                            <td>Pre-Sales Support</td>
                            <td>ديالى - خانقين</td>
                            <td>شركة البسيط</td>
                            <td>الغاء<br></td>
                            <td>$106,450</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar4.jpeg">Cara Stevens</td>
                            <td>Sales Assistant</td>
                            <td>ديالى - بلدروز</td>
                            <td>شركة البسيط</td>
                            <td>انتظار<br></td>
                            <td>$145,600</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar5.jpeg">Cedric Kelly</td>
                            <td>Senior JavaScript Developer</td>
                            <td>ديالى - خالص</td>
                            <td>محمد</td>
                            <td>الغاء<br></td>
                            <td>$433,060</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td><i class="fas fa-print" style="color: var(--bs-red);font-size: 36px;"></i></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td><strong>Position</strong></td>
                            <td><strong>العنوان</strong></td>
                            <td><strong>جهة التوصيل</strong></td>
                            <td><strong>حالة الدفع</strong></td>
                            <td><strong>Salary</strong></td>
                            <td>Summary 7</td>
                            <td>Summary 8</td>
                            <td>Summary 9</td>
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