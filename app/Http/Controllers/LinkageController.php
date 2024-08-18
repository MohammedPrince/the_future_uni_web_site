<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\Linkages;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class LinkageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $linkage_data = Linkages::all();

        $linkage_data = Linkages::where('link_del','=',0)->get();
        
        return view("admin.linkage",['linkage_data'=>$linkage_data]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'link_name' => ['required','string','max:255',Rule::unique('linkages' ,'Link_name') ],
            'link_type' => ['required'],
            'link_date' => ['nullable','date','max:255'],
            'link_duration' => ['nullable','string','max:255'],
            'link_url' =>  ['required','url','max:200',Rule::unique('linkages' ,'link_url')],
            'link_desc' => ['nullable','string','max:200'],
            'link_logo' => ['nullable','mimes:png,jpg,jpeg,ico','max:2048'],
            
        ],[
            'link_name.required' => 'Link Name is must.',
            'link_type.required' => 'Link Type is must.',
            'link_url.required' => 'Link URL is must.',
        ]);

            if(!$validate->fails()){

           

                if (Linkages::where('link_name', $request['link_name'])->count() > 0) {

                    return redirect('/linkage')->with('failure','Linkage already exists !');

                }else{

                    $imagePath = null;
                    $imageName = null;
                    if ($request->hasFile('link_logo')) {
                        $image = $request->file('link_logo');
                        $imageName = $image->getClientOriginalName();
                        $imagePath = $image->storeAs('linkages', $imageName, 'public');
                    }
                
                    $linkage = Linkages::create([
                        'link_name' => $request->input('link_name'),
                        'link_type' => $request->input('link_type'),
                        'link_date' => $request->input('link_date'),
                        'link_duration' => $request->input('link_duration'),
                        'link_url' => $request->input('link_url'),
                        'link_desc' => $request->input('link_desc'),
                        'link_logo' => $imageName,
                    ]);
                    // $user = User::create($request->all());

                    if($linkage){
                        return redirect('/linkage')->with('success','Linkage Created Successfully !');
                    }else{
                        return redirect('/linkage')->with('failure','Error While Creating Linkage !');
                    }
                }
            }else{
                return back()->withErrors($validate->errors())->withInput();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $linkage_data = Linkages::where('link_id', $id)->first();

        return view('admin.edit_linkage' , ['link_data' => $linkage_data]);

        // echo $linkage_data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {
    //    echo $id;

    $validate = Validator::make($request->all(), [
        'link_name' => ['required','string','max:255'],
        'link_type' => ['required'],
        'link_date' => ['nullable','date','max:255'],
        'link_duration' => ['nullable','string','max:255'],
        'link_url' =>  ['required','url','max:200'],
        'link_desc' => ['nullable','string','max:200'],
        'link_logo' => ['nullable','mimes:png,jpg,jpeg,ico','max:2048'],
        
    ],[
        'link_name.required' => 'Link Name is must.',
        'link_type.required' => 'Link Type is must.',
        'link_url.required' => 'Link URL is must.',
    ]);

        if(!$validate->fails()){

                $imagePath = null;
                $imageName = $request->input('old_image');
                if ($request->hasFile('link_logo')) {
                    $image = $request->file('link_logo');
                    $imageName = $image->getClientOriginalName();
                    $imagePath = $image->storeAs('linkages', $imageName, 'public');

                    $old_image = $request->input('old_image');

                    // delete old photo code
                    if ($old_image && Storage::disk('public')->exists('linkages/' . $old_image)) {
                        Storage::disk('public')->delete('linkages/' . $old_image);
                    }

                }
            
                $linkage = Linkages::where('link_id', $id)
                ->update([
                    'link_name' => $request->input('link_name'),
                    'link_type' => $request->input('link_type'),
                    'link_date' => $request->input('link_date'),
                    'link_duration' => $request->input('link_duration'),
                    'link_url' => $request->input('link_url'),
                    'link_desc' => $request->input('link_desc'),
                    'link_logo' => $imageName,
                ]);
                // $user = User::create($request->all());

                if($linkage){
                    return redirect('/linkage')->with('success','Linkage Updated Successfully !');
                }else{
                    return redirect('/linkage')->with('failure','Error While Updated Linkage !');
                }
         
        }else{
            return back()->withErrors($validate->errors())->withInput();
        }
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
        if (Linkages::where('link_id',$id)->update(['link_del' => '1'])){

            return redirect('/linkage')->with('success','Linke Deleted Successfully !');

        }else{
            return redirect('/linkage')->with('failure','Error While Deleting Linke !');
        }
    }
}
