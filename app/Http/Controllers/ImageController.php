<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Session;
use Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ImageService $imageService)
    {
         try {
            $images = $imageService->all();
            return view('home')->with('images', $images);
        } catch (\Exception $e) {
            return ['statusCode' => 403, 'error' => $e->getMessage()];
        }
    }

    public function store(Request $request, ImageService $imageService) 
    {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                try {
                    $imageService->uploadImage($request);
                    Session::flash('success', "Success!");
                    return \Redirect::back();
                } catch (Exception $e) {
                    return $e->getMessage();
                }
            }
        }
        abort(500, 'Could not upload image :(');
    }

    public function zipFiles(Request $request, ImageService $imageService) 
    {
        $zipFiles = $imageService->zipFiles($request->get('files'));
        return $zipFiles;
    }

    public function download(Request $request, $dir, $image) 
    {
        return Storage::download('public/' . $dir . "/" . $image);
    }

    public function downloadZip(Request $request, $file) 
    {
        return response()->download(storage_path('/app/public/zip/' . $file))->deleteFileAfterSend();
    }

    public function destroy($uuid, ImageService $imageService)
    {
        $imageService->deleteByUuid($uuid);
        return redirect('/');
    }
}
