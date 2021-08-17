<?php
/*
@package Lawyer Themes
	This Widget is Made By Abderrahmane Bamoussa Developers
	email : kuzokio4@gmail.com
===================
    WIDGET CLASS
*/





/**
 * Adds Post widget.
*/
class post_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'post_widget', // Base ID
			esc_html__( 'A Last Post Custom', 'lawyer' ), // Name
			array( 'description' => esc_html__( 'Display The Last Posts In SideBar', 'lawyer' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {


		echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}
            
                    
            $number = $instance['number'];
            
            $args = array(
				'post_type' => 'post',
				'posts_per_page' => $number,
			);
			$blog = new WP_Query($args);

			while ($blog->have_posts()) {
			$blog->the_post();
							
			?>	
				<div class="row side-bar-blocks">
					<div class="col-4">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="blog image" class='img-blog-home'>
						</a>
					</div>
					<div class="info-widget col-8">
						<a class="post-title" href="<?php the_permalink(); ?>" title="<?= get_the_title()?>"><?= wp_trim_words(get_the_title(),6,'..');?></a>
						<div class="body-text date"><?php the_time('F j, Y');?> By <?= get_the_author() ?></div>
					</div>
				</div>
			<?php
			// echo '<img src="'.$user_avatar.'" class="img-round"><div class="body-text about-sec-text text-aling">
            //  <span class="name-color">' . $user_info->display_name . '</span> ' . $user_info->description . '</div>';
			

			}
			wp_reset_query();
			echo '</div>';
			echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Your Title... ', 'lawyer' );
		$number = ! empty( $instance['number'] ) ? $instance['number'] : esc_html__( 3, 'lawyer' );
		



        
       
		?>

		<!-- Title Of Widget  -->
			<p  style="margin-bottom:20px;">
				<label style=" text-transform: capitalize;font-weight: 800; margin-bottom:20px;" 
					for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'lawyer' ); ?>
				</label> 
				<input class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
					type="text"
					value="<?php echo esc_attr( $title ); ?>"
				/>		
			</p>

		<!-- Number Of Posts To Display  -->
			<p  style="margin-bottom:20px;">
				<label style=" text-transform: capitalize;font-weight: 800; margin-bottom:20px;" 
					for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_attr_e( 'Number Of Posts', 'lawyer' ); ?>
				</label> 
				<input class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>"
					type="number"
					value="<?php echo esc_attr( $number ); ?>"
				/>		
			</p>




           
		
		<?php 
		
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? sanitize_text_field( $new_instance['number'] ) : '';
		
		return $instance;
	}

} 

// register Last Post widget
function register_post_widgets_widget() {
    register_widget( 'post_widget' );
}
add_action( 'widgets_init', 'register_post_widgets_widget' );