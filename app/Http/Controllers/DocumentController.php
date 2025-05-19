<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Order;
use App\Models\ProductionOrder;
use App\Models\ProductionOrderDetails;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function downloadDocument($orderId, $userId)
    {
        // Fetch the order and user data
        $order = ProductionOrder::findOrFail($orderId);
        $user = User::findOrFail($userId);
        $products = ProductionOrderDetails::where('production_order_id', $orderId)->get();

        // Load the Word template
        $templatePath = storage_path('app/templates/template.docx');
        $templateProcessor = new TemplateProcessor($templatePath);

        // Clone the row for each product
        $templateProcessor->cloneRow('product_id', ceil(count($products) / 2));

        // Populate the product rows
        foreach ($products as $index => $product) {
            $rowNumber = floor($index / 2) + 1; // Rows start from 1
            $columnNumber = ($index % 2) + 1; // Columns are 1 or 2

            $templateProcessor->setValue("product_id_col{$columnNumber}#{$rowNumber}", $product->product_id);
            $templateProcessor->setValue("quantity_col{$columnNumber}#{$rowNumber}", $product->quantity);
        }

        // Replace placeholders with dynamic data
        $templateProcessor->setValue('user_name', $user->name);
        $templateProcessor->setValue('order_id', $order->id);

        // Save the modified document to a temporary file
        $fileName = "order_{$order->id}_user_{$user->id}.docx";
        $tempFilePath = storage_path("app/public/{$fileName}");
        $templateProcessor->saveAs($tempFilePath);

        // Provide the file for download
        return response()->download($tempFilePath)->deleteFileAfterSend(true);
    }
}
