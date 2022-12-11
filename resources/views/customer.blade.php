@extends('layouts.app')

@section('content')




<table class="table table-bordered " ">
    <thead>
        <tr>
            <th scope=" col">id</th>
    <th scope="col">الأسم</th>
    <th scope="col">موبايل</th>
    <th scope="col">العنوان</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
        <tr>
            <th scope="row">{{ $customer->id}}</th>
            <td>{{ $customer->name}}</td>
            <td>{{ $customer->phone}}</td>
            <td>{{ $customer->address}}</td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection