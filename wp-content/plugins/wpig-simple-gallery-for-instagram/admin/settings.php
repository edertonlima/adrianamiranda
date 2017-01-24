<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="wrap">
    <h1>First Steps</h1>
    <table class="form-table" >
	<input type="hidden" name="action" value="save_wpig_options" />  
	<?php wp_nonce_field("wpig_settings"); ?> 
	<tr>
	    <th scope="row">
		<label>Create New Application</label>
	    </th>
	    <td>
		Go to <a href="https://www.instagram.com/developer/clients/register/" target="_blank">Instagram Developer Center and create application</a>
	    </td>
	</tr>
	<tr>
	    <th scope="row">
		<label>In Valid redirect URIs section enter this: </label>
	    </th>
	    <td>
		<?php echo admin_url() . "options-general.php?page=wpig-settings"; ?>
	    </td>
	</tr>
    </table>
</div>
<div class="wrap">    
    <h1>Instagram Settings</h1>
    <?php if (isset($_GET['success']) && $_GET['success'] == '1') : ?>
        <div id='message' class='updated fade'><p><strong>Settings Saved</strong></p></div>
    <?php endif; ?>
    <?php if (isset($_GET['error']) && $_GET['success'] == '1') : ?>
        <div id='message' class='failed fade'><p><strong>Error Occurred: <?php echo $_GET['msg']; ?></strong></p></div>
    <?php endif; ?>
    <form method="post" action="admin-post.php" id="instagram-form">
	<table class="form-table" >
	    <input type="hidden" name="action" value="save_wpig_options" />  
	    <?php wp_nonce_field("wpig_settings"); ?> 
	    <tr>
		<th scope="row">
		    <label for="client_id">Client ID</label>
		</th>
		<td>
		    <input class="regular-text" type="text" name="client_id" value="<?php if (isset($options['client_id'])) echo $options['client_id']; ?>"/>
		</td>
	    </tr>
	    <tr>
		<th scope="row">
		    <label for="client_id">Client Secret:</label>
		</th>
		<td>
		    <input class="regular-text" type="text" name="client_secret" value="<?php if (isset($options['client_secret'])) echo $options['client_secret']; ?>"/>
		</td>
	    </tr>
	</table>
	<p class="submit">
	    <input type="submit" value="Save Values" class="button-primary"/>
	</p>
    </form>
</div> 
<div class="wrap"> 
    <h1>Get Access Token</h1>
    <table class="form-table">
	<tr>
	    <th scope="row">
		<label for="access_token">Access Token(If this field is empty or you want to change the user then click on sign in button below)</label>
	    </th>
	    <td>
		<input readonly class="regular-text" type="text" name="access_token" value="<?php if (isset($options['access_token'])) echo $options['access_token']; ?>"/>
	    </td>
	</tr>
    </table>
    <?php if (isset($instagram_link)): ?>
        <a class="instagram-login" href="<?php echo $instagram_link; ?>"></a><br />
    <?php endif; ?>	
</div> 
<div class="wrap">
    <h1>Gallery Images</h1>
    <form method="post" action="admin-post.php" id="gallery-form">
	<table class="form-table" >
	    <tr>
		<th scope="row">
		    <label>Click Load Images To Choose</label>
		</th>
		<td>
		    <ul class="gallery-items attachments"></ul>
		</td>
	    </tr>
	    <tr>
		<th scope="row">
		    <label for="columns">Gallery Column Number</label>
		</th>
		<td>
		    <select name="columns">
			<option value="1" <?php if (isset($options['gallery']['columns']) && $options['gallery']['columns'] == 1) echo "selected" ?>>1</option>
			<option value="2" <?php if (isset($options['gallery']['columns']) && $options['gallery']['columns'] == 2) echo "selected" ?>>2</option>
			<option value="3" <?php if (isset($options['gallery']['columns']) && $options['gallery']['columns'] == 3) echo "selected" ?>>3</option>
			<option value="4" <?php if (isset($options['gallery']['columns']) && $options['gallery']['columns'] == 4) echo "selected" ?>>4</option>
			<option value="6" <?php if (isset($options['gallery']['columns']) && $options['gallery']['columns'] == 6) echo "selected" ?>>6</option>
			<option value="12" <?php if (isset($options['gallery']['columns']) && $options['gallery']['columns'] == 12) echo "selected" ?>>12</option>
		    </select>
		</td>
	    </tr>
	    <input type="hidden" name="action" value="save_wpig_gallery" />  
	</table>
	<div style="clear: both">
	    <p class="submit">
		<input type="submit" value="Save Gallery" class="button-primary"/>
		<input type="button" value="Load Images" class="button-primary" id="load-img"/> 
	    </p>
	</div>
    </form>
</div>
<?php add_thickbox(); ?>
<div id="my-content-id" style="display:none;">
</div>

<a href="#TB_inline?width=100&height=75&inlineId=my-content-id" class="thickbox" id="modal-link"></a>