@extends('layout.layout')
@section('title')
Dashboard
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" 
integrity="sha512-nhTYl+9IkZjO7O4Vjwr9hD+3I7s/aQRUJ5rYw6T3kvZxRZJ/RB6yFJmT5RX5RZoXzQ/MBD4OqRmcJkVjIa1l5w==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('main')
@if ($type == 'employer')<style></style>@endif

<div class="container">
    <div style="">
        <div class="card h-25 mt-3 col-3" style="display: inline-block;margin-right:3em;">
            <div class="card-header">
                <h5 class="card-title" style="text-align:center" >
                    <strong>Admins</strong>
                </h5>
            </div>
            <div class="card-body" style="text-align:center">
               
                    
                    <strong style="font-size: 72px">{{ $admins }}</strong>
                
                
            </div>
        </div>

        <div class="card h-25 mt-3 col-3" style="display: inline-block;margin-right:3em;">
            <div class="card-header">
                <h5 class="card-title" style="text-align:center">
                    <strong>Employers</strong>
                </h5>
            </div>
            <div class="card-body" style="text-align:center">

                <strong style="font-size: 72px">{{ $employers }}</strong>
                
            </div>
        </div>

        <div class="card h-25 mt-3 col-3" style="display: inline-block;margin-right:3em;">
            <div class="card-header">
                <h5 class="card-title" style="text-align:center">
                    <strong>Candidates</strong>
                </h5>
            </div>
            <div class="card-body" style="text-align:center">

                <strong style="font-size: 72px">{{ $candidates }}</strong>
                
            </div>
        </div>

        <div class="card h-25 mt-3 col-3" style="display: inline-block;margin-right:3em;">
            <div class="card-header">
                <h5 class="card-title" style="text-align:center">
                    <strong >Posts</strong>
                </h5>
            </div>
            <div class="card-body" style="text-align:center">

                <strong style="font-size: 72px;text-align:center">{{ $posts }}</strong>
                
            </div>
        </div>

        <div class="card h-25 mt-3 col-3" style="display: inline-block;margin-right:3em;">
            <div class="card-header">
                <h5 class="card-title" style="text-align:center">
                    <strong >Forms</strong>
                </h5>
            </div>
            <div class="card-body" style="text-align:center">

                <strong style="font-size: 72px;text-align:center">{{ $forms }}</strong>
                
            </div>
        </div>
        

        

    
    
    </div>
</div>
@endsection