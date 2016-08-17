<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckFormEmailRequest;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Gate;
use Session;
use App\User;
use App\Groups;
use Carbon\Carbon;
use App\Status;

class EmailsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new email.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        return view('emails.create');
    }

    /**
     * Send email to receiver.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        $errors = array();
        //get email address
        $recipients = explode(",", $request->recipient);

        foreach ($recipients as $recipient) {
            if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                //is group's name?
                $group = Groups::where('name', '=', $recipient)
                    ->with('users')->first();
                //yes
                if ($group) {
                    if ($group->users->count() == 0) {
                        $errors[] = 'No one in ' . $group->name;
                    } else {
                        foreach ($group->users as $user) {
                            //add email address
                            $recipients[] = $user->email;
                        }
                    }
                    //remove group's name
                    $key = array_search($recipient, $recipients);
                    unset($recipients[$key]);
                } else { //NO!
                    $errors[] = 'Recipitent must be an email address.';
                    return redirect()->back()->withErrors($errors)->withInput($request->all());
                }
            }
        }
        //remove duplicate
        $recipients = array_unique($recipients);

        //check - is there any email address?
        if (sizeOf($recipients) == 0) {
            $errors[] = 'No recipient!';
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }//end get email address

        $this->validate($request, [
            'sender' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);
        if (isset($request->attach[0])) {//if have attach file
            //upload file to server
            $files = $request->attach;
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getFilename() . '.' . $extension;
                $file->move('public/', $filename);
                // Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
                // $filename = $file->getFilename() . '.' . $extension;
                $attachs[] = public_path('public/') . $filename;
            }

            //send email
            Mail::send('emails._email', ['content' => $request->content], function ($m) use ($request, $recipients, $attachs) {
                $m->from(config('mail.username'), $request->sender)
                    ->subject($request->subject)
                    ->to($recipients);
                foreach ($attachs as $file) {
                    $m->attach($file);
                }
                // for ($i = 0; $i < sizeOf($attachs); $i++) {
                //     print_r($attachs[$i]);
                //     $m->attach($attachs[$i]);
                // }
            });

            //delete file
            foreach ($attachs as $file) {
                unlink($file);
            }

            Session::flash('flash_message', 'Email has been sent.');

            if ($errors) {
                return redirect()->back()->withErrors($errors);
            } else {
                return redirect()->back();
            }
        }
        //if no attach file
        Mail::send('emails._email', ['content' => $request->content], function ($m) use ($request, $recipients) {
            $m->from(config('mail.username'), $request->sender);
            $m->to($recipients)->subject($request->subject);
        });

        Session::flash('flash_message', 'Email has been sent.');

        if ($errors) {
            return redirect()->back()->withErrors($errors);
        } else {
            return redirect()->back();
        }

    }

    /**
     * Show the form for creating a new email type 1.
     *
     * @return view
     */
    public function createFormEmail(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        if ($request->type != null) {
            $email = $request->email;
            $status = Status::find($request->type);

            $data = array('email' => $email, 'id' => $request->id, 'type' => $request->type, 'status' =>
            $status);

            return view('emails._form_email_1')->with($data);
        }
    }

    /**
     * send email type 1.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEmail1(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $rules = array('recipient'=>'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9+)*(\.[a-z]{2,4}){1,2}$/', 'sender'=>'required', 'subject'=>'required');
        $status = Status::find($request->type);
        if( in_array('Date',$status->info))
            $rules['date'] = 'required|after:now';
        if( in_array('Time',$status->info))
            $rules['time'] = 'required';
        if( in_array('Address',$status->info))
            $rules['address'] = 'required';

        $this->validate($request, $rules);

        $data = array(
            'date' => $request->date,
            'time' => $request->time,
            'address' => $request->address,
            'type' => $request->type,
            'cv' => \App\CV::find($request->id)
        );

        $message = $data['cv']->status->email_template;


        $message = str_replace('[First_name]', ($data['cv']->User)?$data['cv']->User->First_name:'', $message);
        $message = str_replace('[Positions]', ($data['cv']->positionCv)?$data['cv']->positionCv->name:'' , $message);
        if( in_array('Time',$status->info))
        $message = str_replace('[Time]', $request->time, $message);
        if( in_array('Date',$status->info))
        $message = str_replace('[Date]', Carbon::createFromFormat('Y-m-d',$request->date)->format('d/m/Y'), $message);
        if( in_array('Address',$status->info))
        $message = str_replace('[Address]', $request->address, $message);
        $data['email_content'] = $message;


        $attachs = array();
        if (isset($request->attach[0])) {
            //upload file to server
            $files = $request->attach;
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getFilename() . '.' . $extension;
                $file->move('public/', $filename);
                // Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
                // $filename = $file->getFilename() . '.' . $extension;
                $attachs[] = public_path('public') .'\\'. $filename;
            }
        }
        if(isset($_POST['_action']) && $_POST['_action'] == 'preview'):
            return view('emails._email_preview')->with(['message'=> $message,'attachs'=>$attachs]);
        else:
            //send email
            Mail::send('emails._email_1', $data, function ($m) use ($request, $attachs) {
                $m->from(config('mail.username'), $request->sender)
                    ->subject($request->subject)
                    ->to($request->recipient);
                if(count($attachs))
                foreach ($attachs as $file) {
                    $m->attach($file);
                }
            });
            if(count($attachs))
                foreach ($attachs as $file) {
                    unlink($file);
                }
        endif;
    }

    /**
     * get Email address for ajax.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmailAddress(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $key = $request->term;

        $emails = User::select('name', 'email')
            ->where('email', 'like', '%' . $key . '%')
            ->orWhere('name', 'like', '%' . $key . '%')
            ->get();

        $groups = Groups::select('name')
            ->where('name', 'like', '%' . $key . '%')->get();

        foreach ($groups as $group) {
            $emails[] = ['name' => $group->name, 'email' => $group->name];
        }

        return Response::json($emails);
    }
}
