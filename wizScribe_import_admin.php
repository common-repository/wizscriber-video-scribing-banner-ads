<?php       if(isset($_POST['submit_test_wizScribe']) && $_POST['submit_test_wizScribe'] == "Y" ) {          //Form data sent				global $wpdb;				$table_name = $wpdb->prefix . "wizscribe";		        $firsttext = str_replace("\\", "", $_POST['firsttext']);                      $secondtext = str_replace("\\", "", $_POST['secondtext']);                     $actiononclick = $_POST['actiononclick'];  		        $finaltexttop = str_replace("\\", "", $_POST['finaltexttop']);             $finaltextbottom = str_replace("\\", "", $_POST['finaltextbottom']);            $actiononclickurl = str_replace("\\", "", $_POST['actiononclickurl']);  				$whentoappear = $_POST['whentoappear'];		$intervaltoappear = $_POST['intervaltoappear'];		$videotextTemplate = $_POST['videotextTemplate'];				$position = $_POST['position'];				$id = 1;		$wpdb->update( $table_name, array( 'firsttext' => $firsttext, 'secondtext' =>  $secondtext, 'actiononclick' => $actiononclick, 'finaltexttop' => $finaltexttop, 'finaltextbottom' => $finaltextbottom, 'actiononclickurl' => $actiononclickurl, 'whentoappear' => $whentoappear, 'intervaltoappear' => $intervaltoappear, 'videotextTemplate' => $videotextTemplate,'position' => $position ), array( 'id' => $id ) );		        ?>          <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  		        <?php  		    } else {  		global $wpdb;			$table_name = $wpdb->prefix . "wizscribe";			$getsettings = $wpdb->get_row("SELECT * FROM $table_name WHERE id = '1'", ARRAY_A); 		$firsttext = str_replace("\\", "", $getsettings['firsttext']);		$secondtext = str_replace("\\", "", $getsettings['secondtext']);		$actiononclick = $getsettings['actiononclick'];		$finaltexttop = str_replace("\\", "", $getsettings['finaltexttop']);		$finaltextbottom = str_replace("\\", "", $getsettings['finaltextbottom']);		$actiononclickurl = str_replace("\\", "", $getsettings['actiononclickurl']);		$whentoappear = $getsettings['whentoappear'];		$intervaltoappear = $_POST['intervaltoappear'];		$videotextTemplate = $_POST['videotextTemplate'];		$position = $getsettings['position'];		    } ?>  <div class="wrap">  	<div id = "subwrapleft">    <?php    echo "<h2>" . __( 'wizScriber Settings page', 'wizScribe_trdom' ) . "</h2>"; ?>            <form name="wizScribe_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  			<input type="hidden" name = "submit_test_wizScribe" value = "Y"/>		        <?php    echo "<h4>" . __( 'wizScriber Settings', 'wizScribe_trdom' ) . "</h4>"; ?>          <p><?php _e("First Row Message: " ); ?><input type="text" style = "margin-left:75px;" name="firsttext" value="<?php echo $firsttext; ?>" size="20" maxlength="23"><?php _e(" Text to appear on first row. (Max 23 chars)" ); ?></p>          <p><?php _e("Second Row Text: " ); ?><input type="text" style = "margin-left:83px;" name="secondtext" value="<?php echo $secondtext; ?>" size="20" maxlength="23"><?php _e(" Text to appear on second row. (Max 23 chars)" ); ?></p>          <p><?php _e("End Video text on Top: " ); ?><input type="text" style = "margin-left:53px;" name="finaltexttop" value="<?php echo $finaltexttop; ?>" size="20" maxlength="13"><?php _e(" Text to show on end of video on top. (Max 13 chars)" ); ?></p>          <p><?php _e("End Video text on Bottom: " ); ?><input type="text" style = "margin-left:30px;" name="finaltextbottom" value="<?php echo $finaltextbottom; ?>" size="20" maxlength="13"><?php _e(" Text to show on end of video on bottom. (Max 13 chars)" ); ?></p>          <p><?php _e("Template for video text: " ); ?>            <span style = "margin-left:110px;"></span>                <select id="videotextTemplate" name="videotextTemplate">                    <option value="ChalkboardSmall" <?php if($post->wizscriber_videotextTemplate == "ChalkboardSmall"){echo 'selected';}?>>Chalkboard Small</option>                    <option value="WhiteboardSmall" <?php if($post->wizscriber_videotextTemplate == "WhiteboardSmall"){echo 'selected';}?>>Whiteboard Small</option>                    <option value="coverimg" <?php if($post->wizscriber_videotextTemplate == "coverimg"){echo 'selected';}?>>Paper Image</option>                </select>            <span style = "margin-left:80px;">                <?php _e(" Select template for video text." );?>            </span>        </p>        <hr />           <p><?php _e("Action on Click " ); ?> <input type="radio" name="actiononclick" style = "margin-left:103px;" value="1" size="20" <?php if($actiononclick == "1"){echo 'checked="checked"';} ?> > Yes <input type="radio" name="actiononclick" style = "margin-left:30px;" value="0" size="20" <?php if($actiononclick == "0"){echo 'checked="checked"';} ?>> <span style = "margin-right:68px;">No</span> <?php _e(" Enable clickable link on end of video" ); ?></p>          <p><?php _e("Enter url where to go after click: " ); ?><input type="text" name="actiononclickurl" value="<?php echo $actiononclickurl; ?>" size="20"><?php _e(" Enter url where to go after clicking on link ( without http:// )" ); ?></p>  		<p><?php _e("When to play: " ); ?><span style = "margin-left:110px;"><?php _e(" after: " ); ?></span><input type="text" name="whentoappear" value="<?php echo $whentoappear; ?>" size="2"><?php _e(" sec." ); ?><span style = "margin-left:80px;"><?php _e(" Enter seconds when you want video to start to play." ); ?></span></p> 		<p><?php _e("How often a visitor would see: " ); ?>            <span style = "margin-left:110px;"></span>                <select id="intervaltoappear" name="intervaltoappear">                    <option value="once" <?php if($post->wizscriber_intervaltoappear == "once"){echo 'selected';}?>>Once</option>                    <option value="once_per_day" <?php if($post->wizscriber_intervaltoappear == "once_per_day"){echo 'selected';}?>>Once Per Day</option>                    <option value="once_per_session" <?php if($post->wizscriber_intervaltoappear == "once_per_session"){echo 'selected';}?>>Once Per Session</option>                    <option value='once_per_week' <?php if($post->wizscriber_intervaltoappear == "once_per_week"){echo 'selected';}?>>Once Per week</option>                </select>            <span style = "margin-left:80px;">                <?php _e(" Select how often a visitor would see." );?>            </span>        </p>				<p><?php _e("Position to Show: " ); ?>			<select style = "margin-left:83px;" name="position" id="position">				<option value="right" <?php if($position == "right") echo 'selected'; ?>>Bottom-Right</option>				<option value="left" <?php if($position == "left") echo 'selected'; ?>>Bottom-Left</option>				<option value="middle" <?php if($position == "middle") echo 'selected'; ?>>Middle</option>			</select>				<span style = "margin-left:68px;"><?php _e(" Where do you want wizscribe to appear." ); ?></span></p>				<p>Copy Code and paste it in page in which you want to appear &rarr; <code> [wizScribe] </code></p>                        <p class="submit">  		        <input type="submit" name="Submit" value="<?php _e('Update Options', 'wizScribe_trdom' ) ?>" class = "button-primary revblue"/>  		        </p>      </form> </div>	<div id = "subwrapright">	<?php    echo "<h2 style = 'margin-left:100px;'>" . __( 'wizScriber Live Preview', 'wizScribe_trdom' ) . "</h2>"; ?> <br />	<?php    echo "<h4 style = 'margin-left:95px;'>" . __( 'Check how animation will look on page.', 'wizScribe_trdom' ) . "</h4>"; ?>	<br /> 	<?php require('wizScribeSchell/wizScribe_main_content.php'); ?>		<input type="button" name="Submit" style = "margin-left:50px;margin-top:30px;" value="<?php _e('Preview', 'wizScribe_trdom' ) ?>" id = "idstartprev" onclick = "buttonclickstartprev()" class = "button-primary revblue"/>  </div></div>  