

<input type="hidden" id="user_sess_request" value="<?php echo $self_view;?>"  />
<?php
	
	$profile_photo = url( '/css/img/user-img.png' );
	$width = 30;
	if( $self_view == 1 )
	{
		
		$user = Session::get('user');
	}
	else
	{
		
		$user = $user_data;
		
	}
	
	
	if( $user -> profile_photo != '' )
	{
		$width = $width + 5;
		?>
        <input type="hidden" id="dp-flag" value="1" />
        <?php
		if( $user -> profile_photo_custom == 1 )
		{
			$profile_photo = url('/user_profiles/'. $user -> profile_photo ) ;
		}
		else
		{
			$profile_photo =  $user -> profile_photo;
		}
	}
	else
	{
		?>
        <input type="hidden" id="dp-flag" value="0" />
        <?php	
	}
	$position = '0px';
	if( $user -> cover_position != '0')
	{
		$position =  $user -> cover_position;
	}
	$sid_1 = ''; $sid_2 = ''; $sid_3 = '';
	if( $user -> school_one != NULL &&   $user -> school_one  != '' )
	{
		$sid_1 = $user -> school_one;
	}
	if( $user -> school_two != NULL &&   $user -> school_two  != '' )
	{
		$sid_2 = $user -> school_two;
	}
	if( $user -> school_three != NULL &&   $user -> school_three  != '' )
	{
		$sid_3 = $user -> school_three;
	}
	
?>
<input type="hidden" id="uid" value="<?php echo $user -> id ;?>"  />
<input type="hidden" id="user_type" value="<?php echo $user -> type ;?>"  />
<input type="hidden" id="sid_1" value="<?php echo $sid_1 ;?>"  />
<input type="hidden" id="sid_2" value="<?php echo $sid_2 ;?>"  />
<input type="hidden" id="sid_3" value="<?php echo $sid_3 ;?>"  />
<input type="hidden" id="membership_status" value="<?php echo $membership_status ;?>"  />


<div class="loader"> <div class="lds-ellipsis"><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div></div>


 
 <header>
        <div class="container edge">
            <div class="row no-gutters">
                 <a href="" class="btn-edit btn-edit-cover js_edit_cover"><svg class="icon icon-mode_edit"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-mode_edit"></use></svg></a>
                <div class="col-12 col-md-2 align-self-end">
                     <a href="" class="btn-edit btn-edit-cover  js_edit_dp"><svg class="icon icon-mode_edit"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-mode_edit"></use></svg></a>
                    <a href="" class="logo"><img  src="<?php echo $profile_photo;?>" alt="Expats' Profile"></a>
                </div>
                <div class="col-12 col-md-7  u-name  align-self-end">
                    <h1><?php echo $user -> first_name.' '.$user -> last_name;?></h1>
  					<em class="recent_job_em"><?php echo $user -> recent_job;?></em>
                </div>
                <div class="col-12 col-md-3 align-self-end">
                     <?php if( $self_view != 1 ) {?> <button  data-id="<?php echo $user -> id ;?>"  class="btn  js_follow_user  follow">Follow</button> <?php }  ?>
                    <small class="followers">
					<?php
						if( $user -> followers == 0 )
						{	
							echo 'No followers';
						}
						else
						{
							 echo  ''.   $user -> followers.' followers' ;
						} 					
					?>
                    
                    
                    
                    </small>
                </div>
              
                <div class="only-desktop  parent-school-badges js_parent-school-badges">
                </div>
            </div>
            
            <?php if( $user -> cover_image == ''){ ?> <input type="hidden" id="cover-photo-flag" value="0"  /><?php } else { $width = $width + 5; }?>
            <div class="cover " <?php if( $user -> cover_image != ''){ ?>  style="background:linear-gradient(rgba(0,0,0,0) 64%, rgba(0,0,0, .53)), url('<?php echo url('user_profiles/'. $user -> cover_image) ;?>') 0px <?php echo $position;?>;" <?php } else{  ?>  style="background:rgba(62, 61, 149, 0.7);"   <?php } ?> ></div>
            <div class="fit-cover"><div class="fit-cover-text">Drag to Reposition Cover</div></div>
            <button type="button"  class="btn btn-sm btn-outline-primary js_save_cover_design save-cover">Save</button>
            
        </div>
    </header>




    <nav class="sticky profile">
        <span class="menu" onclick="openNav()"><svg class="icon icon-menu"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-menu"></use></svg>Profile Navigation</span>
        <ul id="nav" class="sidenav profile-nav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <li class="current introduction"><a href="#intro">Introduction</a></li>
            <li><a href="#education">Education</a></li>
            <li><a href="#experience">Experience</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#recommend">Recommendation</a></li>
            <li><a href="#publication">Publications</a></li>
            <li><a href="#my_follower">Followers</a></li>
			<?php  if( $self_view != 1 ) {?><li><a href="" class="js_inbox">Message</a></li><?php } ?>
            <?php  if( $self_view == 1 ){?><li><a href="#invite_friend">Invite Friends</a></li><?php } ?>
            
			<?php 
					
					 if( $self_view != 1 ) 
					 {
						
						if( $block == 0 )
						{
				
			?>
            <li><a href=""  data-status="1"  data-id="<?php echo  $user -> id;?>"  class="js_block_user">Block</a></li>
			
			<?php } else { ?>
            
            <li><a href="" data-status="0"  data-id="<?php echo  $user -> id;?>"  class="js_block_user">Unblock</a></li>
            
            <?php } }  ?>

        </ul>
    </nav>

    <div id="canvas_nav" class="overlay"></div>


  
  
    <main class="two-cloumn profile-ui-page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-left">
                
                <?php
				 	if( $user -> type != 'teacher'  )
					{
				 ?>
                 <div class="frame parent-join only-mobile epc-join">
                	 <div class="only-mobile  js_parent-school-badges"><h3>Associated <span>School</span></h3></div>
                </div>
                <?php  } ?>
             		  <?php
                	  if( $twitter_name != '' ) 
						{
							?>
                            <div class="frame" >
                             <h3>Twitter <span>Feed</span></h3>
                              <button type="button"  class="btn sh-twt btn-cta">Show Twitter Feed</button>
                            </div>
							
							<?php
						}
					
						?> 
                        
               <?php  if( $self_view == 1 ){?>
                <div class="frame epc-join ">
               		 <h3>Invite <span>Friends</span></h3>
                	<div class="alert alert-danger text-center" style="">Your invitation was accepted by <span class="accepted_text"></span> Members</div>
                </div>
                <?php } ?>
                 <?php
				 	if( $user -> type == 'teacher' && $self_view == 1 )
					{
				 ?>
                 <div class="frame share job-info widget epc-join pro-widget" >
                 	<h3>Expat <span>Teachers Club</span></h3>
                    <?php
						if( $user -> verified_school == 0 )
						{
					?>
                    <p>want to know more about ETC membership and deals <a target="_blank" href="{{ asset('/expat-teachers-club') }}">here</a></p>
                    <div>
                	    <button type="button"  class="btn join-now-epc btn-cta">Join Now</button>
                    </div>
                    
                    <?php } else { ?>
                     <p>You are a member of the Expat Teachers Club. Know more about ETC <a target="_blank" href="{{ asset('/expat-teachers-club') }}">here</a></p>
                    
                    <?php  } ?>
                 </div>
                 <?php  } ?>
                
               
               
                <?php 
					
					if( $self_view != 1 )
					{
						if ( $user -> interested_in_work != 0 || $user -> type == 'teacher'  )
						{ 
					?>
                         <div class="frame share job-info widget epc-join pro-widget" >
                            <h3>Recommend <span> <?php echo $user -> first_name.' '. $user -> last_name;?></span></h3>
                            <p>If you know <?php echo $user -> first_name.' '. $user -> last_name;?> or you have worked together, write a recommendation</p>
                            <div> <button type="button"  class="btn js_recommend btn-cta">Write Recommendation</button></div>
                        </div>
				<?php }
					
					} ?>
				
                
                
              		<?php  
					if( $self_view == 1 )
                    {
					?>
              		  <div class="frame u-name pro-widget" >
                        <h3><?php echo $user -> first_name.' '.$user -> last_name;?></h3>
                        <strong>Profile Completeness</strong>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:30%"></div>
                        </div>
                     </div>
                <?php } ?>
                
               
   <?php if( $user -> contact_number == '' ){?> <input type="hidden" id="contact-me-flag" value="0" />  <?php } else { $width = $width + 10; }?>              
                    <div class="frame share job-info widget" >
                        <a href="" class="btn-edit d-none js_update_contact" ><svg class="icon icon-mode_edit"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-mode_edit"></use></svg></a>
                        <ul class="job-stats">
 <?php if( $user -> recent_school != '' ){?><li><strong>Working at:</strong><p> <?php echo $user -> recent_school;?></p></li><?php } ?>
<li  <?php if( $user -> email == '' ){?> class="d-none" <?php }?>><strong>Email:</strong><p><a href="mailto:<?php echo $user -> email;?>"><?php echo $user -> email;?></a></p></li>
 <?php if ( $user -> mobile_number_public == 1 ) {?><li  <?php if( $user -> contact_number == '' ){?> class="d-none" <?php }?>><strong>Contact No:</strong><p class="js_cn"> <?php echo $user -> contact_number;?></p></li>
<?php } ?>
<li  <?php if( $user -> skype == '' ){?> class="d-none" <?php }?>><strong>Skype:</strong><p class="js_skype"> <?php echo $user -> skype;?></p></li>
<li  <?php if( $user -> birthday == '' ){?> class="d-none" <?php }?>><strong>Birthday:</strong><p class="js_birthday"> <?php echo $user -> birthday;?></p></li>
<li  <?php if( $user -> address == '' ){?> class="d-none" <?php }?>><strong>Current Address:</strong><p class="js_address"> <?php echo $user -> address;?></p></li>

<?php  if( $self_view == 1 ){ if( $user -> skype == '' ){?><li><a class="js_update_contact text-center" href="">Add more information</a> </li><?php }} ?>





                        </ul>
                    </div>
                    
                    
                    <?php
						$tutoring_classs = "";
						if( $user -> tutor == 1 )
						{
							$tutoring_classs = "active";
						}
						
					
                    
                    
                    if( $self_view == 1 )
                    {
                        
                        ?>
                         <div  class="frame filters share job-info t-avail widget" >
                       <p class=" lead" style="clear:both;"> Available for tutoring </p>
                       <a href=""  class="new-checkbox <?php echo $tutoring_classs;?> js_tutor">
                            <span>
                                <svg class="icon icon-square-o"><use xlink:href="{{ asset('js/plugins/menu/symbol-defs.svg') }}#icon-square-o"></use></svg>
                                <svg class="icon icon-check-square-o"><use xlink:href="{{ asset('js/plugins/menu/symbol-defs.svg') }}#icon-check-square-o"></use></svg>
                            </span> 
                           <em> Check if available </em>
                        </a>
                       <?php if( $tutoring_classs == 'active' ) {?> <p class="itutormsg"><i>I confirm I have the necessary permissions to undertake tutoring</i></p> <?php }?>
                      </div>
                        <?php
                    }
                    else
                    {
                        
                        $user = $user_data;
						 if( $user -> tutor == 1 ) {
						?>
                         <div    class="frame filters share job-info widget" >
                     	  <p class=" lead" style="clear:both;"> Yes, available for tutoring </p>
                        </div>
                        <?php
						 }
                    }
					?> 
                     
                    
                    
                    
                    
                    
                    <div class="frame share job-info widget" >
                        <a href="" class="btn-edit d-none js_update_skills" data-value="<?php echo $user -> spec;?>" ><svg class="icon icon-mode_edit"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-mode_edit"></use></svg></a>
                       
                      
                       
                       
                       
                        <p class="lead">Specialization</p>
                        <ul class="spec-list">
                        	<?php
							 if( $user -> spec == '' ){ ?><li><p>No specialization added</p></li>  <?php } 
							 $spec = explode(',', $user -> spec) ;
							?>
                                <li>
                               <?php
								foreach ( $spec as $o )
								{
									if(  $o != ''  )  
									{	
									?>
                                    <p class="skills"><?php  echo $o ;?></p>
                                    <?php
									}
								}
							?>
                            </li>
                            
                        </ul>
                        
                       
                        
                        
                        
                        
                    </div>
                </div>
                
                
                
                
                
                <div class="col-12 col-md-8 col-right pro-edit">
                
                <?php  if( $self_view == 1 ){?> 
                
                	<div class="alert alert-success about-alert text-center" style="">Click <a href="{{ url('user/settings-basic')  }}">here</a> to edit or delete your classifieds and review your recommendations</div>
                 <?php
                	  if( $twitter_name != '' ) 
						{
							?>
                                          <div class="alert alert-success about-alert text-center" style=""><?php echo 'You are authenticated as '. $twitter_name;?>. <a class="remove_twitter" href="">Remove your twitter account</a></div>
                                          
                                          <div class="alert alert-danger about-alert text-center" style="">Update twitter feed <a href="https://www.expatsschools.com/oauth_callback/twitter?login=1">click here</a> to authorize your twitter profile to get your twitter feed.</div>


                        <?php
					}
					else
					{
						?>
                                          <div class="alert alert-success about-alert text-center" style="">Click <a href="https://www.expatsschools.com/oauth_callback/twitter?login=1">here</a> to authorize your twitter profile to get your twitter feed.</div>

                        <?php	
					}
					
				?>
                   <?php } ?>
                    <div class="frame intro" id="intro">
                        <a href="" class="btn-edit d-none js_edit_intro"><svg class="icon icon-mode_edit"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-mode_edit"></use></svg></a>
                        <h2>About me/Biography</h2>
                        <?php if (  $user -> about == '' ) {?> <input type="hidden" id="about-me-flag" value="0" /> <?php } else { $width = $width + 10; } ?>
                        <p><?php echo $user -> about;?></p>
                    </div>
                    <input type="hidden" id="progress_width" value="<?php echo $width;?>" />
                    <input type="hidden" id="education-flag" value="0"  />
                    <input type="hidden" id="experience-flag" value="0"  />
                   <?php
				   	if( $user -> type != 'parent'  )
					{
				   ?>
                    <div class="frame" id="education">
                        <h2>Education/Qualification</h2>
                        <a href="" class="btn-edit d-none  js_add_edu" ><svg class="icon icon-add"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-add"></use></svg></a>
                        <ul class="alist"></ul>
                    </div>
                    <div class="frame" id="experience">
                        <h2>Experience (current and previous employment)</h2>
                        <a href="" class="btn-edit d-none js_add_exp" ><svg class="icon icon-add"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-add"></use></svg></a>
                        <ul class="alist"></ul>
                    </div>
                   <?php
					} else {
						if( $user -> interested_in_work  == '1' )
						{
					?>
                    
                    
                    <div class="frame" id="education">
                        <h2>Education/Qualification</h2>
                        <a href="" class="btn-edit d-none  js_add_edu" ><svg class="icon icon-add"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-add"></use></svg></a>
                        <ul class="alist"></ul>
                    </div>
                    <div class="frame" id="experience">
                        <h2>Experience (current and previous employment)</h2>
                        <a href="" class="btn-edit d-none js_add_exp" ><svg class="icon icon-add"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-add"></use></svg></a>
                        <ul class="alist"></ul>
                    </div>
                    
                    
                    <?php } } ?>
                    
                    
                    <div class="frame" id="gallery">
                        <h2>Albums/E-Portfolio </h2><input type="hidden" id="user_albums" />
                        <input type="hidden" id="albums-flag" value="<?php echo count( $albums );?>" />
                        <a href="" class="btn-edit d-none js_add_albums" ><svg class="icon icon-add"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-add"></use></svg></a>
                        <div class="alist albums">
                        <?php
							
							$arr_names = array();
							if( $albums != 0 )
							{
									for( $al_counter = 0; $al_counter < count( $albums ); $al_counter ++ )
									{
										$album 				 = $albums[$al_counter]['album'];
										$user_albums_photos  = $albums[$al_counter]['user_albums_photos'];
										if( count( $user_albums_photos ) != 0 )
										{
										
										$cover_photo 		 = url('user_albums/' . $user_albums_photos[0] -> image );
										/*$user_albums_photos  = $albums['user_albums_photos'];
										if( $user_albums_photos != 0 )
										{
											
										}*/
										?>
                                        <div class="album">
                                        <a href="" class="edit-album"><svg class="icon icon-mode_edit"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-mode_edit"></use></svg></a>
     								    <a href="" data-id="<?php echo  $album -> id;?>"  class="remove-album js_rm_albums"><svg class="icon icon-delete"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-delete"></use></svg></a>
                                        
                                        <a href="">
                                            <div class="image-album" >
                                              <div class="uiScaledImageContainer" ><img class="scaledImageFitWidth img" src="<?php echo $cover_photo;?>"  alt="<?php echo $album -> name;?>" ></div>
                                              <div class="album-gxb">
                                                <div>
                                                  <div class="album-gxd pl-8"><span class="album-iem font-600"><?php echo $album -> name;?></span></div>
                                                  <div class="album-gxe pl-8"><span class="album-ieq font-600"><?php echo count( $user_albums_photos ) ;?> Items</span></div>
                                                </div>
                                              </div>
                                              <div class="_4f0s"></div>
                                            </div>
                                            </a>
                                        
                                        </div>
                                        <?php
									  }
									  
									}
							}
						
						?>
                        
                        </div>
                    </div>
                    <?php
						
						if( $user -> documents_public == 1 )
						{
					?>
                     <div class="frame" id="documents"  >
                        <h2>Documents </h2>

                        <div class="alist ">
                        <div class="row">
                        
                        <?php
							if( $user -> resume != NULL  )
							{
						?>
                        <div class="col-6 col-md-3 col-lg-3">
                          <p><svg class="icon icon-document"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-document"></use></svg></p>
                          <p><a href="<?php echo url('user_profiles/'.$user -> resume   );?>" target="_blank" >Document Resume</a></p>
                        
                         <?php  if( $self_view == 1 ){ ?>     <p><a href="" data-doc="<?php echo $user -> resume;?>"     data-att="resume" class="remove_document"  >Delete document</a></p> <?php } ?>

                        </div>
                        <?php } ?>
                        
                        <?php
							if( $user -> cover_letter != NULL  )
							{
						?>
                        <div class="col-6 col-md-3 col-lg-3">
                          <p><svg class="icon icon-document"><use xlink:href="{{ asset('css/ico/symbol-defs.svg') }}#icon-document"></use></svg></p>
                          <p><a href="<?php echo url('user_profiles/'.$user -> cover_letter   );?>" target="_blank" >Cover Letter</a></p>
                       
                       <?php  if( $self_view == 1 ){ ?>    <p> <a href=""   data-doc="<?php echo $user -> cover_letter;?>"    data-att="cover_letter" class="remove_document"  >Delete document</a></p> <?php } ?>
                        </div>
                        <?php } ?>
                        
                       
                        
                        
                        
                        
                        
                        </div>
                        
                        </div>
                      </div>
					
                    <?php
						}
					?>
                    
                
               
                     <div class="frame" id="my_follower">
                     
                     <h2>Followers</h2>
                   	  <div class="js_follower_list">
                      
                      
                       </div>
                     </div>
                     
                     
                     	<?php  if( $self_view == 1 ){?>
                <div id="invite_friend" class="frame share job-info widget epc-join pro-widget" >
                 	<h3>Invite <span>Your Friends</span></h3>
                    <p>Have 35 people sign up and we will call you with a BIG surprise.</p>
                    <div class="form-group  row">
                        <label for="" class="col-12 col-form-label">Email address (multiple emails can be comma separated)</label>
                        <div class="col-12">
                            <input type="text" value="" class="form-control" id="invite_email_address" name="invite_email_address" placeholder="">
                        </div>
                	</div>
                    <div class="form-group  row">
                        <div class="col-12">
                        	<button type="button" class="btn btn-primary js_invite">Send</button>
                        </div>
                    </div>
               </div>
               
               
               <style>
			   .v-code-update-container .select2-container {width: 47% !important;    float: left;
    margin-left: 10px; height:35px;}
	 .v-code-update-container .select2-container .select2-selection--single {min-height: 38px;max-height: 37px;}
	 .v-code-update-container .select2-selection__rendered{text-align:left;}
			   </style>
               
               <div id="invite_friend" class="frame share job-info widget epc-join pro-widget v-code-update-container" >
                 	<h3>Update <span>Your School Email Address</span></h3>
                    <p></p>
                    <div class="form-group  row  v-code-email-div">
                        <label for="" class="col-12 col-form-label">School Email address</label>
                        <div class="col-12">
                            <input type="text" value="" class="form-control split-fields-width-50" id="school_email_address_up" name="school_email_address_up" placeholder="Name part">
                            <select class="js_school_domain2 split-fields-width-50" ></select>
                        </div>
                	</div>
                    
                    <div class="form-group  row d-none v-code-update-div">
                        <label for="" class="col-12 col-form-label">Enter verification Code</label>
                        <div class="col-12">
                            <input type="text" value="" class="form-control" id="verfication_code_up" name="verfication_code_up" placeholder="">
                        </div>
                	</div>
                    
                    
                    <div class="form-group  row">
                        <div class="col-12">
                        	<button type="button" class="btn btn-primary js_verification_code_update">Send Verification Code</button>
                        </div>
                    </div>
               </div>
               
               
               
                <?php  } ?> 
                     
                     
                                     
                <div class="frame" id="recommend">
                  <h2>Recommendations</h2>
                  

                </div>
                
                
                <div class="frame" id="publication">
                  <h2>Publications</h2>
                  

                </div>

                     
                     </div>
                
                    
                    
                    
                </div>
            </div>

        </div>
    </main>



 <div class="modal fade" id="uiContactDailog" tabindex="-1" role="dialog" aria-labelledby="uiContactLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uiContactLabel">Edit contact info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
       	 <p class="lead">Provide as much information you can.</p>
         
         
         
         <div class="form-group  row">
            <label for="" class="col-12 col-form-label">First Name</label>
            <div class="col-12">
                <input type="text" value="<?php echo $user -> first_name;?>"  class="form-control" id="e_first_name" name="e_first_name" placeholder="">
            </div>
        </div>
        
        
        <div class="form-group  row">
            <label for="" class="col-12 col-form-label">Last Name</label>
            <div class="col-12">
                <input type="text" value="<?php echo $user -> last_name;?>"  class="form-control" id="e_last_name" name="e_last_name" placeholder="">
            </div>
        </div>
        <?php
				 $show_box = 0;
		?>	
        <p class="lead">Most Recent Job </p>
        <input type="hidden" value="<?php echo  $user -> current_emp_status ;?>" id="current_emp_status_hidden" />
        <div class="form-group row">	<div class="col-sm-12 teacher-status-selection">
        <label><input <?php if( $user -> current_emp_status  == 'Currently Supply Teaching') { $show_box = 1;  ?>    checked="checked" <?php }?>  class="js_status_selection  "  value="Currently Supply Teaching" type="checkbox"> Currently Supply Teaching</label>
		<label><input <?php if( $user -> current_emp_status  == 'Currently Seeking Employment') {	 $show_box = 1; 	?>  checked="checked"  <?php }?>  type="checkbox" class="js_status_selection  " value="Currently Seeking Employment"> Currently Seeking Employment</label>
		<label><input<?php if( $user -> current_emp_status  == 'Currently qualifying') {	 $show_box = 1;  ?>  checked="checked" <?php }?>             type="checkbox" class="js_status_selection  " value="Currently qualifying"> Currently qualifying</label>	</div></div>
        
        
        
        <div class="upload_cv_cover" <?php if (  $show_box == 0  ) { ?>     style="display:none;"  <?php } ?>  >
        
         <p class="lead">Upload supporting documents</p>
        <div class="form-group row " >
			
        	 <label for="" class="col-12 col-form-label">Upload Cover Letter (Upload pdf word or text document)</label>
            <div class="col-12"  >
                 <input type="hidden" id="hidden_latest_cover" name="hidden_latest_cover" />
                 <span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span>Select file</span><input type="file"  id="latest_cover"   class="latest_cover"></span>
                 
            </div>
            
             <label for="" class="col-12 col-form-label">Upload CV/Resume (Upload pdf word or text document)</label>
            <div class="col-12">
                
                <span class="btn btn-success fileinput-button"><i class="glyphicon glyphicon-plus"></i><span>Select file</span><input type="file"   id="latest_resume"   class="latest_resume" ></span>

                <input type="hidden" id="hidden_latest_resume" name="hidden_latest_resume" />
                
            </div>
            
            
		</div>
        
        
        <div class="form-group  row">
            <div class="form-check" style="margin-left: 15px;">
              <label class="form-check-label">
                <input type="checkbox" value="1" id="documents_public" name="documents_public" <?php if ( $user -> documents_public == 1 ) {?> checked="checked"  <?php } ?> class="form-check-input" value="1">Make documents Public
              </label>
            </div>
	  </div>
        
        </div>
        
        <p class="lead">OR</p>
        
        <div class="form-group row">
		<div class="col-12">
		<select   id="js_e_recent_job"></select>
		</div>
		</div>
		
        
        
         <div class="form-group  row">
            <label for="" class="col-12 col-form-label">Contact Number</label>
            <div class="col-12">
                <input type="text" value="<?php echo $user -> contact_number;?>"  class="form-control" id="contact_number" name="contact_number" placeholder="">
            </div>
        </div>
        
         <div class="form-group  row">
            <label for="" class="col-12 col-form-label">Email Address</label>
            <div class="col-12">
                <input type="text" value="<?php echo $user -> email;?>"  class="form-control" id="email_address" name="email_address" placeholder="">
            </div>
        </div>
        <?php
		
			if( $user -> type == 'teacher' ) 
			{
		?>
        <div class="form-group  row">
            <label for="" class="col-12 col-form-label">School Email Address</label>
            <div class="col-12">
                <input type="text" value="<?php echo $user -> school_email;?>"  class="form-control" id="school_email_address" name="school_email_address" placeholder="">
            </div>
        </div>
        <?php } ?>
        <div class="form-group row">
            <label for="" class="col-12 col-form-label">Current Address</label>
            <div class="col-12">
                <textarea  class="form-control" id="address" name="address" ><?php echo $user -> address;?></textarea>
            </div>
        </div>
        
       
        
        <div class="form-group row">
            <label for="" class="col-12 col-form-label">Skype</label>
            <div class="col-12">
                <input type="text" value="<?php echo $user -> skype;?>"  class="form-control" id="skype" name="skype" placeholder="">
            </div>
        </div>
        
        
 		<div class="form-group row">
            <label for="" class="col-12 col-form-label">Date of Birth</label>
            <div class="col-12">
            <div class="col-sm-4 b-div">
            	<select id="birth_day" class="birthday birth_day">
                 <option  value="0">Day</option>
                <?php 
				$birthday_array = strtotime( $user -> birthday);
				$month = date('m', $birthday_array);
				$day   = date('d', $birthday_array); 
				$year  = date('Y', $birthday_array); 
				
				for( $i = 1; $i < 32; $i ++ )
				{
					if( $i < 10 ) { $j = '0'. $i; } else{ $j = $i ;}
					?>
                    <option <?php if( $i == $day ){?> selected="selected" <?php } ?> value="<?php echo $j;?>"><?php echo $i;?></option>
                    <?php	
				}
				?>
                </select>
                </div>
                 <div class="col-sm-4 b-div">
               <select id="birth_month"  class="birthday birth_month">
                <option value="0">Month</option>
                <?php for( $i = 1; $i < 13; $i ++ )
				{
					$month_text = date('M', strtotime(date("Y") ."-". $i ."-01") );
					if( $i < 10 ) { $j = '0'. $i; } else{ $j = $i;}
					?>
                    <option <?php if( $i == $month ){?> selected="selected" <?php } ?> value="<?php echo $j;?>"><?php echo $month_text;?></option>
                    <?php	
				}
				?>
                </select>
                </div>
                 <div class="col-sm-4 b-div">
                <select id="birth_year"  class="birthday birth_year">
                <option  value="0">Year</option>
                <?php for( $i = 2018; $i > 1921; $i -- )
				{
					
					?>
                    <option <?php if( $i == $year ){?> selected="selected" <?php } ?> value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php	
				}
				?>
                </select>
                </div>
            
            
            </div>
        </div>
        
        
        
       <div class="form-group  row">
            <div class="form-check" style="margin-left: 15px;">
              <label class="form-check-label">
                <input type="checkbox" value="1" id="contact_public" name="contact_public" <?php if ( $user -> contact_public == 1 ) {?> checked="checked"  <?php } ?> class="form-check-input" value="1">Public
              </label>
            </div>
	  </div>
		
       <div class="form-group  row"><!--Not displayed to the public-->
       
       
       <div class="form-check" style="margin-left: 15px;">
          <label class="form-check-label">
            <input type="checkbox" value="1" <?php if ( $user -> mobile_number_public == 1 ) {?> checked="checked"  <?php } ?>  class="form-check-input"  id="mobile_number_public" name="mobile_number_public" >Make Mobile Number Public
          </label>
        </div>
		
	  </div>
		
        
        
        
     
        
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary modal-btn modal-btn-action js_save_c_i  go full-padded-btn">Save Changes</button>
      </div>
    </div>
  </div>
