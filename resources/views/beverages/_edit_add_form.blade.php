<label for="rating">Rating:</label><input type="range" id="rating" name="rating" min="0" max="100" /><label id="ratingCurrent"></label><br />
<label for="comment">Comment:</label><br /><textarea rows="4" cols="100" id="comment" name="comment" class="input" placeholder="Enter a comment (optional)."></textarea><br />
<input type="text" name="id" value="{{$beverage->beverage_id}}" hidden="hidden" />
<input type="text" name="url" value="{{URL::current()}}" hidden="hidden" />
<br /><input type="submit" id="submitButton" name="submitButton" value="Submit" />