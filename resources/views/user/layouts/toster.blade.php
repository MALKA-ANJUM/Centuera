<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<style>
    /* Custom Toastr Success */
    #toast-container > .toast-success {
        background-color: #a5d6a7 !important;  /* lighter green */
        color: #000 !important;
        font-size: 16px !important;
        padding: 15px 20px 15px 30px !important;
        border-radius: 8px !important;
    }
    

    /* Close button style */
    #toast-container > .toast-success .toast-close-button {
        color: #000 !important;
        font-size: 20px !important;
        opacity: 0.9 !important;
    }

    #toast-container > .toast-success .toast-close-button:hover {
        opacity: 1 !important;
    }

    /* Align title and message text away from icon */
    #toast-container > .toast-success .toast-title,
    #toast-container > .toast-success .toast-message {
        margin-left: 30px !important;
        display: block;
    }

    #toast-container > .toast-error {
        background-color: #ef9a9a !important;  /* lighter red */
        color: #000 !important;
        font-size: 16px !important;
        padding: 15px 20px 15px 30px !important;
        border-radius: 8px !important;
    }

    #toast-container > .toast-error .toast-close-button {
        color: #000 !important;
        font-size: 20px !important;
        opacity: 0.9 !important;
    }

    #toast-container > .toast-error .toast-close-button:hover {
        opacity: 1 !important;
    }

    #toast-container > .toast-error .toast-title,
    #toast-container > .toast-error .toast-message {
        margin-left: 30px !important;
        display: block;
    }

    /* General Toast sizing */
    #toast-container > div {
        min-width: 300px;
        max-width: 400px;
    }

    /* Remove default toastr built-in icons */
    #toast-container > .toast-success:before,
    #toast-container > .toast-error:before {
        content: none !important;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if (Session::has('success'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "positionClass": "toast-bottom-left",
        };
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "positionClass": "toast-bottom-left",
        };
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif

