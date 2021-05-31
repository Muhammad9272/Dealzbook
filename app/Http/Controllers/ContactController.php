<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use Illuminate\Http\Request;

use App\Generalsetting;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    protected $storeRepository;

    protected $cityRepository;

    protected $countryRepository;

    protected $socialRepository;

    function __construct(
        StoreRepositoryInterface $storeRepository,
        CityRepositoryInterface $cityRepository,
        CountryRepositoryInterface $countryRepository,
        SocialRepositoryInterface $socialRepository
    )
    {
        $this->storeRepository = $storeRepository;
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->socialRepository = $socialRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setLocale($request);


        return view('pages.contact', [
            'recent_stores' => $this->storeRepository->get($limit=8),
            'recent_cities' => $this->cityRepository->get($limit=8),
            'recent_countries' => $this->countryRepository->get($limit=5),
            'all_countries' => $this->countryRepository->all(),
            'social'=> $this->socialRepository->all(),
            'all_cites' => $this->cityRepository->all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {

            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
                'g-recaptcha-response' => 'required|captcha'
            ]);

            $contact = new Contact;


           if ($file = $request->file('file'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/contacts/',$name);
                $contact->file  = $name;
            }


            $contact->first_name = $request->first_name;
            $contact->last_name = $request->last_name;
            $contact->phone_number = $request->phone_number;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;

            $contact->save();

         $details = [
          'title' => 'Mail from'.$gs->web_name.' ',
          'subject' =>$request->subject ,
          'to' => $gs->to_email,
          'name' => $request->first_name,
          'phone' => $request->phone_number,
          'from' => $request->email,
          'msg' => $request->message,
         ];

        \Mail::to($gs->to_email)->send(new \App\Mail\GeniusMailer($details));  

            return redirect()->back()->with('message', 'Thank you for contacting us. We will get back to you!');
        }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
