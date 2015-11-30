<label for="beverage_type">Beverage Type:</label><select id="beverage_type" class="input">
    <option value="1">Beer</option>
    <option value="2">Wine</option>
    <option value="3">Mixed Drink</option>
</select><br />
<label for="beverage_name">Beverage Name:</label><input type="text" id="beverage_name" placeholder="Enter Beverage Name" class="input" /><br />
<label id="beer_brewery_label" for="beer_brewery">Brewery:</label><input type="text" id="beer_brewery" placeholder="Enter Brewery" class="input" /><br id="beer_brewery_br" />
<label id="beverage_descrip_label" for="beverage_descrip">Beverage Description:</label><br /><textarea rows="4" cols="100" id="beverage_descrip" class="input" placeholder="Enter Description"></textarea><br />
<label for="rating">Rating:</label><input type="range" id="rating" min="0" max="100" /><label id="ratingCurrent"></label><br />
<label for="comment">Comment:</label><br /><textarea rows="4" cols="100" id="comment" class="input" placeholder="Enter a comment (optional)."></textarea><br />
<br /><input type="submit" id="submitButton" name="submitButton" value="Submit" />