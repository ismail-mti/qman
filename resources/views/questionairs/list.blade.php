@extends('layouts.app')

@section('questionairs-list')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Questionair
                    <a href="{{ url('add_questionair')}}"> <button type="button" class="btn btn-default" >Create</button></a>
                </div>

                <div class="card-body">
                    @if ($qr_list)
                    <table class="table table-bordered table-striped">
                        <th>id</th>
                        <th>Name</th>
                        <th>Number Of Questions</th>
                        <th>Duration</th>
                        <th>Resumable</th>
                        <th>Published</th>
                        <th>Action</th>
                        @foreach($qr_list As $list_item)
                        <tr>
                            <td>{{$list_item->id}}</td>
                            <td>{{$list_item->name}}</td>
                            <td>{{$list_item->questions_count }} | <a href="{{route('add_question',[$list_item->id])}}">Add</a></td>
                            <td>{{$list_item->time .$list_item->duration}}</td>
                            <td>{{($list_item->resumable) ? "Yes" : "No"}}</td>
                            <td>{{($list_item->published) ? "Yes" : "No"}}</td>
                            <td><a href="{{route('edit_questionair',[$list_item->id])}}">Edit</a> | <a href="{{route('del_questionair',[$list_item->id])}}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>

                    @else
                    <div class="alert alert-info">
                        <strong>{{_('No Questionair!')}}</strong> {{_('Create one Please.')}} 
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
