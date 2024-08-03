<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"--}}
        {{--integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="--}}
        {{--crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
<!-- jQuery -->
<script src="{{asset('assets/admin/')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/admin/')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
@if(session('lang')=='ar')
    <!-- Bootstrap 4 rtl -->
    <script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.min.js"></script>
    <!-- Bootstrap 4 -->
@endif
<script src="{{asset('assets/admin/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('assets/admin/')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('assets/admin/')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('assets/admin/')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/admin/')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/admin/')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/admin/')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('assets/admin/')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/admin/')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('assets/admin/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('assets/admin/')}}/dist/js/adminlte.js"></script>
<!-- SweetAlert2 -->
<script src="{{asset('assets/admin/')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{asset('assets/admin/')}}/plugins/toastr/toastr.min.js"></script>

<!-- jquery-validation -->
<script src="{{asset('assets/admin/')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{asset('assets/admin/')}}/dist/js/demo.js"></script>--}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/admin/')}}/dist/js/pages/dashboard.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function resetForm() {
        $('#postFilter')[0].reset();
        $("#postFilter select").prop("selectedIndex", 0);
        $("#postFilter input[type=date]").val("");
        $("#postFilter input[type=datetime-local]").val("");
        $("#postFilter input[type=time]").val("");
    }
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        function showMessage(msg, type = 'success') {
            toastr.success(msg);
            // Toast.fire({
            //     icon: type,
            //     title: msg
            // });
        }
        @if(Session::has('error'))
        toastr.error('{{Session::get('error')}}');
        @endif
        @if(Session::has('success'))
        toastr.success('{{Session::get('success')}}');
        @endif
        @if ($errors->any())
        toastr.error("<?php
            foreach ($errors->all() as $error) {
                echo $error . '\n';
            }
            ?>");
        @endif
        $('body').on('click', '.removeElement', function () {
            var id = $(this).attr('data-id');
            var $tr = $(this).closest($('#elementRow' + id).parent().parent());
            var url = $(this).attr('data-url');
            Swal.fire({
                title: "Are you sure?",
                text: "You Want To Delete This Item",
                type: "error",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes,Sure",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {id: id,_method:'delete'},
                        dataType: 'json',
                        success: function (data) {
                            if (data.status == 200) {
                                $tr.find('td').fadeOut(1000, function () {
                                    $tr.remove();
                                });
                                toastr.success(data.message);
                                // Toast.fire({
                                //     icon: 'success',
                                //     title: data.message
                                // });
                            }
                            if (data.status == 400) {
                                toastr.error(data.message);
                                // Toast.fire({
                                //     icon: 'error',
                                //     title: data.message
                                // });
                            }
                        }
                    });
                }
                // else {
                //     Swal.fire({
                //         title: "Canceled ",
                //         text: "",
                //         type: "error",
                //         showCancelButton: false,
                //         confirmButtonColor: "#DD6B55",
                //         confirmButtonText: "Ok",
                //     });
                // }
            })
        });
        // $('.form').validate();
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $('.form').validate({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
