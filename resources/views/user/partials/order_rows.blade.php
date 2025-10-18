@forelse($orders as $index => $order)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>#{{ $order->orderId }}</td>
        <td>{{ $order->created_at->format('d M Y') }}</td>
        <td>
            @if($order->status == 'pending')
                <span class="badge bg-warning text-dark">Pending</span>
            @elseif($order->status == 'paid')
                <span class="badge bg-success">Paid</span>
            @elseif($order->status == 'cancelled')
                <span class="badge bg-danger">Cancelled</span>
            @endif
        </td>
        <td>{{$order->currency}} {{ number_format($order->total_amount, 2) }}</td>
        <td class="d-flex">
            <a href="{{route('user.view.order', $order->id)}}" class="btn style-two mx-2 p-2"><i class="fa fa-eye"></i></a>
            <a href="{{ route('user.order.invoice', $order->id) }}" class="btn style-two mx-2 p-2"><i class="fa fa-download"></i></a>
            <a href="javascript(void);" class="btn style-two mx-2 p-2" data-id="{{ $order->id }}" data-bs-toggle="modal" data-bs-target="#reviewModal">
                <i class="fa fa-star"></i> Review & Rating
            </a>
            <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reviewModalLabel">Leave a Review</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @php 
                            $courses = App\Models\Course::whereIn('id', $order->courses)->get();
                        @endphp
                        <form action="{{ route('user.add.review.ratings') }}" method="post">
                            @csrf
                                <div class="modal-body p-4">
                                <!-- Select Course -->
                                <div class="mb-3">
                                    <label for="course_id" class="form-label mb-0">Course:</label>
                                    <select name="course_id" id="course_id" class="form-control">
                                        <option value="">Select Course</option>
                                        @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 d-flex justify-content-between">
                                    <label class="form-label mb-0">Rating:</label>
                                    <div class="rating">
                                        <input type="radio" name="rating" id="star5" value="5">
                                        <label for="star5" title="5 stars">&#9733;</label>
                                        <input type="radio" name="rating" id="star4" value="4">
                                        <label for="star4" title="4 stars">&#9733;</label>
                                        <input type="radio" name="rating" id="star3" value="3">
                                        <label for="star3" title="3 stars">&#9733;</label>
                                        <input type="radio" name="rating" id="star2" value="2">
                                        <label for="star2" title="2 stars">&#9733;</label>
                                        <input type="radio" name="rating" id="star1" value="1">
                                        <label for="star1" title="1 star">&#9733;</label>
                                    </div>
                                </div>


                                <!-- Review -->
                                <div class="mb-3">
                                    <label for="review" class="form-label mb-0">Your Review:</label>
                                    <textarea id="review" class="form-control" name="review"></textarea>
                                </div>
                            
                                <button type="submit" class="btn style-one">Submit</button>
                            </div>
                        </form>

                    
                    </div>
                </div>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center text-muted">No orders found.</td>
    </tr>
@endforelse