<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'image'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
    
    //delete method overrided: delete also image associated
    public function delete(){
        if($this->attributes['image']){
            $file = base_path().$this->attributes['image'];
            
            if(File::isFile($file)){
                File::delete($file);
            }
        }

        parent::delete();
    }
}