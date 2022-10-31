<script>
    $(document).ready(function() {
        toastr.options = {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'positionClass': 'toast-top-center',
            'preventDuplicates': false,
            'showDuration': '1000',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut',
        }
    });
</script>

{{-- MESSAGE SUCCESS --}}
@if(session()->has('message-success'))
<script>
    $(document).ready(function() {
        toastr.success('{{session('message-success')}}');
    });
</script>
@endif

{{-- MESSAGE INFO --}}
@if(session()->has('message-info'))
<script>
    $(document).ready(function() {
        toastr.info('{{session('message-info')}}');
    });
</script>
@endif

{{-- MESSAGE ERROR --}}
@if(session()->has('message-error'))
<script>
    $(document).ready(function() {
        toastr.error('{{session('message-error')}}');
    });
</script>
@endif

{{-- MESSAGE WARNING --}}
@if(session()->has('message-warning'))
<script>
    $(document).ready(function() {
        toastr.warning('{{session('message-warning')}}');
    });
</script>
@endif