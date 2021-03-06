<?php

namespace Ibbr;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    
    public function arquivos(){
        return $this->hasMany('Ibbr\Arquivo');
    }
    
    public function ytanexos(){
        return $this->hasMany('Ibbr\Ytanexo');
    }
    
    public function anao()
    {
        return $this->hasOne('Ibbr\Anao', 'biscoito', 'biscoito');
    }
    
    public function ban()
    {
        return $this->hasOne('Ibbr\Ban');
    }
    
    public function board()
    {
        return $this->hasOne('Ibbr\Board', 'sigla','board');
    }
    
}
