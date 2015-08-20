<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = [
		'title',
		'body',
		'published_at',
        'user_id' //temporary !!
	];

    protected $dates = ['published_at']; //convert date string to Carbon

    public function scopePublished($query){
        $query->where('published_at','<=', Carbon::now())->get();
    }

    public function scopeUnPublished($query){
        $query->where('published_at','>', Carbon::now())->get();
    }

    public function setPublishedAtAttribute($date){

        // set set date and time to 00:00:00
        //$this->attributes['published_at'] = Carbon::parse( $date);
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * An article is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo('App\User');
    }

}
