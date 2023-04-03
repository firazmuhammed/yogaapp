<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlogNewsLetter extends Mailable
{
    use Queueable, SerializesModels;
    public $blog;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $image = asset("images/blog/thumbnail/".$this->blog->thumbnail_image);
        return $this->markdown('admin.blogs.newsletter')
                    ->with('blog', $this->blog)
                    ->with('image', $image);
    }
}
