<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Request;
use Validator,Redirect;
use App\Category;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor/category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $address = Request::url('/Incometax.xlsx');
        // $address = '.Incometax.xlsx';
        $data = Excel::import($address, function($reader) {})->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->category_name);
        $validator = Validator::make($request->all(),[
            'category_name' => 'required|string|max:255|nullable',
            'description'=> 'required|string|max:255|nullable',
            'picture_url'=> 'required|string|max:255|nullable',
        ]);

        if($validator->fails()){
            $arr = array('msg' => $validator->errors(), 'status' =>false);

        }
        else{
           try{
                $check = Category::create($request->all());
                $arr = array('msg' => 'Something goes to wrong. Please try again!', 'status' =>false);
                if($check){ 
                    $arr = array('msg' => 'Successfully category created.', 'status' => true);
                }
            }catch(QueryException $ex){
                $arr = array('msg' => $ex->getMessage(), 'status' => false);
            } 
        }
        
        
        return response()->json($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
