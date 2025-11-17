<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $orders->orderId }}</title>
    <style>
        body {font-family: Calibri; }
        .badge { display: inline-block; padding: 5px 10px; border-radius: 4px; font-size: 11px; }
        .bg-warning { background: #ffc107; color: #000; }
        .bg-success { background: #28a745; color: #fff; }
        .bg-danger { background: #dc3545; color: #fff; }
        .row { display: flex; flex-wrap: wrap; margin: -5px; }
        .col { flex: 1; padding: 5px; }
        .box { padding: 10px; border: 1px solid #ddd; border-radius: 4px; margin-bottom: 5px; }
        table { border-collapse: collapse;width: 100%; }
        thead {background-color: rgba(0, 132, 255, 0.757); color: #FFFFFF;}
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 8px; text-align: left; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <section style="width:100%; height:10%;">
        <div style="display:inline-block;  height:100%;">
            <h3 style="margin-bottom:0px;">CENTUERA</h3>
            <div> Phone no.: +17139009707<br>
                Email: support@centuera.com<br>
            </div>
        </div>
        <div class="bdsimg" style="display:inline-block; float: right; width:30%; height:100%">
            <img src="{{ public_path('frontend-assets/img/logo/logo.png') }}" alt="logo" style="height:80%;">
        </div>
    </section>
    <section>
        <div style="text-align: center;">
            <h2 style="color:rgb(0, 132, 255) ">INVOICE</h2>
        </div>
    </section>
    <section style="width:100%; height:10%;">
        <div style="display:inline-block; height:100%;">
            <div><strong>Customer : </strong>
                    {{ $orders->fullname }}<br>
                <strong>Phone :</strong> +{{ $orders->country_code }} {{ $orders->phone }} <br>
                <strong>Email :</strong> {{ $orders->email }}
            </div>
        </div>
        <div class="bdsimg" style="display:inline-block; float: right;  width:30%; height:100%">
            <strong>Order # : {{$orders->orderId}}</strong><br>
            <strong>Order Date: {{ $orders->created_at->format('d M Y') }}</strong><br>
        </div>
    </section>

    <h3 style="margin-bottom:5px;text-align:center;">Courses</h3>
    <section style=" margin-bottom:40px;margin-bottom: 0px">
        <table style="width:100%;">
            <thead>
                <th style="text-align: left;">Sl.No.</th>
                <th style="text-align: left;">Course Title</th>
                <th style="text-align: left;">Workshop<br>Start Date</th>
                <th style="text-align: left;">Workshop<br>End Date</th>
                <th style="text-align: left;">Amount</th>
            </thead>
            <tbody>
                @if($orders->courses && is_array($orders->courses))
                    @foreach($orders->courses as $index => $courseId)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \App\Models\Course::find($courseId)->title ?? 'N/A' }}</td>
                            @if($index == 0)
                                <td rowspan="{{ count($orders->courses) }}">
                                    {{ $orders->workshop_start_date ? \Carbon\Carbon::parse($orders->workshop_start_date)->format('d M Y') : '-' }}
                                </td>
                                <td rowspan="{{ count($orders->courses) }}">
                                    {{ $orders->workshop_end_date ? \Carbon\Carbon::parse($orders->workshop_end_date)->format('d M Y') : '-' }}
                                </td>
                                <td rowspan="{{ count($orders->courses) }}">
                                    {{ number_format($orders->total_amount, 2) }} {{ $orders->currency }}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="text-align:center; color: gray;">No courses found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </section><br>

    <section style="margin-top: 5px;">
         {{-- <h3 style="margin-bottom:5px">Payment Information</h3> --}}
        <div class="row">
            {{-- <div class="col">
                <div class="box">
                    <strong>Amount</strong><br>
                    {{ number_format($orders->total_amount, 2) }} {{ $orders->currency }}
                </div>
            </div> --}}
            {{-- <div class="col">
                <div class="box">
                    <strong>Status</strong><br>
                    <span class="badge 
                        @if($orders->status == 'pending') bg-warning
                        @elseif($orders->status == 'paid') bg-success
                        @elseif($orders->status == 'cancelled') bg-danger
                        @endif">
                        {{ ucfirst($orders->status) }}
                    </span>
                </div>
            </div> --}}
            <div class="col">
                <div class="">
                    <strong>Transaction ID :</strong>
                    {{ $orders->transaction_id ?? '-' }}
                </div>
            </div>
        </div>
    </section>

    <section style="width:100%; margin-top:0px;">
        <div style="display:inline-block; float: left; width:40%">
            <br><br>
            <div style="text-align:left">
                <h4 style="margin-bottom:0px">Notice</h4>
                <p class="text-left">
                    Consulting is a dynamic and multifaceted field that involves providing expert advice and guidance to individuals,
                </p>
            </div>
        </div>
        <div style="display:inline-block; float: right; width:50%">
            <br><br>
            <div class="sign-img" style="text-align:right">
                <img src="" alt="img" width="250px">
                <p class="text-right">Authorized Signature</p>
            </div>
        </div>
    </section>
        <br><br>
    {{-- <div class="card-footer text-center" style="clear: both">
            Copyright @ 2014-2025 Centura America's Inc All Rights Reserved.
    </div> --}}
</body>
</html>