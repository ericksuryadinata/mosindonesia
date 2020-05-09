<!--=================================
 jquery -->

<!-- jquery -->
<script src="{{ url('website/js/jquery-3.3.1.min.js') }}"></script>

<!-- plugins-jquery -->
<script src="{{ url('website/js/plugins-jquery.js') }}"></script>

<!-- plugin_path -->
<script>
    let plugin_path = '{{ url("website/js") }}'+'/';
</script>

<!-- REVOLUTION JS FILES -->
<script src="{{ url('website/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ url('website/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- revolution custom -->
<script src="{{ url('website/revolution/js/revolution-custom.js') }}"></script>

<!-- custom -->
<script src="{{ url('website/js/custom.js') }}"></script>
@yield('scripts')
