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
        <h2 style="margin-top:0px">Video Read</h2>
        <table class="table">
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Url</td><td><?php echo $url; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('video') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>