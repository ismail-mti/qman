@extends('layouts.app')

@section('content')
<form class="form-horizontal" action="{{url('save_questionair')}}" method="post">
    {{ csrf_field() }}
    <fieldset>
        <legend>{{_('Create')}}</legend>
        <input type="hidden" name="id" value="{{isset($qr_info->id) ? $qr_info->id : "" }}"/>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="quesionair_name">{{_('Questionair Name')}}</label>  
            <div class="col-md-5">
                <input id="quesionair_name" name="quesionair_name"  value="{{isset($qr_info->name) ? $qr_info->name :"" }}"type="text"  class="form-control input-md" required="">
            </div>
        </div>

        <!-- Time Duration-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="duration">{{_('Duration')}}</label>
            <div class="col-md-4">
                <input id="time" name="time" value="{{isset($qr_info->time) ? $qr_info->time :"" }}" type="number"  class="form-control input-md" required="">
            </div>
            <div class="col-md-4">
                <select id="duration" name="duration" class="form-control">
                    <option {{isset($qr_info->duration) && $qr_info->duration == 'Minutes' ? "selected" :"" }}  value="Minutes">{{_('Minutes')}}</option>
                    <option {{isset($qr_info->duration) && $qr_info->duration == 'Hours' ? "selected" :"" }} value="Hours">{{_('Hours')}}</option>
                </select>
            </div>
        </div>

        <!-- Resume Option -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="resumable">{{_('Can Resume')}}</label>
            <div class="col-md-4"> 
                <label class="radio-inline" for="resumable-0">
                    <input type="radio" name="resumable" id="resumable-0" value="1" checked >
                    Yes
                </label> 
                <label class="radio-inline" for="resumable-1">
                    <input type="radio" name="resumable" id="resumable-1" value="0" {{isset($qr_info->resumable) && $qr_info->resumable == '0' ? "checked" :"" }}>
                    No
                </label>
            </div>
        </div>
        <!-- Publish Status-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="published">{{_('Publish Now')}}</label>
            <div class="col-md-4"> 
                <label class="radio-inline" for="published-0">
                    <input type="radio" name="published" id="published-0" value="1"  checked >
                    Yes
                </label> 
                <label class="radio-inline" for="published-1">
                    <input type="radio" name="published" id="published-1" value="0" {{isset($qr_info->published) && $qr_info->published == '0' ? "checked" : "" }}>
                    No
                </label>
            </div>
        </div>
        <!-- Submit Forms -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="add-questionair"></label>
            <div class="col-md-4">
                <button id="add-questionair" type="submit" name="add-questionair" class="btn btn-default">{{_('Save')}}</button>
            </div>
        </div>
    </fieldset>
</form>

@endsection
