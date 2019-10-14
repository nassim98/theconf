<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewerList extends Model
{
    protected $table = 'reviewerTable';
    protected $fillable = ['reviewerName','reviwerTheme','revisedId', 'idToRevise'];
}
