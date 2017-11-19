<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Banner;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banners = Banner::get();

        return view('banners.index', compact('banners'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products',
            'description' => 'required',
            'link' => 'string',
            'image' => 'mimes:jpeg,png|max:10240'
        ]);

        $data = $request->only('name', 'description' , 'link');

        if ($request->hasFile('image')) {
            $data['image'] = $this->savePhoto($request->file('image'));
        }

        $banner = Banner::create($data);

        \Flash::success($banner->name . ' saved.');
        return redirect()->route('banner.index');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banners.edit', compact('banner'));
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
        $banner = Banner::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|unique:products',
            'description' => 'required',
            'link' => 'string',
            'image' => 'mimes:jpeg,png|max:10240'
        ]);

        $data = $request->only('name', 'description' , 'link');

        if ($request->hasFile('image')) {
            $data['image'] = $this->savePhoto($request->file('image'));
            if ($banner->image !== '') $this->deletePhoto($banner->image);
        }

        $banner->update($data);

        \Flash::success($banner->name . ' updated.');
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        if ($banner->image !== '') $this->deletePhoto($banner->image);
        $banner->delete();
        \Flash::success('Banner deleted.');
        return redirect()->route('banner.index');
    }

     /**
     * Move uploaded photo to public/img folder
     * @param  UploadedFile $photo
     * @return string
     */
    protected function savePhoto(UploadedFile $image)
    {
        $fileName = str_random(40) . '.' . $image->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $image->move($destinationPath, $fileName);
        return $fileName;
    }

    /**
     * Delete given photo
     * @param  string $filename
     * @return bool
     */
    public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'img'
            . DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }

}
