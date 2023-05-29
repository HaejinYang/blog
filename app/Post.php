<?php

namespace App;

use Thumbsupcat\IcedAmericano\Database\Adaptor;

class Post
{
    public function user()
    {
        return current(Adaptor::getAll("SELECT * FROM user WHERE `id` = ?", [$this->user_id], \App\User::class));
    }

    public function getCreatedAt()
    {
        return date('h:i A, M', strtotime($this->created_at));
    }

    public function getUsername()
    {
        return $this->user()->getUsername();
    }

    public function getSummary()
    {
        return filter_var(mb_substr(strip_tags($this->content), 0, 200), FILTER_SANITIZE_SPECIAL_CHARS);
    }
}