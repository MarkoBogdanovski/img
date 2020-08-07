<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Models\Images;
use Webpatser\Uuid\Uuid;
use Storage;

class ImageService extends BaseService
{

    public function __construct(Images $model)
	{
		$this->model = $model;
    }

    /**
     * Validate file type, store it and add to the records
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function uploadImage(Request $request) 
    {
        $validated = $request->validate([
            'image' => 'mimes:jpg,jpeg,png,gif,webp|max:10000',
        ]);
        
        $name = explode('.', $request->image->getClientOriginalName());
        $extension = $request->image->extension();
        $fileSize = $request->image->getSize();
        $uuid = Uuid::generate(4);
        $fullName = $name[0] . "-" . $uuid .".".$extension;

        $request->image->storeAs('/public', $fullName);
        $url = Storage::url($fullName);

        $file = Images::create([
            'uuid' => $uuid->string,
            'name' => $name[0],
            'size' => $fileSize,
            'url' => $url,
            'created_at' => now()
        ]);
    }

    public function all() {
        $images = $this->model->all();
        $data = [];
       
        foreach($images as $image) {
            $name = explode('.', $image->name);
            $parsed['uuid'] = $image->uuid;
            $parsed['name'] = $image->name;
            $parsed['size'] = $this->formatSize($image->size);
            $parsed['date'] = $this->formatDate($image->created_at);
            $parsed['url'] = $image->url;
            $parsed['fullName'] = str_replace("/storage/", "", $image->url);

            array_push($data, $parsed);
        }

        return $data;
    }

    private function formatSize($size) { 
        if ($size >= 1073741824) {
            $size = number_format($size / 1073741824, 2) . ' GB';
        } elseif ($size >= 1048576) {
            $size = number_format($size / 1048576, 2) . ' MB';
        } elseif ($size >= 1024) {
            $size = number_format($size / 1024, 2) . ' KB';
        } elseif ($size > 1) {
            $size = $size . ' bytes';
        } elseif ($size == 1) {
            $size = $size . ' byte';
        } else {
            $size = '0 bytes';
        }

        return $size;
    } 

    private function formatDate($timestamp) {
        $timestamp = explode(" ", $timestamp);
        $date = str_replace("-", "/", $timestamp[0]);

        return $date;
    }
}