</div>




<div class="modal  uiProfileDialog fade" id="uiProfileDialog"  role="dialog" aria-labelledby="uiProfileLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uiProfileLabel">Add Education</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">



         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary modal-btn modal-btn-action js_save_education  go full-padded-btn">Save Changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal  uiAlbumShowDialog fade" id="uiAlbumShowDialog"  role="dialog" aria-labelledby="uiProfileLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uiProfileLabel">Album</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">

		<div class="news-article js_album_caro">
            <div class="owl-carousel owl-theme owl-recommend2 featured">
             
            </div>
        </div>

         
      </div>
      
    </div>
  </div>
</div>




<div class="modal fade" id="uiMsgDailog" tabindex="-1" role="dialog" aria-labelledby="uiContactLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uiMesssageLabel">Write your message here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
       	
         <div class="form-group  row">
            <label for="" class="col-12 col-form-label">Message</label>
            <div class="col-12">
                <textarea style="height:200px;" class="form-control" id="chat_messsage"></textarea>
                <p><small>Check the response of your message in inbox. Access your inbox from top menu.</small></p>
                <p class="js_response_to_msg  d-none alert alert-success"></p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary modal-btn modal-btn-action  js_send_msg  go modal-btn-padding-extended ">Send Message</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="uiJoinClubDailog" tabindex="-1" role="dialog" aria-labelledby="uiJoinClubDailog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uiMesssagesLabel">Use Your School email address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
      	  
          <div class="form-group row js_school_email">
            <label for="email" class="col-sm-3 col-form-label">School Email  (Prefix only)</label>
            <div class="col-sm-9">
              <input type="text" class="form-control school-name js_school_email_aname split-fields-width-50" placeholder="Email">
              <select id="js_school_domain" class="js_school_domain split-fields-width-70">
               
              </select>
            </div>
          </div>
          
          <p class="alert alert-success d-none v-c-msg-sent">Verification code is sent to your school email address. </p>
          
          <div class="form-group row v-c-s d-none">
            <label for="email" class="col-sm-5 col-form-label">Enter your verification code</label>
            <div class="col-sm-7">
              <input type="text" id="code_verification" class="form-control" placeholder="">
            </div>
          </div>
		 
         <p class="v_code_error alert alert-danger d-none"></p>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary modal-btn js_epc modal-btn-action  js_send_v_code  go modal-btn-padding-extended ">Send Verification Code</button>
      </div>
    </div>
  </div>
