function removeQuestion(btn) {
    btn = $(btn);
    btn.closest('.question_container').remove();
}

function questionTypeChanged(select_control, value) {
    select_control = $(select_control);

    var q_container = select_control.closest('.question_container');


    if (value == 1) {
        q_container.find('.text-answer').show('fast');
        q_container.find('.mcq-single').hide('fast');
        q_container.find('.mcq-multi').hide('fast');

    } else if (value == 2) {
        q_container.find('.text-answer').hide('fast');
        q_container.find('.mcq-single').show('fast');
        q_container.find('.mcq-multi').hide('fast');
    } else if (value == 3) {
        q_container.find('.text-answer').hide('fast');
        q_container.find('.mcq-single').hide('fast');
        q_container.find('.mcq-multi').show('fast');
    }

}

function addOptionSingle(btn) {

    var container = $(btn).closest('.mcq-single');
    var index = container.find('input.hidden_input').val();

    var row = $(`<tr>
                    <td>
                        <input type="text" name="choice_single[` + index + `][]" class="form-control" value=""  title="">
                    </td>
                    <td>
                        <input type="radio" name="is_correct[` + index + `][]" >
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="deleteChoice(this)">Delete Choice</button>
                    </td>
                </tr>`);

    container.find('tbody').append(row);

}

function addOptionMulti(btn) {

    var container = $(btn).closest('.mcq-multi');
    var index = container.find('input.hidden_input').val();

    var row = $(`<tr>
                    <td>
                        <input type="text" name="choice_multi[` + index + `][]" class="form-control" value=""  title="">
                    </td>
                    <td>
                        <input type="checkbox" name="is_correct[` + index + `][]" >
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="deleteChoice(this)">Delete Choice</button>
                    </td>
                </tr>`);

    container.find('tbody').append(row);

}

function deleteChoice(btn) {
    $(btn).closest('tr').remove();
}