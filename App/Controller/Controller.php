<?php 
namespace App\Controller;

class Controller {

    const REDIRECTIONS = [
        '301' => 'Moved Permanently',
        '302' => 'Moved Temporarily',
        '303' => 'See Other'
    ];

    protected function setFlash($type, $content)
    {
        $_SESSION['flash'] = compact('type', 'content');
    }

    protected function setErrors($errors, $post)
    {
        $_SESSION['post'] = $post;

        $content = '<span>Des erreurs sont survenu:</span><ul>';

        foreach ($errors as $error) {
        $content .= '<li>'.$error.'</li>';
        }
        $content .= '</ul>';

        $this->setFlash('danger', $content);
    }

    protected function str_random($length)
    {
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

    // protected function redirectTo($url, $code = 301)
    // {
    //     if (!in_array($code, self::REDIRECTIONS)) {
    //         $code = 301;
    //     }
    //     $inforedirect = self::REDIRECTIONS[$code];
    //     header("HTTP/1.1 {$code} {$inforedirect}", false, $code);
    //     header("location: {$url}");
    //     exit;
    // }
}
