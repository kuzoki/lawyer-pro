<?php
/*
@package Lawyer Themes
	This Widget is Made By Abderrahmane Bamoussa Developers
	email : kuzokio4@gmail.com
===================
    WIDGET CLASS
*/





/**
 * Adds Category widget.
*/
class tags_widgets extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'tags_widgets', // Base ID
			esc_html__( 'A Tags Lists ', 'lawyer' ), // Name
			array( 'description' => esc_html__( 'Display The Posts Tags In SideBar', 'lawyer' ), ) // Args
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
            
                    
            $tags = explode(",",$instance['tags_list']);
			
			
            ;
			foreach($tags as $key){
				$tag = get_tag( $key );
				?>
					<a href="<?= get_tag_link($key)?>" class="side-tag"><?= $tag->name ?></a>
				<?php
			}
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
		
		$instance['tags_list'] = !empty($instance['tags_list']) ? explode(",",$instance['tags_list']) : array('');
		

		$tag_l =  get_tags(array(
			'hide_empty' => false
		  ));;
		
        
       
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

		<!-- Check Cat To Display  -->
			
			<p  style="margin-bottom:20px;">
				<label style=" text-transform: capitalize;font-weight: 800; margin-bottom:20px;" 
					for="<?php echo esc_attr( $this->get_field_id( 'cat' ) ); ?>"><?php esc_attr_e( 'Choose The One To Display:', 'lawyer' ); ?>
				</label> 
				<br>
				
				<?php 
						$face_tab_args = array("timeline","event","messages");
				      	//echo implode(',',$args);
						
					//print_r($terms);
					foreach ($tag_l as $value ) {
						
						$checked = "";
							if(in_array($value->term_id,$instance['tags_list'])){
								$checked = "checked='checked'";
							}
					  
						
					?>
					<span>
						<input 
						
							type="checkbox" 
							class="checkbox" 
							id="<?php echo $this->get_field_id('tags_list'); ?>" 
							name="<?php echo $this->get_field_name('tags_list[]'); ?>" 
							value="<?php echo $value->term_id; ?>"  <?php echo $checked; ?>
						/>
						<label 	style=" text-transform: capitalize;font-weight: 500;margin-right:20px;" 
								for="<?php echo $this->get_field_id('tags_list'); ?>"
						>
								<?php  echo $value->name; ?>
						</label>
					</span>
				<?php } 

				
					
				?>
			</p>



           
		
		<?php 
		echo $cat ;
		
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
	
		$instance['tags_list'] = !empty($new_instance['tags_list']) ? implode(",",$new_instance['tags_list']) : '';
		return $instance;
	}

} 

// register Last Post widget
function register_tags_widgets_widget() {
    register_widget( 'tags_widgets' );
}
add_action( 'widgets_init', 'register_tags_widgets_widget' );