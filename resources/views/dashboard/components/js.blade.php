<!--begin::Javascript-->
<script>
    var hostUrl = "{{ asset('dashboard-assets/') }}";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('dashboard-assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('dashboard-assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>

<script src="{{ asset('dashboard-assets/js/axios.js') }}"></script>

<script src="{{asset('dashboard-assets/js/crud.js')}}"></script>
