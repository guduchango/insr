<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Img;
use App\Models\Traits\Uuids;

class Photo extends Model{

    use Uuids;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'extension',
        'imageable_id',
        'imageable_type',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /* morphTo */

    public function imageable()
    {
        return $this->morphTo();
    }

    /* Functions */

    /**
     * @return string
     */
    public function getCompanyOriginalImageUrl(){

        $url = url('photos/companies').'/'.$this->uuid.'.'.$this->extension;

        return $url;
    }

    /**
     * @return string
     */
    public function getCompanyThumbBigUrl(){

        $url = url('photos/companies').'/thumbX_'.$this->uuid.'.'.$this->extension;

        return $url;
    }

    /**
     * @return string
     */
    public function getCompanyThumbSmallUrl(){

        $url = url('photos/companies').'/thumbXX_'.$this->uuid.'.'.$this->extension;

        return $url;
    }

    /**
     * @param $photo
     */
    public function uploadCompanyPhoto($photo){

        $imageName = $this->uuid . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('photos/companies'), $imageName);
    }

    /**
     * @param $photo
     */
    public function uploadCompanyPhotoBig($photo){

        $imageName = $this->uuid . '.' . $photo->getClientOriginalExtension();
        $thumb  = Img::make($photo->getRealPath());
        $thumb->resize(intval(800), null, function($constraint) {
            $constraint->aspectRatio();
        });
        $thumb->save(public_path('photos/companies'). '/'.'thumbX_'.$imageName);
    }

    /**
     * @param $photo
     */
    public function uploadCompanyPhotoSmall($photo){

        $imageName = $this->uuid . '.' . $photo->getClientOriginalExtension();
        $thumb  = Img::make($photo->getRealPath());
        $thumb->resize(intval(450), null, function($constraint) {
            $constraint->aspectRatio();
        });
        $thumb->save(public_path('photos/companies'). '/'.'thumbXX_'.$imageName);
    }



}