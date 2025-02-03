<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;

class DocxController extends Controller
{
    public function showForm()
    {
        return view('upload-docx');
    }

    public function uploadDocx(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:docx|max:10240', // max size: 10MB
        ]);

        // Store the file in the storage/app directory
        $path = $request->file('file')->store('docx_files');

        return redirect()->route('view-docx', ['filename' => basename($path)]);
    }

    // View the uploaded .docx file content
    public function viewDocx($filename)
{
    $filePath = storage_path("app/docx_files/{$filename}");

    // Check if the file exists
    if (!file_exists($filePath)) {
        abort(404, 'File not found.');
    }

    // Load the .docx file using PHPWord
    $phpWord = \PhpOffice\PhpWord\IOFactory::load($filePath);

    // Initialize an empty string to store the content
    $content = '';

    // Loop through sections and elements within those sections
    foreach ($phpWord->getSections() as $section) {
        foreach ($section->getElements() as $element) {
            // Check the type of the element and extract the text if available
            if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                // For TextRun elements, get the text
                foreach ($element->getElements() as $textElement) {
                    if ($textElement instanceof \PhpOffice\PhpWord\Element\Text) {
                        $content .= $textElement->getText() . ' ';
                    }
                }
            } elseif ($element instanceof \PhpOffice\PhpWord\Element\Text) {
                // For Text elements, get the text directly
                $content .= $element->getText() . ' ';
            // You can add more checks for other types of elements as needed.
        }
    }

    // Return the content to the view
    return view('view-docx', compact('content'));
}
}
