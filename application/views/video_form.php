<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Video <?php echo $button ?></h2>
		<p>If you wish to download the video and store it on the web server just include the video ID and not the full youtube.com URL in the URL field.</p>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Title <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Url <?php echo form_error('url') ?></label>
            <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
        </div>
		<div class="form-group">
			<label for="int">Category Id <?php echo form_error('category_id') ?></label>
            <select class="form-control" name="category_id" id="category_id">
				<option selected="selected" value="<?php echo $category_id; ?>"><?php echo $category_id; ?></option>
				<?php
				foreach($categories as $category){
				?>
				<option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
				<?php
				}
				?>
			</select>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('video') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>