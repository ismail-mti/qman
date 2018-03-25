<?php

namespace App\Http\Controllers;

use App\Questionair;

//use Illuminate\Http\Request;

class QuestionairController extends Controller {

    function index() {
        $data['qr_list'] = $qr_list = Questionair::withCount('questions')->get();
        return view('questionairs.list', $data);
    }

    function addEditQuestionair() {
        $req_params = request()->route()->parameters();
        if ($req_params) {
            $qr_id = $req_params['qr_id'];
            $qr_info = Questionair::find($qr_id);
            $data = compact('qr_info');
            return view('questionairs.add-edit', $data);
        } else {
            return view('questionairs.add-edit');
        }
    }

    function saveQuestionair() {
        $req_data = request()->all();
        $questionair = new Questionair;
        $qr_id = isset($req_data["id"]) ? $req_data["id"] : -1;
        if ($qr_id != -1) {
            $questionair = Questionair::find($qr_id);
        }
        $questionair->name = $req_data["quesionair_name"];
        $questionair->time = $req_data["time"];
        $questionair->duration = $req_data["duration"];
        $questionair->resumable = $req_data["resumable"];
        $questionair->published = $req_data["published"];
        $questionair->created_by = Auth()->user()->id;
        $questionair->created_at = now();
        $save_status = $questionair->save();
        if ($save_status) {
            return redirect()->route('questionair')->with("message", "Questionair Saved Successfully");
        } else {
            return redirect()->back()->with("message", "Error Saving Quesionair, Recheck input fields");
        }
    }

    function delQuestionair() {
        $qr_id = request()->route()->parameters()['qr_id'];
        $qr = Questionair::find($qr_id);
        $delete_status = $qr->delete();
        if ($delete_status) {
            return redirect()->route('questionair')->with("message", "Questionair Deleted Successfully");
        } else {
            return redirect()->back()->with("message", "Error Deleting Quesionair, Try Again");
        }
    }

}
