<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    {{-- style --}}
    @include('admin.layouts.style')

    {{-- toastr style --}}
    <link rel="stylesheet" href="{{ asset('massage/toastr/toastr.css') }}">
    {{-- custom style --}}
    <style>
        .select2-container--default .select2-selection--single{
            height: 46px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 36px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            height: 44px !important;
        }
    </style>
    @stack('style')
    @stack('custom_css')
    {{-- <link href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css" rel="stylesheet"> --}}
    {{-- <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <input type="hidden" name="base_url" id="base_url" value="{{ url('/') }}" />

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        {{-- header area --}}
        @include('admin.layouts.header')
        {{-- sidebar area --}}
        @include('admin.layouts.sidebar')
        {{-- main content --}}
        @yield('content')
        {{-- footer --}}
        @include('admin.layouts.footer')

        {{-- javascript --}}
        @include('admin.layouts.script')

    </div>
    {{-- toastr javascript --}}
    <script src="{{ asset('massage/toastr/toastr.js') }}"></script>
    {!! Toastr::message() !!}

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            @endforeach
        @endif
    </script>

    {{-- <script>
        $('#dataTables').DataTable();
    </script> --}}

    {{-- delete sweetalert2 --}}
    {{-- <script>
        $(document).on("click", "#deleteData", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you want to delete?',
            text: "Once Delete, This will be Permanently Delete!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#8bc34a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                window.location.href = link;
            }
        })
    })
    </script> --}}

    {{-- summernote --}}
    {{-- <script>
        $('.summernote').summernote({
            height:200,
        })
        $('.select2').select2()
    </script> --}}

    {{-- custom js area --}}
    @stack('script')

</body>

</html>
