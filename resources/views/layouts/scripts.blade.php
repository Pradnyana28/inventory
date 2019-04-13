<!-- All Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/waves.js') }}"></script>
<script src="{{ asset('js/sidebar-menu.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/vendor/toast.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('js/vendor/d3.min.js') }}"></script>
<script src="{{ asset('js/vendor/c3.min.js') }}"></script>
<script src="{{ asset('js/vendor/knob.js') }}"></script>
<script src="{{ asset('js/vendor/sparkline.min.js') }}"></script>
<script src="{{ asset('js/vendor/raphael.min.js') }}"></script>
<script src="{{ asset('js/vendor/morris.min.js') }}"></script>
<script src="{{ asset('js/ajax.js') }}"></script>
<script>
    $(".dial").knob();

    $({animatedVal: 0}).animate({animatedVal: 80}, {
        duration: 2000,
        easing: "swing",
        step: function() {
            $(".dial").val(Math.ceil(this.animatedVal)).trigger("change");
        }
    });

    $('.dataTableDef').DataTable();
</script>
@yield('custom-scripts')