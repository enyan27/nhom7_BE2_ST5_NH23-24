@extends('admin.layout.master')

@section('title', '403 Forbidden')

@section('body')

        <div class="text-center" style="font-weight: 600; margin: 150px 0;"> 
            <div class="title-403" style="font-size: 40px" data-content="404">
                403 - ACCESS DENIED
            </div>
            <div class="subtitle" style="font-size: 20px">
                Oops, You don't have permission to access this page.
            </div>
        </div>

@endsection