<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CV;
use App\Record;
use Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;

class RecordController extends Controller
{
    public function store(Request $request)//post
    {
        $id = Hashids::decode($request->input('id'))[0];
        $CV = CV::findOrFail($id);
        if (Gate::denies('update-cv', $CV->user_id)) {
            abort(403);
        }
        $type = str_split_unicode($request->input('data-react'), "_");//"1_x"
        $record = new Record();
        $record->Type = $type[2];
        $record->Date = $request->input('Year') . '-' . $request->input('Month') . '-01';
        $record->Content = $request->input('Content');
        $CV->Record()->save($record);
        return "1_" . $record->Type;
    }

    public function update($id, UpdateRequest $request)//put
    {
        $record = Record::findOrFail($id);

        $cv = $record->CV;
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }
        if ($request->has('Year')) {
            $record->Date = $request->input('Year') . '-' . getMonth($record->Date) . '-01';
        }
        if ($request->has('Month')) {
            $record->Date = getYear($record->Date) . '-' . $request->input('Month') . '-01';
        }
        $record->update($request->all());
        return "1_" . $record->Type;
    }

    public function destroy($id)
    {

        $record = Record::findOrFail($id);
        $cv = $record->CV;
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }
        $type = $record->Type;
        $record->delete();
        return "1_" . $type;
    }

    //dưới đây là các method không dùng tới

    public function show($id)
    {

    }

    public function edit($id, UpdateRequest $request)
    {

    }

    public function index($type)
    {

    }

    public function create(Request $request)
    {

    }
}
