@extends('admin.layouts.layout')
@section('title', 'Ratings')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">@lang('Ratings')</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="ajax-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                </div>
                                <div class="card-datatable table-responsive">
                                    <table class="datatables-ajax table table-hover">
                                        <thead>
                                            <tr>
                                                <th>@lang('#')</th>
                                                <th>@lang('Date')</th>
                                                <th>@lang('User')</th>
                                                <th>@lang('Course')</th>
                                                <th>@lang('Rating')</th>
                                                <th>@lang('Review')</th>
                                                <th>@lang('Approval Status')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ratings as $index => $rating)
                                            <tr>
                                                <td>{{ $ratings->firstItem() + $index }}</td>
                                                <td>{{ ($rating->created_at)->format('d-m-Y') }}</td>
                                                <td>{{ $rating->getUser->first_name }}</td>
                                                <td>{{ $rating->getCourse->title }}</td>
                                                <td>{{ $rating->rating }}</td>
                                                <td>
                                                    <i class="fa fa-eye text-primary view-review" 
                                                    style="cursor:pointer;" 
                                                    data-review="{{ $rating->review }}"></i>
                                                </td>
                                               <td>
    <div class="form-check form-switch">
        <input class="form-check-input approve-rating" 
               type="checkbox" 
               role="switch" 
               data-id="{{ $rating->id }}" 
               {{ $rating->approved ? 'checked' : '' }}>
    </div>
</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if (count($ratings) > 0)
                                        {{ $ratings->links('pagination::bootstrap-5') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@push('modal')
    <!-- Review Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="reviewModalLabel">Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="reviewText">
            <!-- Review will appear here -->
        </div>
        </div>
    </div>
    </div>
@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function () {
    $('.view-review').on('click', function () {
        let review = $(this).data('review') || 'No review available';
        $('#reviewText').text(review);
        $('#reviewModal').modal('show');
    });
});
</script>

<script>
    $(document).ready(function () {
        $('.approve-rating').on('change', function () {
            let ratingId = $(this).data('id');
            let approved = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('admin.approve.status') }}", // ✅ match route name
                type: "POST",
                data: {
                    id: ratingId,
                    approved: approved,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Rating approval updated!',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong!'
                    });
                }
            });
        });

        // Review Modal
        $('.view-review').on('click', function () {
            let review = $(this).data('review') || 'No review available';
            $('#reviewText').text(review);
            $('#reviewModal').modal('show');
        });
    });
</script>

@endpush



