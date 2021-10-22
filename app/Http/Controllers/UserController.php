<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Repositories\UserRepository;
use App\Roles\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    /**
     * The user repository instance.
     */
    protected $clients;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $clients
     * @return void
     *
     *
     * /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $clients)
    {
        $this->middleware('auth');
        $this->clients = $clients;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $clients = $this->clients->getClients();
        $isAdmin = Auth::user()->isAdmin(Role::$admin);
        return view('home', ['isAdmin' => $isAdmin], compact('clients'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string'],
        ]);

        Clients::findOrFail($id)->update(['name' => $request->name, 'email' => $request->email,
            'address' => $request->address, 'dob' => $request->dob, 'gender' => $request->gender]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $res = Clients::find($id)->delete();
        if ($res) {
            $msg = 'Record Deleted';
        } else {
            $msg = 'There was a problem please try again';
        }
        return response()->json(['msg' => $msg]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addClient(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'address' => ['required', 'string'],
            'dob' => ['required', 'date'],
            "phone" => [
                'required',
                'array', // input must be an array
                'min:1'  // there must be at least 1 phone in the array
            ],
            'phone.*' => ['required', 'integer', 'digits:8'],
            'gender' => ['required', 'string'],
        ]);

        $clientId = $this->clients->addClient($request->all());
        return response()->json(['id' => $clientId]);
    }
}
