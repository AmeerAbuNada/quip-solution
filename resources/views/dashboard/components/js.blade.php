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

<script src="{{ asset('dashboard-assets/js/crud.js') }}"></script>

<script src="{{ asset('build/assets/app-4ed993c7.js') }}"></script>
<script src="{{ asset('build/assets/app-fe63ef28.js') }}"></script>

<script>
    const Toast2 = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: true,
        timer: null,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Echo.private(`new-request`)
        .listen('NewContactEvent', (e) => {
            @if (Route::currentRouteName() == 'dashboard.index')
                $('#contact_table').DataTable().ajax.reload();
            @endif
            @if (Route::currentRouteName() == 'contacts.index')
                $('#kt_table_users').DataTable().ajax.reload();
            @endif
            Toast2.fire({
                icon: "warning",
                title: '{{ __('dashboard.notification_contact') }}',
            });
        })
        .listen('NewMaintenanceRequest', (e) => {
            @if (Route::currentRouteName() == 'dashboard.index')
                $('#maintetance_table').DataTable().ajax.reload();
            @endif
            @if (Route::currentRouteName() == 'maintenances.index')
                $('#kt_table_users').DataTable().ajax.reload();
            @endif
            Toast2.fire({
                icon: "warning",
                title: '{{ __('dashboard.notification_maintenance') }}',
            });
        });
</script>