</div>

	
<div class="modal fade" id="uiVerifyphotoDailog" tabindex="-1" role="dialog" aria-labelledby="uiVerifyphotoDailog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Update profile picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">

          <p>ETC member should verify school email address in order to update there profile picture.</p>
          <p class="alert alert-success d-none v-c-msg-sent">Verification code is sent to your school email address. </p>
          <div class="form-group row">
            <label for="photo_code_verification" class="col-sm-5 col-form-label">Enter your verification code</label>
            <div class="col-sm-7">
              <input type="text" id="photo_code_verification" class="form-control" placeholder="">
            </div>
          </div>
         <p class="photo_v_code_notice d-none"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary modal-btn js_epc modal-btn-action  js_confirm_v_code_photo  go modal-btn-padding-extended ">Submit Verification Code</button>
      </div>
    </div>
  </div>
</div>
    
<div class="modal fade" id="uiRecommendDailog" tabindex="-1" role="dialog" aria-labelledby="uiContactLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uiRecommendLabel">Write your recommendation here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
       	
         <div class="form-group  row">
            <label for="" class="col-12 col-form-label">Recommendation</label>
            <div class="col-12">
                <textarea style="height:200px;" class="form-control" id="r_messsage"></textarea>
                <p><small>Recommendation will be send for approval to <?php echo  $user -> first_name.' '. $user -> last_name;?> </small></p>
                <p class="js_response_to_r  d-none alert alert-success"></p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary modal-btn modal-btn-action  js_send_recommendation  go modal-btn-padding-extended ">Send</button>
      </div>
    </div>
  </div>
