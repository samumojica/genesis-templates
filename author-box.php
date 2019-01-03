<?php
/**
 * Template Name: Tips with Author Box
 *
 * @package Genesis Sample
 * @author  Samuel Mojica

 */


// Register a custom image size for Singular Featured images
add_image_size( 'singular-featured-thumb', 800, 250, true );

add_action( 'genesis_before_entry', 'sk_display_featured_image' );

function sk_display_featured_image() {
	if ( !is_singular( array( 'post', 'page' ) ) ) {
		return;
	}
	if ( !has_post_thumbnail() ) {
		return;
	}
	// Display featured image above content
	echo '<div class="singular-featured-image">';
	genesis_image( array( 'size' => 'singular-featured-thumb' ) );
	echo '</div>';
}

add_action( 'genesis_after_entry', 'genesis_do_author_box_on_page', 8 );

function genesis_do_author_box_on_page() {

	?>

	<style>
		.authorheader-wep {
			margin-top: 30px;
			margin-bottom: 45px;
			margin-left: 15px;
			margin-right: 15px;
			border-bottom: 1px solid #969696;
			padding-bottom: 40px;
			border-top: 1px solid #969696;
			padding-top: 40px;
		}
		
		.authorheader-wep p {
			color: #393d4a;
			font-family: "Source Sans Pro";
			font-size: 16px;
			font-weight: 400;
			line-height: 24px;
			margin-bottom: 20px;
		}
		
		.authore-img img {
			/*			border-radius: 50%;*/
			width: auto;
			height: auto;
			float: none;
		}
		
		.authors-custom-title h2 {
			color: #46464e;
			font-family: "Roboto Slab";
			font-size: 20px;
			font-weight: 600;
			letter-spacing: .5px;
			margin-top: 0;
		}
		
		a.test {
			color: #46464e !important;
			font-family: "Roboto Slab";
			text-decoration: none;
		}
		
		.author-links strong {
			float: left;
			color: #393d4a;
			font-family: "Source Sans Pro";
			font-size: 20px;
			font-weight: 600;
			letter-spacing: .5px;
		}
		
		.social-links-wrapper .social-links {
			margin: 0;
			margin-left: 0px;
			text-align: left;
			float: left;
			margin-left: 20px !important;
		}
		
		ul.social-links li {
			display: inline-block;
		}
	</style>

	<div class="authorheader-wep">
		<div class="row">

			<section class="col-xs-12 col-sm-12 col-md-2 author author-two authore-img">
				<a class="test" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
					<p align="center">


						<?php 
				$authorID = get_current_user_id();
				$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
				// var_dump(get_userdata( $author->ID ));
				// $author_description = the_author_meta( 'description', $author->ID );
				// var_dump(get_the_author_meta($user_ID = $author->ID));
				echo get_avatar( $author->ID, 512 ); 
				// echo get_avatar( $authorID , 512 ); 
		 ?>

					</p>
				</a>
			</section>

			<div class="col-sm-12 col-md-10 author">

				<section class="authors-custom-title">
					<h2>
			
			
			<a class="test" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
			<?php 
				$_user_name = get_the_author(); 
				if(!empty($_user_name)) {
					echo $_user_name;
				} else {
					the_author_meta( 'display_name', $author->ID ); 
					//echo 'Authorzz';
				} 
			?>
			</a>
		</h2>
				

				</section>

				<!-- <h2>Title, Company Name</h2> -->
				<p>
					<?php 
				$_user_description = get_the_author_meta('user_description'); 
				if(!empty($_user_description)) {
					echo $_user_description;
				} else {
					the_author_meta( 'description', $author->ID );
				}
			?>
				</p>



				<div class="social-links-wrapper author-links">
					<strong>Follow me</strong>
					<ul class="social-links">
						<?php if(!empty(get_the_author_meta('facebook', $author->ID))) { ?>
						<li class="social-facebook">
							<a class="fb" href="<?php the_author_meta('facebook', $author->ID); ?>"><span class="fa fa-facebook"></span></a>

						</li>
						<?php } ?>
						<?php if(!empty(get_the_author_meta('linkedin', $author->ID ))) { ?>
						<li class="social-linkedin">
							<a class="linkedin" href="<?php the_author_meta('linkedin', $author->ID ); ?>"><span class="fa fa-linkedin"></span></a>
						</li>
						<?php } ?>
						<?php if(!empty(get_the_author_meta('twitter', $author->ID))) { ?>
						<li class="social-twitter">
							<a class="twitter" href="https://twitter.com/<?php the_author_meta('twitter', $author->ID);?>"><span class="fa fa-twitter"></span></a>
						</li>
						<?php } ?>


					</ul>
				</div>




			</div>

		</div>
	</div>


	<?php
}


remove_filter( 'the_content', 'wpautop' );


genesis();
