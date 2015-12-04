<?php
/**
 * Created by PhpStorm.
 * User: throckt
 * Date: 11/24/2015
 * Time: 2:06 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;

class Beverage extends Model
{
    private $beverage_id;
    private $beverage_name;
    private $beverage_type;
    private $average_rating;
    protected $fillable = ["beverage_id","beverage_name","beverage_type","beverage_rating"];

    function __construct($beverage_id, $beverage_name, $beverage_type, $average_rating)
    {
        $this->beverage_id = $beverage_id;
        $this->beverage_name = $beverage_name;
        $this->beverage_type = $beverage_type;
        $this->average_rating = $average_rating;
    }

    /**
     * @return array
     */
    public function getBeverageId()
    {
        return $this->beverage_id;
    }

    /**
     * @param array $beverage_id
     */
    public function setBeverageId($beverage_id)
    {
        $this->beverage_id = $beverage_id;
    }

    /**
     * @return mixed
     */
    public function getBeverageName()
    {
        return $this->beverage_name;
    }

    /**
     * @param mixed $beverage_name
     */
    public function setBeverageName($beverage_name)
    {
        $this->beverage_name = $beverage_name;
    }

    /**
     * @return mixed
     */
    public function getBeverageType()
    {
        return $this->beverage_type;
    }

    /**
     * @param mixed $beverage_type
     */
    public function setBeverageType($beverage_type)
    {
        $this->beverage_type = $beverage_type;
    }

    /**
     * @return mixed
     */
    public function getAverageRating()
    {
        return $this->average_rating;
    }

    /**
     * @param mixed $average_rating
     */
    public function setAverageRating($average_rating)
    {
        $this->average_rating = $average_rating;
    }

    public function convertJson() {
        return "{\"beverage_id\":" . $this->beverage_id .
        ", \"beverage_name\":\"" . $this->beverage_name .
        "\", \"beverage_type\":\"" . $this->beverage_type .
        "\", \"average_rating\":" . $this->average_rating . "}";
    }

    public static function getAllCommentsByBeverage($beverage_id) {
        $conn = mysqli_connect(getenv('DB_HOST'),getenv('DB_USERNAME'),getenv('DB_PASSWORD'),getenv('DB_DATABASE'));
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT beverage_comments.comment_id, beverage_comments.beverage_id, beverages.beverage_name, users.user_fname, beverage_comments.comment_descrip, beverage_comments.rating
                FROM beverage_comments
                LEFT JOIN users
                ON beverage_comments.user_id=users.user_id
                LEFT JOIN beverages
                ON beverage_comments.beverage_id=beverages.beverage_id
                WHERE beverage_comments.beverage_id=" . $beverage_id . ";";
        $result = mysqli_query($conn,$sql);
        $s = "[";
        $numRows = mysqli_num_rows($result);
        if($numRows > 0) {
            for($i = 0; $i < $numRows; $i++) {
                $row = mysqli_fetch_assoc($result);
                $comment = new Comment($row["comment_id"],$row["beverage_id"],$row["beverage_name"],$row["user_fname"],$row["comment_descrip"],$row["rating"]);
                $temp = $comment->convertJson();
                $s .= $temp;
                if($i < $numRows-1) {
                    $s .= ", ";
                }
            }
        }
        $s .= "]";
        mysqli_close($conn);
        return $s;
    }

    public function addRatingOnBeverage($rating,$comment,$beverage_id,$user_id) {
        $conn = mysqli_connect(getenv('DB_HOST'),getenv('DB_USERNAME'),getenv('DB_PASSWORD'),getenv('DB_DATABASE'));
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO throckmorton_finalproject.beverage_comments
                (beverage_id, user_id, comment_descrip, timestamp, rating)
                VALUES (\'" . $beverage_id . "\', \'" . $user_id . "\', \'" . $comment . "\', \'" . Carbon::now()->toDateTimeString() . "\', \'" . $rating . "\');";
        $result = mysqli_query($conn,$sql);

    }

    public static function getAllBeverages() {
        $conn = mysqli_connect(getenv('DB_HOST'),getenv('DB_USERNAME'),getenv('DB_PASSWORD'),getenv('DB_DATABASE'));
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT throckmorton_finalproject.beverages.beverage_id, throckmorton_finalproject.beverages.beverage_name, throckmorton_finalproject.beverage_type.beverage_name AS beverage_type, AVG(throckmorton_finalproject.beverage_comments.rating) AS average_rating
                FROM throckmorton_finalproject.beverages
                LEFT JOIN throckmorton_finalproject.beverage_comments
                ON throckmorton_finalproject.beverages.beverage_id=throckmorton_finalproject.beverage_comments.beverage_id
                LEFT JOIN throckmorton_finalproject.beverage_type
                ON throckmorton_finalproject.beverages.beverage_type=throckmorton_finalproject.beverage_type.beverage_id
                GROUP BY throckmorton_finalproject.beverage_comments.beverage_id;";
        $result = mysqli_query($conn,$sql);
        $s = "[";
        //$s = "";
        $numRows = mysqli_num_rows($result);
        if($numRows > 0) {
            for($i = 0; $i < $numRows; $i++) {
                $row = mysqli_fetch_assoc($result);
                if(is_null($row["average_rating"])) {
                    $row["average_rating"] = "null";
                }
                $beverage = new Beverage($row["beverage_id"],$row["beverage_name"],$row["beverage_type"],$row["average_rating"]);
                $temp = $beverage->convertJson();
                $s .= $temp;
                if($i < $numRows-1) {
                    $s .= ", ";
                }
            }
        }
        $s .= "]";
        mysqli_close($conn);
        return $s;
    }
}
