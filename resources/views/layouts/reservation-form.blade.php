<form action="{{ route('reservation.store') }}" method="post">
    {{ csrf_field() }}
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

    <input type="hidden" name="room_id" value="{{ $room->id }}">
    <input type="hidden" id="price" name="price" value="{{ $room->price }}">
    <input type="hidden" name="total" id="reservation_total" value="123">

    <div id="preview" style="display: none">

        <table class="reservation-table">
            <tbody>
            <tr>
                <td>Day(s)</td>
                <td><span id="reservation_days"></span></td>
            </tr>
            <tr>
                <td>Total</td>
                <td>$<span id="reservation_sum"></span></td>
            </tr>
            </tbody>
        </table>
        <br>
    </div>

    <input type="submit" class="btn btn-primary wide" value="Book Now" style="margin-top: 20px">

</form>

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <script>
        $(function () {
            var price = document.getElementById("price").value;
            $('#reservation_start_date').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                maxDate: '3m',
                onSelect: function (selected) {
                    $('#reservation_end_date').datepicker("option", "minDate", selected);
                }
            });

            $('#reservation_end_date').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                maxDate: '3m',
                onSelect: function (selected) {
                    $('#reservation_start_date').datepicker("option", "maxDate", selected);

                    var start_date = $('#reservation_start_date').datepicker('getDate');
                    var end_date = $(this).datepicker('getDate');
                    var days = (end_date - start_date) / 1000 / 60 / 60 / 24 + 1;
                    var total = days * price;
                    $('#preview').show();
                    $('#reservation_sum').text(total);
                    $('#reservation_days').text(days);
                    $('#reservation_total').val(total);
                }
            });
        })
    </script>
@endsection