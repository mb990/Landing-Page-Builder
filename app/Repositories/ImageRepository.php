<?php


namespace App\Repositories;


use App\Image;

/**
 * Class ImageRepository
 * @package App\Repositories
 */
class ImageRepository
{
    /**
     * @var Image
     */
    private $image;

    /**
     * ImageRepository constructor.
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->image->find($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->image->create([
//            'url' => $data['url'],
            'filename' => $data['filename'],
            'imageable_type' => $data['imageable_type'],
            'imageable_id' => $data['imageable_id']
        ]);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
