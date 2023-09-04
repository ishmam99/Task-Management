<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::paginate(10);
        return view('dashboard.document.index',compact('documents'));
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
        $input = $request->validate([
            'name'      =>  'required|string',
            'type'      =>  'required|string',
            'department_id'      =>  'nullable',
        ]);
        $extension = $request->file('file')->extension();
      
        if($extension == 'jpg'|| $extension == 'jpeg' || $extension == 'png')
        {
            if($request->type != 'Image')
          
            return redirect()->back()->with('error','Document File type must be same!!');
        }
        elseif($extension == 'mp3')
         {   if ($request->type != 'Audio')
            {
                 return redirect()->back()->with('error', 'Document File type must be same!!');
              }  }
        elseif($extension == 'mp4' || $extension == 'avi' || $extension == 'mp4' || $extension == 'mpeg4')
         {   if ($request->type != 'Video')
            {
                 return redirect()->back()->with('error', 'Document File type must be same!!');
              }  }
        elseif($extension == 'pdf' )
         {   if ($request->type != 'PDF')
            {
                 return redirect()->back()->with('error', 'Document File type must be same!!');
              }  }
               
        elseif($extension == 'docx' )
         {   if ($request->type != 'Word')
            {
                 return redirect()->back()->with('error', 'Document File type must be same!!');
              }  }
        elseif($extension == 'xlsx' || $extension == 'csv' )
         {   if ($request->type != 'Excel')
            {
                 return redirect()->back()->with('error', 'Document File type must be same!!');
              }  }
        elseif($extension == 'pptx' || $extension == 'ppt' )
         {   if ($request->type != 'Power Point')
            {
                 return redirect()->back()->with('error', 'Document File type must be same!!');
              }  }
        elseif($extension == 'zip' || $extension == 'rar' )
         {   if ($request->type != 'Compressed')
            {
                 return redirect()->back()->with('error', 'Document File type must be same!!');
              }  }
       
              $input['file']  = uploadFile($request->file('file'));
        Document::create($input);
          
        return back()->with('success','Document Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('dashboard.document.edit',compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $input = $request->validate([
            'name'      =>  'required|string',
            'type'      =>  'required|string',
            'department_id'      =>  'nullable',
            'employee_id'      =>  'nullable',
            'status'            =>  'nullable'
        ]);
      $document->update($input);

        return back()->with('success', 'Document Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        deleteFile($document->file);
        $document->delete();
        return back()->with('success', 'Document Deleted Successfully');
    }
}
