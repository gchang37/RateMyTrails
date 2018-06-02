<?php  ?>
<div class="write-comment">
      <h2>Post a Comment</h2>

      <form action="<?php echo admin_url('admin-post.php') ?>" method="post">

      	<input type="hidden" name="action" value="create_comments">
        <label>
          Email Address:
          <input type="email" name="email">
          
        </label>

        <label>
          Level of Difficulty:
          <select name="levelOfDifficulty">
            <option value="easy">Easy</option>
            <option value="moderate">Moderate</option>
            <option value="intermediate">Intermediate</option>
            <option value="challenging">Challenging</option>
            <option value="advance">Advance</option>
          </select>
        </label>

        <label>
        	Would visit again:
        	<select name="wouldVisitAgain">
        		<option value="yes">Yes!</option>
        		<option value="no">No way!</option>
        	</select>
        </label>

        <label>
          Enter a Comment:
          <textarea name="comment"></textarea>
        </label>

        <button type="submit" name="helpfulButton" id="Helpfulbtn" alt="This post is helpful">Helpful</button>

        <button type="submit" name="notHelpfulButton" id="notHelpfulbtn" alt="This post is not helpful"> not Helpful</button>

        <button type="submit" name="button">Post Comment</button>

      </form>
</div>
