<?php


namespace App\Repositories;


use App\Image;

class ImageRepository
{
    /**
     * @var Image
     */
    private $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function find($id)
    {
        return $this->image->find($id);
    }

    public function store($data)
    {
        return $this->image->create([
//            'url' => $data['url'],
            'filename' => $data['filename'],
            'imageable_type' => $data['imageable_type'],
            'imageable_id' => $data['imageable_id']
        ]);
    }

    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
