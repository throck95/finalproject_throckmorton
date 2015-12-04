<?php
/**
 * Created by PhpStorm.
 * User: throckt
 * Date: 11/24/2015
 * Time: 2:06 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    private $comment_id;
    private $beverage_id;
    private $beverage_name;
    private $user_fname;
    private $comment_descrip;
    private $rating;
    protected $fillable = ["comment_id","beverage_id","user_fname","comment_descrip","rating"];

    function __construct($comment_id, $beverage_id, $beverage_name, $user_fname, $comment_descrip, $rating)
    {
        $this->comment_id = $comment_id;
        $this->beverage_id = $beverage_id;
        $this->beverage_name = $beverage_name;
        $this->user_fname = $user_fname;
        $this->comment_descrip = $comment_descrip;
        $this->rating = $rating;
    }

    public function convertJson() {
        return "{\"comment_id\":" . $this->comment_id .
        ", \"beverage_id\":" . $this->beverage_id .
        ", \"beverage_name\":\"" . $this->beverage_name .
        "\", \"user_fname\":\"" . $this->user_fname .
        "\", \"comment_descrip\":\"" . $this->comment_descrip .
        "\", \"rating\":" . $this->rating . "}";
    }

    /**
     * @return mixed
     */
    public function getCommentId()
    {
        return $this->comment_id;
    }

    /**
     * @param mixed $comment_id
     */
    public function setCommentId($comment_id)
    {
        $this->comment_id = $comment_id;
    }

    /**
     * @return mixed
     */
    public function getBeverageId()
    {
        return $this->beverage_id;
    }

    /**
     * @param mixed $beverage_id
     */
    public function setBeverageId($beverage_id)
    {
        $this->beverage_id = $beverage_id;
    }

    /**
     * @return mixed
     */
    public function getUserFname()
    {
        return $this->user_fname;
    }

    /**
     * @param mixed $user_fname
     */
    public function setUserFname($user_fname)
    {
        $this->user_fname = $user_fname;
    }

    /**
     * @return mixed
     */
    public function getCommentDescrip()
    {
        return $this->comment_descrip;
    }

    /**
     * @param mixed $comment_descrip
     */
    public function setCommentDescrip($comment_descrip)
    {
        $this->comment_descrip = $comment_descrip;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }


}