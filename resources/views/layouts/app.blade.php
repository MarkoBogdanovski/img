<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Image Hosting</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <style>
            html, body {
                padding: 0px;
                margin: 0px;
            }
            .hidden {
                display: none !important;
            }
            .las, .laf {
                font-size: 2em;
            }
            .cs-alert {
                width: 60%;
                margin: 5px;
                position: absolute !important;
                top: 0;
                right: 0;
                z-index: 100;
            }
            .is-success {
                background-color: #48c774;
                color: #fff;
            }
            .notification {
                border-radius: 4px;
                padding: 1.25rem 2.5rem 1.25rem 1.5rem;
                position: relative;
            }
            .notification>.delete {
                position: absolute;
                right: .5rem;
                top: .5rem;
            }
            .delete {
                -webkit-appearance: none;
                background-color: rgba(10,10,10,.2);
                border: none;
                border-radius: 290486px;
                cursor: pointer;
                pointer-events: auto;
                display: inline-block;
                flex-grow: 0;
                flex-shrink: 0;
                font-size: 0;
                height: 20px;
                max-height: 20px;
                max-width: 20px;
                min-height: 20px;
                min-width: 20px;
                outline: 0;
                position: relative;
                vertical-align: top;
                width: 20px;
            }
            .delete::before {
                height: 2px;
                width: 50%;
            }
            .delete::after {
                height: 50%;
                width: 2px;
            }
            .delete::after, .delete::before {
                background-color: #fff;
                content: "";
                display: block;
                left: 50%;
                position: absolute;
                top: 50%;
                transform: translateX(-50%) translateY(-50%) rotate(45deg);
                transform-origin: center center;
            }
            .cs-p-1 {
                padding-bottom: .5rem;
                padding-top: .5rem;
                padding-left: 1rem;
                padding-right: 1rem;
            }
        </style>
    </head>
    
    <body>
        <main class="container-fluid">
            @yield('content')
        </main>

        @yield('script')
    </body>
</html>