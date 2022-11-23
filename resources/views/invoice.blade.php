@foreach ($invoices as $invoice)



<div class="card" style="width: 18rem;">

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <p>{{$invoice}}</p>
        </li>


    </ul>
</div>


@endforeach