<?php

namespace App;

class PostTopic extends BaseModel
{
    //
    protected $table = "post_topics";

    public function scopeInTopic($query, $topic_id)
    {
        return $query->where('topic_id', $topic_id);
    }
}
