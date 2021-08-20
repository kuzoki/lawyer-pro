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
class category_widgets extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'category_widgets', // Base ID
			esc_html__( 'A Category Lists ', 'lawyer' ), // Name
			array( 'description' => esc_html__( 'Display The Category', 'lawyer' ), ) // Args
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
            
                    
            $cat_id_list = explode(",",$instance['tabs_list']);
			// print_r($cat_id_list);
			//print_r($cat_id_list) ;
           
			foreach($cat_id_list as $key){
				$cat = get_category( $key );
				?>
					<a href="<?= get_category_link($key)?>" class="side-cat"><?= $cat->name ?></a>
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
		$cat = ! empty( $instance['cat'] ) ? $instance['cat'] : esc_html__( '', 'lawyer' );
		$instance['tabs_list'] = !empty($instance['tabs_list']) ? explode(",",$instance['tabs_list']) : array('');
		

		$cat_list = get_categories();
		
        
       
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
						//$face_tab_args = array("timeline","event","messages");
				      	//echo implode(',',$args);
						
					//print_r($terms);
					foreach ($cat_list as $value ) {
						
						$checked = "";
							if(in_array($value->term_id,$instance['tabs_list'])){
								$checked = "checked='checked'";
							}
					  
						
					?>
					<span>
						<input 
							type="checkbox" 
							class="checkbox" 
							id="<?php echo $this->get_field_id('tabs_list'); ?>" 
							name="<?php echo $this->get_field_name('tabs_list[]'); ?>" 
							value="<?php echo $value->term_id; ?>"  <?php echo $checked; ?>
						/>
						<label 	style=" text-transform: capitalize;font-weight: 500;" 
								for="<?php echo $this->get_field_id('tabs_list'); ?>"
						>
								<?php  echo $value->name; ?>
						</label>
					</span>
				<?php } 

				
					
				?>
			</p>



           
		
		<?php 
		// echo $cat ;
		
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
		$instance['tabs_list'] = !empty($new_instance['tabs_list']) ? implode(",",$new_instance['tabs_list']) : '';
		return $instance;
	}

} 

// register Last Post widget
function register_category_widgets_widget() {
    register_widget( 'category_widgets' );
}
add_action( 'widgets_init', 'register_category_widgets_widget' );