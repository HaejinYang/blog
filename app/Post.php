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

    public function create()
    {
        return Adaptor::exec("INSERT INTO post(`user_id`, `title`, `content`) VALUES(?, ?, ?)",
            [$this->user_id, $this->title, $this->content]
        );
    }

    public function update()
    {
        return Adaptor::exec("UPDATE post SET `title` = ?, `content` = ? WHERE `id` = ?",
            [$this->title, $this->content, $this->id]
        );
    }

    public function delete()
    {
        return Adaptor::exec("DELETE FROM post WHERE `id` = ?", [$this->id]);
    }

    public static function get($id)
    {
        return current(Adaptor::getAll("SELECT * FROM post WHERE id = ?", [$id], \App\Post::class));
    }

    public function isOwner()
    {
        if (!array_key_exists('user', $_SESSION)) {
            return false;
        }

        return $this->user_id === $_SESSION['user']->id;
    }
}