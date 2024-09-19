<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Popper JS -->
<script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Defaultmenu JS -->
<script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

<!-- Node Waves JS -->
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<!-- Sticky JS -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>

<!-- Simplebar JS -->
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.js') }}"></script>

<!-- Color Picker JS -->
<script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

<!-- Custom-Switcher JS -->
<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>

<!-- Modal JS -->
<script src="{{ asset('assets/js/modal.js') }}"></script>

<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Table Data JS -->
<script src="{{ asset('assets/js/table-data.js') }}"></script>

<!-- Quill Editor JS -->
<script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>

<!-- Internal Quill JS -->
<script src="{{ asset('assets/js/quill-editor.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- تضمين SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (Auth::user()->hasRole('owner'))
@if (isset(Auth::user()->HisOffice))
<script>
    $(document).ready(function() {
        // استرجاع العدد القديم من local storage
        var oldNotificationCount = localStorage.getItem('oldNotificationCount');
        oldNotificationCount = oldNotificationCount ? parseInt(oldNotificationCount) : 0;

        // متغير لتتبع ما إذا تم عرض الإشعار بالفعل أم لا
        var notificationShown = false;

        function updateNotificationCount() {
            $.ajax({
                url: "{{ route('get.unreceived.transfers') }}",
                method: "GET",
                success: function(response) {
                    $('#notification-data').text(response.unreceivedTransfers + '  حوالات معلقة');

                    // إذا كان هناك إشعار جديد ولم يتم عرض الإشعار بالفعل
                    if (response.unreceivedTransfers > oldNotificationCount && !notificationShown) {
                        // عرض إشعار باستخدام SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'لديك حوالات جديدة!',
                            text: 'هناك ' + (response.unreceivedTransfers - oldNotificationCount) + ' حوالة جديدة.',
                            confirmButtonText: 'مشاهدة'
                        }).then((result) => {
                            // بعد النقر على زر "موافق"، قم بتوجيه المستخدم
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('offices.transfers', ['office' => Auth::user()->HisOffice->id]) }}";
                            }
                        });

                        // حفظ العدد الجديد في local storage للاستخدام في المرة القادمة
                        localStorage.setItem('oldNotificationCount', response.unreceivedTransfers);

                        // تعيين المتغير للتأكيد بأنه تم عرض الإشعار
                        notificationShown = true;
                    } else {
                        // إعادة تعيين المتغير إذا لم يكن هناك إشعار جديد
                        notificationShown = false;
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // تحديث العداد عند تحميل الصفحة
        updateNotificationCount();

        // تحديث العداد كل 10 ثوانٍ
        setInterval(updateNotificationCount, 10000);
    });
</script>
@endif
@endif
