<?php  ?>
<div class="write-comment">
      <h2>Tell us your thoughts</h2>

      <form action="<?php echo admin_url('admin-post.php') ?>" method="post">

        <input type="hidden" name="action" value="create_feedback">

        <label id="email-label">
          Email Address:
        <input type="email" name="email" data-validation="email"> 
        </label>

        <label>
          Your feedback:
          <textarea name="feedback"></textarea>
        </label>

        <button type="submit" name="Submit Feedback button" id="feedback-btn" >Submit Feedback</button>

      </form>
</div>
