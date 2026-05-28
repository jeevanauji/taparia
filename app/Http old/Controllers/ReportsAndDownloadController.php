<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportsAndDownloads; 

class ReportsAndDownloadController extends Controller
{
    public function index()
    {
        $reportsAndDownloads = ReportsAndDownloads::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        return view('backend.reportsanddownloads.index', compact('reportsAndDownloads'));
    }
    
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'contentType' => 'required',
            'contentName' => 'required',
            'pdfFile' => 'required'
        ]);
        
        if ($request->file('pdfFile')) {
            $contentPdfFile = $request->file('pdfFile');
            $destinationPath = public_path('uploads/pdfFile');
            $fileName = uniqid() . '.' . $contentPdfFile->getClientOriginalExtension();
            $contentPdfFile->move($destinationPath, $fileName);
            $pdfFile = 'uploads/pdfFile/' . $fileName;
        } else {
            $pdfFile = '';
        }
    
        $storeContent = ReportsAndDownloads::create([
            'contentType' => $request->input('contentType'),
            'contentName' => $request->input('contentName'),
            'pdfFile' => $pdfFile
        ]);
           
        if ($storeContent) {
            return redirect()->route('reportsAndDownloads.index')->with('success', 'Content successfully added!');
        } else {
            return redirect()->route('reportsAndDownloads.index')->with('error', 'Content creation failed!');
        }
    }
    
    public function edit($id)
    {
        $reportAndDownloadInfo = ReportsAndDownloads::findOrFail($id);
        return view('backend.reportsanddownloads.edit', compact('reportAndDownloadInfo'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'contentType' => 'required',
            'contentName' => 'required'
        ]);
        
        if ($request->file('pdfFile')) {
            $contentPdfFile = $request->file('pdfFile');
            $destinationPath = public_path('uploads/pdfFile');
            $fileName = uniqid() . '.' . $contentPdfFile->getClientOriginalExtension();
            $contentPdfFile->move($destinationPath, $fileName);
            $pdfFile = 'uploads/pdfFile/' . $fileName;
        } else {
            $pdfFile = $request->oldPdfFile;
        }
    
        $reportAndDownload = ReportsAndDownloads::findOrFail($id);
        $reportAndDownload->contentType = $request->contentType;
        $reportAndDownload->contentName = $request->contentName;
        $reportAndDownload->pdfFile = $pdfFile;
        $reportAndDownload->save();

        if ($reportAndDownload) {
            return redirect()->route('reportsAndDownloads.index')->with('success', 'Content successfully updated!');
        } else {
            return redirect()->route('reportsAndDownloads.index')->with('error', 'Failed to update the content. Please try again.');
        }
    }
    
    public function softDelete($id)
    {
        $reportAndDownload = ReportsAndDownloads::findOrFail($id);
        $reportAndDownload->update(['isDeleted' => '0']);

        if ($reportAndDownload) {
            return redirect()->route('reportsAndDownloads.index')->with('success', 'Content successfully deleted!');
        } else {
            return redirect()->route('reportsAndDownloads.index')->with('error', 'Failed to delete the content. Please try again.');
        }
    }
}
