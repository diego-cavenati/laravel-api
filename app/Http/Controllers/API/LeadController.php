<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        //validazione
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        };

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save;

        Mail::to('admin@gmail.com')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}
