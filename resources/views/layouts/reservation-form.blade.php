<form action="">
    <div class="row">
        <div class="col-md-12 price_tag">
            <span>{{ $room->price }}</span>
            <span class="pull-right">Per Night</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Check In</label>
            <input type="text" id="reservation_start_date" name="start_date" class="form-control"
                   placeholder="Start date">
        </div>
        <div class="col-md-6">
            <label>Check Out</label>
            <input type="text" id="reservation_end_date" name="end_date" class="form-control" placeholder="End date">
        </div>
    </div>

    <input type="submit" class="btn btn-primary wide" value="Book Now" style="margin-top: 20px">

</form>

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $('#reservation_start_date').datepicker({
                dateFormat: 'dd-mm-yy',
                minDate: 0,
                maxDate: '3m',
            });

            $('#reservation_end_date').datepicker({
                dateFormat: 'dd-mm-yy',
                minDate: 0,
                maxDate: '3m',
            });
        })
    </script>
@endsection