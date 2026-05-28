<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Taparia Tools | @yield('title')</title>

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/responsive.bootstrap4.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/buttons.bootstrap4.min.css') }}" />
<!-- Select2 -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/select2.min.css') }}" />
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/all.min.css') }}" />
<!-- summernote -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/summernote-bs4.min.css') }}" />
<!-- Theme style -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/adminlte.min.css') }}" />
<style type="text/css">
    /* Center the alert on the screen */
    .alert-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        width: 80%;
        max-width: 600px;
    }

    /* Initially hide the alert */
    .alert {
        display: none;
    }
</style>