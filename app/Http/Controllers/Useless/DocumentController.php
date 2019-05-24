<?php

namespace App\Http\Controllers;

use App\Entities\Document;
use App\Entities\Documentable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{

    /**
     * Polymorphic Documents
     *
     * @param $id
     * @param Request $request
     * @return Document
     */
    public function documentable($id,  Request $request){

        $doc = array();
        foreach ($request->json('documents')as $documents){

        $validator = Validator::make($documents, [
            'number' => 'required',
            'name' => 'required',
            'description' => 'required',
//            'file' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'type' => 'in:Medical,Job Contract|required'
        ]);

        if ($validator->fails()){
            return response()->json(["errors" => $validator->messages()], 422);
        }

        if ($validator->passes()) {

            $document = new Document;

            $document->number = $documents['number'];
            $document->name = $documents['name'];
            $document->description = $documents['description'];
            $document->file = $documents['file'];
            $document->start_date = $documents['start_date'];
            $document->end_date = $documents['end_date'];
            $document->type = $documents['type'];

           if ($document['type']== 'Medical') {

               $destinationPath = public_path() . '/fonix/documents/medical_docs/';

           } else if ($document['type'] == 'Job Contract') {

               $destinationPath = public_path() . '/fonix/documents/job_contracts/';
           }

           $docName = str_random() . '.' .
               $request->file('file')->getClientOriginalExtension();

           $request->file('file')->move($destinationPath, $docName);

           $document->file = $docName;

            $document->save();



            $documentable = new Documentable();

            $documentable->document_id = $document->id;
            $documentable->doc_documentables_id = $id;
            $documentable->doc_documentables_type = 'App\Entities\\'.$documents['documentable'];

            $documentable->save();

            array_push($doc, $document);
//
//            return $document;
//
            }
        }

        return $doc;

    }

    public function store($id,  Request $request){

            $validator = Validator::make($request->json('documents'), [
                'number' => 'required',
                'name' => 'required',
                'description' => 'required',
//            'file' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'type' => 'in:Medical,Job Contract|required'
            ]);

            if ($validator->fails()){
                return response()->json(["errors" => $validator->messages()], 422);
            }

            if ($validator->passes()) {

                $document = new Document;

                $document->number = $request->json('documents')['number'];
                $document->name = $request->json('documents')['name'];
                $document->description = $request->json('documents')['description'];
                $document->file = 'name';
                $document->start_date = $request->json('documents')['start_date'];
                $document->end_date =$request->json('documents')['end_date'];
                $document->type = $request->json('documents')['type'];

//            if ($document['type']== 'Medical') {
//
//                $destinationPath = public_path() . '/fonix/documents/medical_docs/';
//
//            } else if ($document['type'] == 'Job Contract') {
//
//                $destinationPath = public_path() . '/fonix/documents/job_contracts/';
//            }
//
//            $docName = str_random() . '.' .
//                $request->file('file')->getClientOriginalExtension();
//
//            $request->file('file')->move($destinationPath, $docName);
//
//            $document->file = $docName;

                $document->save();



                $documentable = new Documentable();

                $documentable->document_id = $document->id;
                $documentable->doc_documentables_id = $id;
                $documentable->doc_documentables_type = 'App\Entities\\'.$request->json('documentable');

                $documentable->save();

            }

        return $document;

    }
}
