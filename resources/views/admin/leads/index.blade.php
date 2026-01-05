@extends('admin.layouts.layout')
@section('title', 'Leads')
@section('content')

<div class="app-content content">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row mb-2">
            <div class="col-12">
                <h2 class="content-header-title">Leads</h2>
            </div>
        </div>
        <div class="content-body">
            <section>
                <div class="card">
                    <div class="card-header border-bottom d-flex align-items-center">
                        <form action="" method="GET" class="d-flex ms-auto">
                            <input type="text" name="search" class="form-control" placeholder="Search by name, email, or phone" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary ms-2"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($leads as $index => $lead)
                                    <tr>
                                        <td>{{ $leads->firstItem() + $index }}</td>
                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->email }}</td>
                                        <td>+{{ $lead->country_code }} {{ $lead->phone }}</td>
                                        <td>
                                            <a href="javascript:void(0)" 
                                            class="btn btn-outline-primary btn-sm viewLead"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#viewLeadModal"
                                             data-lead='@json($lead)'>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No leads found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end mt-2">
                            {{ $leads->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
@push('modal')
<!-- View Modal -->
<div class="modal fade" id="viewLeadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Lead Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>Name: </strong> <span id="leadName"></span></li>
                <li class="list-group-item"><strong>Email: </strong> <span id="leadEmail"></span></li>
                <li class="list-group-item"><strong>Phone: </strong>+<span id="leadCountry"></span> <span id="leadPhone"></span></li>
                <li class="list-group-item"><strong>Type: </strong> <span id="leadType"></span></li>
                <li class="list-group-item" id="leadEnquiryRow">
                    <strong>Enquiry For:</strong> <span id="leadEnquiry"></span>
                </li>
                <li class="list-group-item"><strong>Company: </strong> <span id="leadCompany"></span></li>
                <li class="list-group-item"><strong>Learners: </strong> <span id="leadLearners"></span></li>
            </ul>

        </div>
        </div>
    </div>
</div>
@endpush
@push('script')
<script>
  $(document).on("click", ".viewLead", function () {
        let lead = $(this).data("lead");

        $("#leadName").text(lead.name ?? "-");
        $("#leadEmail").text(lead.email ?? "-");
        $("#leadPhone").text(lead.phone ?? "-");
        $("#leadCountry").text(lead.country_code ?? "-");
        $("#leadType").text(lead.type ?? "-");
        $("#leadCompany").text(lead.company_name ?? "-");
        $("#leadLearners").text(lead.learners ?? "-");

        // Enquiry For - show only if exists
        if (lead.enquiry_for) {
            $("#leadEnquiryRow").show();
            $("#leadEnquiry").text(lead.enquiry_for);
        } else {
            $("#leadEnquiryRow").hide();
        }
    });


</script>
@endpush
