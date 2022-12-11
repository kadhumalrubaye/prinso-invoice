@extends('layouts.app')

@foreach ($delivery as $delivery)



<div class="card" style="width: 18rem;">

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <p>phone number : {{ $delivery->phone}}</p>
        </li>
        <li class="list-group-item">
            <p> name: {{ $delivery->name}}</p>
        </li>

    </ul>
</div>


@endforeach