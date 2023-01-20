@if (session()->has('success'))
    <div id="success" class="alert alert-success" style="width: 200px">
        {{ session()->get('success') }}
    </div>
@endif
<script>
    setTimeout(function() {
        document.getElementById('success').style.display = 'none';
    }, 3000);
</script>
@if (Session::has('deleted'))
    <div id="deleted" class="alert alert-danger" style="width: 300px" role="alert">
        {{ Session::get('deleted') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('deleted').style.display = 'none';
        }, 3000);
    </script>
@endif
@if (Session::has('restored'))
    <div id="restored" class="alert alert-success" style="width: 300px" role="alert">
        {{ Session::get('restored') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('restored').style.display = 'none';
        }, 3000);
    </script>
@endif
