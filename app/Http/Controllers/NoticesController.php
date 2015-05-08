<?php namespace App\Http\Controllers;

use App\Form;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Requests\PrepareNoticeRequest;
use App\Receiver;
use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Mail;

class NoticesController extends Controller {

    /**
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    /**
     * @return string
     */
    public function index()
    {
        return $this->user->notices;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $receivers = Receiver::lists('name', 'id');
        return view('notices.create',compact('receivers'));
    }

    public function confirm(PrepareNoticeRequest $request)
    {

        $template = $this->compileBasicappTemplate($data = $request->all());
        session()->flash('basicapp', $data);
        return view('notices.confirm',compact('template'));

    }

    public function store(Request $request)
    {
        $form = $this->createNotice($request);

        Mail::queue('emails.basicapp', compact('notice'), function($message) use($form){

                $message->from($form->getOwnerEmail())
                        ->to($form->getRecipientEmail())
                        ->subject('Basicapp Form');
        });
        return redirect('notices');

        //return Form::first();
    }

    public function compileBasicappTemplate($data)
    {
        $data = $data + [

                'name' => $this->user->name,
                'email' => $this->user->email,

            ];
        return view()->file(app_path('Http/Templates/basicapp.blade.php'), $data);

    }

    /**
     * @param Request $request
     */
    public function createNotice(Request $request)
    {
        $form = session()->get('basicapp')+ ['template' => $request->input('template')];

       // $form = Form::open($data)->useTemplate($request->input('template'));

        $form = $this->user->notices()->create($form);



        return $form;
    }


}
