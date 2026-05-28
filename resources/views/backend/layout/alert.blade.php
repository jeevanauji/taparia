@if (session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="true">×</button>
    {{ session('success') }}    
</div>
@elseif (session('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session('error') }}
  </div>
@endif