<?php  ?>
<div class="write-comment">
      <h2>Post a Comment</h2>

      <form action="<?php echo admin_url('admin-post.php'); ?>" method="post">
        <input type="hidden" name="action" value="create_comments">

        <input type="hidden" name="slug" value="<?php echo $post->post_name; ?>">

        <input type="hidden" name="permalink" value="<?php echo get_permalink(); ?>">

        <label>
          Email Address:
          <input type="email" name="email">
          
        </label>

        <label>
          Level of Difficulty:
          <select name="levelOfDifficulty">
            <option value="0">Level 0: Easy</option>
            <option value="1">Level 1: Moderate</option>
            <option value="2">Level 2: Intermediate</option>
            <option value="3">Level 3: Challenging</option>
            <option value="4">Level 4: Advance</option>
          </select>
        </label>

        <label>
        	Would visit again:
        	<select name="wouldVisitAgain">
        		<option value="1">Yes!</option>
        		<option value="0">No way!</option>
        	</select>
        </label>

        <label>
          Enter a Comment:
          <textarea name="comment"></textarea>
        </label>

        <button type="submit" name="button">Post Comment</button>