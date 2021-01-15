<?php
    include 'User.php';

class Post
{
    private string $message;
    private User $sender;
    private bool $has_image;
    private string $image;

    public function __construct($user, $message, $has_image)
    {
        $sender = $user;
        $this->message = $message;
        $this->has_image = $has_image;
    }
}

?>