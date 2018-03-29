<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\QuestionChoice;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($qr_id) {

        $data = compact('qr_id');
        return view('questions.add-edit', $data);
    }

    /**
     * Store a newly created Question in storage.
     *

     */
    public function saveQuestion() {
        DB::beginTransaction();
        try {
            $req_data = request()->all();

            $qs_types = request()->question_type_id;
            $questions = request()->question;
            $answers = request()->answer;

            $choices_single = request()->choice_single;
            $choices_multi = request()->choice_multi;
            $is_correct = request()->is_correct;
//            dd($req_data);
            for ($i = 0; $i < count($questions); $i++) {
                $new_question = new Question;
                $new_question->questionair_id = request()->qr_id;
                $qs_type = $new_question->question_type_id = $qs_types[$i];
                $new_question->question = $questions[$i] ? $questions[$i] : "";
                $new_question->answer = $answers[$i] ? $answers[$i] : "";
                $new_question->created_at = now();
                $new_question->save();
                // Adding Question Choices
                if ($qs_type != 1) {
                    $qs_choices = ($qs_type == 2) ? $choices_single[$i] : $choices_multi[$i];
                    foreach ($qs_choices As $choice) {
                        $j = 0;
                        $qc = new QuestionChoice;
                        $qc->question_id = $new_question->id;
                        $qc->choice = $choice;
                        $qc->is_correct = $is_correct[$i][$j];
                        $qc->created_at = now();
                        $qc->save();
                        $j++;
                    }
                }
            }
            DB::commit();
            return redirect()->route('questionair')->with("message", "Question Saved Successfully");
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->back()->with("message", "Error Saving Question, Recheck input fields");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
