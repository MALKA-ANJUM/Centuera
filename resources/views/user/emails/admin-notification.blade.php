<!DOCTYPE html>
<html>
<head>
    <title>Test Email</title>
</head>
<body>
    {{--Heading start --}}
    @if(isset($details['mobile']))
        <h2>Contact</h2>
    @endif
    @if(isset($details['phone']))
        <h2>Request-Callback</h2>
    @endif
    @if(!empty($details['learners']))
        <h2>Leads</h2>
    @endif
    {{--Heading End --}}

    <h3>Name : {{ $details['name'] }}</h3>
    <h4>Email : {{ $details['email'] }}</h4>

    @if(isset($details['mobile']))
        <h4>Mobile : {{ $details['mobile'] }}</h4>
    @endif

    @if(isset($details['phone']))
        <h4>Mobile : +{{ $details['country_code'] }} {{ $details['phone'] }}</h4>
    @endif

    @if(isset($details['type']))
        <h4>Type : {{ $details['type'] }} </h4>
    @endif

    @if(!empty($details['course']))
        <h4>Course : {{ $details['course'] }}</h4>
    @endif

    @if(!empty($details['company_name']))
        <h4>Company Name : {{ $details['company_name'] }}</h4>
    @endif
    @if(!empty($details['learners']))
        <h4>Learners : {{ $details['learners'] }}</h4>
    @endif
    
    @if(!empty($details['message']))
        <h4>Message : {{ $details['message'] }}</h4>
    @endif
</body>
</html>
