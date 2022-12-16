@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">المنتجات</h3>
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
                            <th>السعر النهائي</th>
                            <th>اسم المنتج</th>
                            <th>العدد</th>
                            <th>السعر الاصلي</th>
                            <th>مجموع السعر الاصلي</th>
                            <th>سعر البيع</th>
                            <th>مجموع سعر البيع</th>
                            <th>نسبة التخفيض</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Chief Executive Officer(CEO)</td>
                            <td>London</td>
                            <td>47</td>
                            <td>2009/10/09<br></td>
                            <td>$1,200,000</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12<br></td>
                            <td>$86,000</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>41</td>
                            <td>2012/10/13<br></td>
                            <td>$132,000</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Software Engineer</td>
                            <td>San Francisco</td>
                            <td>28</td>
                            <td>2011/06/07<br></td>
                            <td>$206,850</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02<br></td>
                            <td>$372,000</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>38</td>
                            <td>2011/05/03<br></td>
                            <td>$163,500</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Pre-Sales Support</td>
                            <td>New York</td>
                            <td>21</td>
                            <td>2011/12/12<br></td>
                            <td>$106,450</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Sales Assistant</td>
                            <td>New York</td>
                            <td>46</td>
                            <td>2011/12/06<br></td>
                            <td>$145,600</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Senior JavaScript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29<br></td>
                            <td>$433,060</td>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
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