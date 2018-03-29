   <div class="question_container">

        <div class="form-group">
            <label class="col-sm-2 control-label">Question Type:</label>
            <div class="col-sm-12">
                <select name="question_type_id[]"  class="form-control" onchange="questionTypeChanged(this, this.value)">
                    <option value="1">Text</option>
                    <option value="2">Multiple Choice (Single Option)</option>
                    <option value="3">Multiple Choice (Multiple Options)</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label  class="col-sm-2 control-label">Question</label>
            <div class="col-sm-12">
                <input type="text" name="question[]"  class="form-control" value="" required="required"  title="">
            </div>
        </div>


        <div class="text-answer">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Answer</label>
                <div class="col-sm-12">
                    <input type="text" name="answer[]"  class="form-control" value="" title="">
                </div>
            </div>
        </div>

        <div class="mcq-single col-sm-12" style="display:none;">
            <input type="hidden" class="hidden_input" value="">
            <table class="table table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="col-md-8">Option</th>
                        <th class="col-md-2">Is Correct</th>
                        <th class="col-md-2">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan=3 class="text-right">
                            <button type="button" class="btn btn-default" onclick="addOptionSingle(this)">Add Choice</button>
                        </td>
                    </tr>



                </tfoot>
            </table>

        </div>

        <div class="mcq-multi col-sm-12" style="display:none;">
            <input type="hidden" class="hidden_input" value="">
            <table class="table table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="col-md-8">Option</th>
                        <th class="col-md-2">Is Correct</th>
                        <th class="col-md-2">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan=3 class="text-right">
                            <button type="button" class="btn btn-default" onclick="addOptionMulti(this)">Add Choice</button>
                        </td>
                    </tr>



                </tfoot>
            </table>
        </div>



        <div class="form-group">
            <div class="col-sm-12 text-right">
                <button onclick="removeQuestion(this)" type="button" class="btn btn-danger">Delete Question</button>
            </div>
        </div>


        <hr>
    </div>

