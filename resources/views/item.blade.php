@foreach ($items as $item)



<div class="card" style="width: 18rem;">

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <p> {{ $item}}</p>
        </li>


    </ul>
</div>


@endforeach