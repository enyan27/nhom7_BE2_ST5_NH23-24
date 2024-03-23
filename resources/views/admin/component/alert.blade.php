@if(session('success'))
    <div class="alert alert-success alert-block alert-dismissible fade show" role="alert">    
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('success2'))
    <div class="alert alert-success alert-block alert-dismissible fade show" role="alert">    
        <strong>{{session('success2')}}</strong>
        <a style="margin-left: 20px" href="./admin/category">View Category List</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-block alert-dismissible fade show" role="alert">
        <strong>{{session('error')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif