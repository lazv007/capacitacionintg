<!--se presenta las variables sesion de tipo flash -->

<div class="container">
@if (session('success'))
        <div class="alert alert-warning" role="alert">
{{session('success')}}
        </div>
@endif        


@if (session('error'))
        <div class="alert alert-danger" role="alert">
{{session('success')}}
        </div>
@endif        

</div>

