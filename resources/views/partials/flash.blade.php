@if (Session::has('flash_message'))
    <div class="flash shim-bottom">
        {{ Session::get('flash_message') }}
    </div>
@endif