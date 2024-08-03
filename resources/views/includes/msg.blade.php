<script>
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
</script>
