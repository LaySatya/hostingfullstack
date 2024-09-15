<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();               // query all data 

        return response()->json([                   // return data as json or object
            'results' => $customers
        ], 200);
    }
    public function show($id){
        $customer = Customer::find($id);           // search data by id from database

        if(!$customer){                            // check if there no data found 
            return response()->json([
                'message' => 'Customer not found'
            ], 404);
        }

        return response()->json([                   // otherwise return that data if data have been found
           'results' => $customer
        ], 200);
    }

    public function addNew(CustomerStoreRequest $request){
        try{
            Customer::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'tel' => $request->tel,
                'email' => $request->email,
            ]);
            return response()->json([
                'message' => 'Customer added successfully.'
            ], 200);
        }catch(\Exception $e){
            return response()->json([                   // return the error message
                'message' => 'Something went wrong.'
            ], 500);
        }
    }

    public function update(CustomerStoreRequest $request , $id){
        try{
            // find the customer
            $customers = Customer::find($id);
            if(!$customers){
                return response()->json([
                    'message' => 'Customer not found.'
                ], 404);
            }
            // update the customer data by id
            $customers->first_name = $request->first_name;
            $customers->last_name = $request->last_name;
            $customers->dob = $request->dob;
            $customers->gender = $request->gender;
            $customers->tel = $request->tel;
            $customers->email = $request->email;
            // save to updated
            $customers->save();
            // return successfully message after been updated.
            return response()->json([
                'message' => 'Customer have been updated successfully.'
            ], 200);

        }catch(\Exception $e){
            return response()->json([                           // catch the error message
                'message' => 'Something went wrong.'
            ], 500);
        }
    }


    public function delete($id){
        try{
            // find the data by  id
            $customer = Customer::find($id);
            if(!$customer){
                return response()->json([
                    'message' => 'Customer not found.'
                ]);
            }
            
            // delete the customer data 
            $customer->delete();
            return response()->json([
                'message' => 'Customer have been deleted successfully.'
            ]);

        }catch(\Exception $e){                  // catch any errors
            return response()->json([
                'message' => 'Something went wrong.'
            ], 500);
        }
    }
}
