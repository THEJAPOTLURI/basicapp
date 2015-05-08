<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model {

    protected $fillable = [

        'sender_title',
        'sender_age' ,
        'edu_qual' ,
        'description' ,
        'template',
        'content',
        'receiver_id' ,

    ];

    public function recipient()
    {
        return $this-> belongsTo('App\Receiver','receiver_id');
    }

    public function user()
    {
        return $this-> belongsTo('App\User');

    }
    public function getRecipientEmail()
    {
        return $this->recipient->receiver_email;
    }

    public function getOwnerEmail()
    {
        return $this->user->email;

    }

}