</div>
 
    
<div class="modal fade" id="uiBecomeETCmemberDailog" tabindex="-1" role="dialog" aria-labelledby="uiContactLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uiBecomeETCmemberLabel">ETC membership</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
       	<div class="epc-join">
        	<h3>Expat <span>Teachers Club</span></h3>
            <p>want to know more about ETC membership and deals <a target="_blank" href="https://www.expatsschools.com/expat-teachers-club">here</a></p>
            <p><button type="button" class="btn join-now-epc btn-cta">Join Now</button></p>
            <p class="filters">
            
            <a href="" class="new-checkbox  js_hide_become_m"><span><svg class="icon icon-square-o"><use xlink:href="{{ asset('js/plugins/menu/symbol-defs.svg') }}#icon-square-o"></use></svg><svg class="icon icon-check-square-o"><use xlink:href="{{ asset('js/plugins/menu/symbol-defs.svg') }}#icon-check-square-o"></use></svg></span> <em> Don't show again</em></a>
            </p>
        </div>
         
      </div>
      
    </div>
  </div>
</div>
 
<div class="modal fade" id="uiTwitterDialog" tabindex="-1" role="dialog" aria-labelledby="uiContactLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Twitter Feed</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
            <div id="twitter-widget-holder"><a class="twitter-timeline" href="https://twitter.com/<?php echo $twitter_name;?>?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
         
      </div>
      
    </div>
  </div>
</div>


