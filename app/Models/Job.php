<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\This;

class Job extends Model {

    use HasFactory, Notifiable;

    protected $table = 'job_listings';

    //protected $fillable = ['title', 'salary', 'employer_id']; //cette méthode nous permet d'eviter le remplissage en masse du formulaire ie specifier les attributs qui euvent être remplis par l'utilisateur

    protected $guarded = []; //celle-ci nous evite la verification du mass assignment mais il faut faire attention et etre d'accord avec les autres dev du meme projet lorsqu'on est en developpement

    public function employer () {
        return $this->belongsTo(Employer::class);
    }


    public function tags(){
        return $this->belongsToMany(Tag::class, foreignPivotKey:"job_listing_id");
    }
}
