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
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 
<style type="text/css">
    .catalog-status-toggle {
        position: relative;
        display: inline-block;
        width: 42px;
        height: 24px;
        padding: 0;
        border: 0;
        border-radius: 999px;
        vertical-align: middle;
        cursor: pointer;
        transition: background-color .2s ease;
    }

    .catalog-status-toggle.is-active {
        background-color: #28a745;
    }

    .catalog-status-toggle.is-inactive {
        background-color: #dc3545;
    }

    .catalog-status-toggle .toggle-knob {
        position: absolute;
        top: 3px;
        left: 3px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #fff;
        transition: transform .2s ease;
    }

    .catalog-status-toggle.is-active .toggle-knob {
        transform: translateX(18px);
    }

    .catalog-status-toggle:focus-visible {
        outline: 2px solid #007bff;
        outline-offset: 2px;
    }

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
