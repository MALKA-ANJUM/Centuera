<div class="p-2">
    <div class="form_info mb-3">
        <h3>My Orders</h3>
        <div class="d-flex  justify-content-between">
            {{-- Date filters --}}
           <div class="d-flex" style="width: 350px">
                <input type="text" name="from_date" class="form-control datepicker me-2"
                    placeholder="From Date">
                <input type="text" name="to_date" class="form-control datepicker me-2"
                    placeholder="To Date">
           </div>

            {{-- Search --}}
            <div class="d-flex">
                <input type="text" name="search" id="search" class="form-control ms-3 p-0"
                placeholder="Search Order Id or Email">
            <a href="{{ route('user.dashboard', ['tab' => 'orders']) }}" class="btn style-one p-2"><i class="fa-solid fa-rotate-right"></i></a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            
               
            <tbody id="results">
                @include('user.partials.order_rows', ['orders' => $orders])
            </tbody>
        </table>
    </div>
</div>
@push('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
        flatpickr(".datepicker", {
            dateFormat: "d-m-Y",
        });
    // });

//filters add
    function fetchOrders(){
        let search = $('#search').val();
        let from_date = $('input[name="from_date"]').val();
        let to_date = $('input[name="to_date"]').val();

        $.ajax({
            url: "{{route('user.search.order')}}",
            type: 'GET',
            data: {search,from_date,to_date},
            success: function(data){
                $('#results').html(data);
            }
        });
    }
    //live search
    let searching;
    $('#search').on('keyup', function () {
        clearTimeout(searching);
        searching = setTimeout(fetchOrders, 400);
    });
    // filter on date change
    $(document).on('change', '.datepicker', fetchOrders);
});

</script>
@endpush

@push('style')
    <style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-start;
    }

    .rating input {
        display: none;
    }

    .rating label {
        font-size: 2rem;
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s ease;
        padding: 0 5px;
    }

    .rating input:checked ~ label {
        color: #f5b301; /* Gold color for selected stars */
    }

    .rating label:hover,
    .rating label:hover ~ label {
        color: #f5b301;
    }

    </style>
@endpush