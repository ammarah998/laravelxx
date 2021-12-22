<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_attachments extends Model
{
    public function section(){
        return $this->belongsTo('App\sections');
    }
}
