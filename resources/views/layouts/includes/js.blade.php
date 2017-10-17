<!-- jQuery 3 -->
<script src="{{ URL::to('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::to('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ URL::to('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::to('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- Extras -->
<script src="{{ URL::to('bower_components/multi-step/js.js') }}"></script>
@yield('js')
<!-- AdminLTE App -->
<script src="{{ URL::to('dist/js/adminlte.min.js') }}"></script>
<script src="{{ URL::to('js/default.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::to('dist/js/demo.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>