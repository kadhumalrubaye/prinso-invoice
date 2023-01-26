 <form method="GET" action="{{ route('profits.filterData') }}">
     <label>من :</label>
     <input type="date" name="start_date" class="form-control">
     <label> الى:</label>
     <input type="date" name="end_date" class="form-control">
     <button type="submit" class="btn btn-primary">فلتر</button>

     <a href="{{route('profits.index')}}" class="btn btn-danger m-3">مسح الفلاتر</a>
 </form>