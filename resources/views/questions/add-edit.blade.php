@extends('layouts.app')

@section('content')

<div id="question-partial" style="display:none";>
    @include('questions.question')
</div>


<form>
    <div class="container">

        <div id="questions">
        @if(isset($questions))
            @foreach($questions as $question)
                @include('questions.question')
            @endforeach
        @endif
        </div>
        
        
        <button id="btn-add-question" type="button" class="btn btn-default">Add Question</button>
        

    </div>

    <br><br><br>
    <div class="container">
        
        <button type="submit" class="btn btn-block btn-success">
        
         Save Questions</button>
        
    </div>


</form>


<script src="{{asset('js/qman.js')}}"></script>

<script>

    $(document).ready(function(){

        var question_number = 1;

        $('#btn-add-question').click(function(){
            var new_question = $($('#question-partial').html());

            $.each(new_question.find('select,input:visible'), function(index, item){
                $(item).attr('name', $(item).attr('name')+'['+question_number+']');
            });

            $.each(new_question.find('input.hidden_input'), function(index, item){
                $(item).val( question_number );
            });

            question_number++;

            $('#questions').append(new_question);
        })

    });

    
</script>


@endsection