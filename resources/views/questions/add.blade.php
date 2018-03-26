@extends('layouts.app')
@section('add_question')
<style>


</style>
<script>

    var qs_number = 0;
    var qs_index = 0;
    var sc_number = 1;
    var signle_choice_index = 1;
    function addNewQuesion() {
        var question =
                "<div class='form-group' id='question_" + qs_number + "'  >" +
                "<label class='col-md-4 control-label' for='qs_type_" + qs_number + "'>Question Type</label>" +
                "<div class='col-md-6'>" +
                "<select id='qs_type_" + qs_number + "' name='qs_type[]' class='form-control'>" +
                "<option value='-1'>Select</option>" +
                "<option value='1'>Text</option>" +
                "<option value='2'>Multiple Choice (Single Option)</option>" +
                "<option value='3'>Multiple Choice (Multiple Options)</option>" +
                "</select>" +
                "</div>" +
                "<label class='col-md-4 control-label' for='question_text'>Question</label>" +
                "<div class='col-md-6'>" +
                "<input id='question_text_" + qs_number + "' name='question_text[]' type='text' class='form-control input-lg' required=''>" +
                "</div>" +
                "<div class='col-md-2'>" +
                "<button  type='button' class='btn btn-default' onclick='delQuesion(" + qs_number + ")' >Delete Question</button" +
                "</div>" +
                "</div>" +
                "<div class='container'><div class='row'><div class='col-md-12'>" +
                "<div class='form-group' id='answer_section_" + qs_number + "'>" +
                "<div class='col-md-12'>" +
                "</div>" +
                "</div></div></div></div>";
        qs_index = qs_number;
        qs_number++;
        $("#question_section").append(question);
    }
    function delQuesion(qs_id)
    {
        $("#question_" + qs_id).remove();
        qs_number--;
    }

    function addChoiceSingle()
    {
        var choice = "<div class='col-md-4' id='qs_choices_single_" + qs_index + '_' + signle_choice_index + "'><label class='col-md-2 control-label' >Choice" + signle_choice_index + "</label></div>" +
                "<div class='col-md-6'><label for='qs_choice_single_" + qs_index + '_' + signle_choice_index + "'>" +
                "                       <input type='text' name='qs_choice_single_val[]' placeholder='Enter Choice' />" +
                "                       <input type='radio' name='qs_choices[]' id='qs_choice_single_" + qs_index + '_' + signle_choice_index + "' value='1'>Is Correct?" +
                "                   </label>" +
                "</div>" +
                "<div class='col-md-2'><button type='button' class='btn btn-default'>Delete Choice</button></div>" +
                "</div>"
        $("#qs_choices_single_sction").append(choice);
        signle_choice_index++;
    }
    function delChoiceSingle()
    {
        alert('delChoiceSingle');
//        var id = "qs_choices_single_" + qs_index + '_' + signle_choice_index;
//        alert(id);
//        $("#" + id).remove();
//        signle_choice_index--;
    }
    function addChoiceMul()
    {


    }
    function delChoiceMul()
    {


    }

    $(document).ready(function () {

//"#qs_type_" + qs_index
        $("body").on('change', 'select[id^="qs_type"]', function () {
            var qs_type_sel = $("#qs_type_" + qs_index + " option:selected").val();

            var text_ans =
                    "<label class='col-md-4 control-label' for='answer_text'>Answer</label>" +
                    "<div class='col-md-8'>" +
                    "<input id='answer_text' name='answer_text' type='text'  class='form-control input-lg' required=''>" +
                    "</div>";
            var mcq_single =
                    "<div class='container'>" +
                    "<div class='row' id='qs_choices_single_sction'>" +
                    "<div class='col-md-4' id='qs_choices_single_" + qs_index + '_' + signle_choice_index + "'><label class='col-md-2 control-label' >Choice" + signle_choice_index + "</label></div>" +
                    "<div class='col-md-6'><label for='qs_choice_single_" + qs_index + '_' + signle_choice_index + "'>" +
                    "                       <input type='text' name='qs_choice_single_val[]' placeholder='Enter Choice' />" +
                    "                       <input type='radio' name='qs_choices[]' id='qs_choice_single_" + qs_index + '_' + signle_choice_index + "' value='1'>Is Correct?" +
                    "                   </label>" +
                    "</div>" +
                    "<div class='col-md-2'><button type='button' class='btn btn-default' onClick='delChoiceSingle()'>Delete Choice</button></div>" +
                    "</div>" +
                    "<div class='col-md-2'><button type='button' class='btn btn-default' onClick='addChoiceSingle()'>Add Choice</button></div>" +
                    "</div>" +
                    "</div>";
            var mcq_mul =
                    "<div class='form-group'>" +
                    "<label class='col-md-4 control-label' for='qs_choice_multiple'></label>" +
                    "<div class='col-md-4'>" +
                    "<div class='checkbox'>" +
                    "<label for='qs_choice_multiple-0'>" +
                    "<input type='checkbox' name='qs_choice_multiple' id='qs_choice_multiple-0' value='1'>Is Correct?" +
                    "</label>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            if (qs_type_sel == 1)
            {
                $("#answer_section_" + qs_index).empty();
                $("#answer_section_" + qs_index).append(text_ans);
            } else if (qs_type_sel == 2)
            {
                signle_choice_index = 0;
                $("#answer_section_" + qs_index).empty();
                $("#answer_section_" + qs_index).append(mcq_single);
            } else if (qs_type_sel == 3)
            {
                $("#answer_section_" + qs_index).empty();
                $("#answer_section_" + qs_index).append(mcq_mul);
            }

        });

    });




</script>
<form class="form-inline" id="question_form">
    <fieldset>
        <!-- Add Questions to Questionnaire -->
        <legend>Add Questions</legend>
        <input type="hidden" value="{{$qr_id}}"/>
        <div id="question_section">

        </div>
        <button type="button" class="btn btn-default" onclick="addNewQuesion()">Add Question</button>
    </fieldset>
</form>
@endsection