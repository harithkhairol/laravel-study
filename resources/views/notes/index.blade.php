@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All notes</div>

                <div class="panel-body">

                @foreach ($notes as $note)

                 <div class="panel panel-default">
                 <div class="panel-heading">{{$note->title}}</div>

                    <div class="panel-body">

                    {{$note->body}}

                    <hr>

                    

                    <form method="POST" action="{{route('notes.destroy', $note->id)}}">

                    {{method_field('DELETE')}}
                    {{csrf_field() }}

                    <a href="{{route('notes.edit', $note->id)}}" class="btn btn-default">Edit </a>

                    <button type="submit" class="btn btn-danger">Delete</button>
</form>
                    </div>
                </div>
                
                @endforeach

            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
        <div class="text-center">

        {{$notes->links()}}

</div>
</div>

    </div>
</div>
</div>

@endsection
