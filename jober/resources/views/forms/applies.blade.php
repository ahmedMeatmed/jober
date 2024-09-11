@extends('layout.layout')
@section('title')
Applies
@endsection


@section('main')
@if ($type !== 'employer')<style>#employer{display: none;}</style>@endif
@if ($type !== 'candidate')<style>#candidate{display: none;}</style>@endif

<div class="container">
    <div id="employer">
        @foreach ($forms as $form )
            <div class="card w-50 mt-3 m-auto">
                    <div class="card-body">
                        <strong>Name : {{ $form->name }}</strong>
                        <form action="{{ route('forms.destroy',$form->id) }}" method="POST" style="display: inline-block;float: right;">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-no-background" style="font-size:24px"><i class="far fa-times-circle"></i></button>
                        </form>
                        <br>
                        <strong>Email : {{ $form -> email }} </strong>
                        <br>
                        <h5 class="card-title">Phone :{{ $form ->phone }}</h5>
                        <br>
                    <h5>CV :
                        <a href="{{ asset('cv/'.$form->file_path) }}" download class="btn btn-info">Download Document</a></h5>
                    </div>
                </div>
                    <br>
            @endforeach
    </div>
    <div id="candidate">
        @foreach ($applies as $apply )
            <div class="card w-50 mt-3 m-auto">
                    <div class="card-body">
                        <strong>Name : {{ $apply->name }}</strong>
                        <form action="{{ route('forms.destroy',$apply->id) }}" method="POST" style="display: inline-block;float: right;">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-no-background" style="font-size:24px"><i class="far fa-times-circle"></i></button>
                        </form>
                        <br>
                        <strong>Email : {{ $apply -> email }} </strong>
                        <br>
                        <h5 class="card-title">Phone :{{ $apply ->phone }}</h5>
                        <br>
                    <h5>CV :
                        <a href="{{ asset('cv/'.$apply->file_path) }}" download class="btn btn-info">Download Document</a></h5>
                    </div>
                </div>
                    <br>
            @endforeach
    </div>

    
</div>
<script src="{{asset('script/script.js')}}"></script>

@endsection
