<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download($file)
    {
        $license = License::where('product_id', $file)->firstOrFail();
        $filePath = storage_path("app/public/{$license->product->file_path}");

        if (!file_exists($filePath)) {
            return "Arquivo não encontrado.";
        }

        return Response::download("$filePath");
    }
}
