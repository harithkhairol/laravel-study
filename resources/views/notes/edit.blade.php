
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Notes</div>
                <div class="panel-body">

            <form  method="POST" action="{{route('notes.update', $notes->id) }}">



                {{method_field('PATCH')}}
                {{ csrf_field() }}


                <div class="form-group">
                <label for="title">Title :</label>
                <input type="text" class="form-control" name="title"
                value="{{$notes->title}}">
                </div>


                <div class="form-group">
                <label for="title">Body :</label>
                <input type="text" class="form-control" name="body"value="{{$notes->body}}">
                </div>


                <button type="submit" class="btn btn-success">Update</button>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
