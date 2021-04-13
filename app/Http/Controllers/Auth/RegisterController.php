<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Events\WelcomeMailEvent;
use SmartyStreets\PhpSdk\Exceptions\SmartyException;
use SmartyStreets\PhpSdk\StaticCredentials;
use SmartyStreets\PhpSdk\ClientBuilder;
use SmartyStreets\PhpSdk\US_Street\Lookup;
use Hash;

class RegisterController extends Controller
{
    public function index()
    {
    	return view('auth.index');
    }

    public function register(RegisterRequest $request)
    {
    	$result = User::insert([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    		'street' => $request->street,
    		'city' => $request->city,
    		'state' => $request->state,
            'country' => $this->getCountry($request),
    		'zip' => $request->zip,
    		'created_at' => date('Y-m-d h:s:i')
    	]);

    	if($result)
    	{
            event(new WelcomeMailEvent($request->email));

    		return view('dashboard');
    	}
    }

    public function getCountry(RegisterRequest $request)
    {
        try
        {
            $authId = config('smarty.SMARTY_AUTH_ID');
            $authToken = config('smarty.SMARTY_AUTH_TOKEN');
            $staticCredentials = new StaticCredentials($authId, $authToken);
            $client = (new ClientBuilder($staticCredentials))->buildUsStreetApiClient();
            $lookup = new Lookup();

            $lookup->setAddressee($request->name);
            $lookup->setStreet($request->street);
            $lookup->setCity($request->city);
            $lookup->setState($request->state);
            $lookup->setZipcode($request->zip);
            $lookup->setMaxCandidates(1);
            $client->sendLookup($lookup);

            $result = $lookup->getResult();

            if (empty($result))
            {
                abort(500, "No candidates. This means the address is not valid.");
            }

            return $result[0]->getMetadata()->getCountyName();
        }
        catch (SmartyException $ex)
        {
            abort(500, $ex->getMessage());
        }
        catch (Exception $ex)
        {
            abort(500, $ex->getMessage());
        }
    }
}
