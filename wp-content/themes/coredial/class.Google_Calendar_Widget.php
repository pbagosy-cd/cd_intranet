<?php
	/**
	 * Adds Google_Calendar_Widget widget.
	 */
	class Google_Calendar_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
				'google_calendar_widget', // Base ID
				__('Google Calendar', 'text_domain'), // Name
				array( 'description' => __( 'Google Calendar', 'text_domain' ), ) // Args
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
			echo $args['before_title'] . 'Upcoming Events' . $args['after_title'];

			$args = array(
				'posts_per_page'   => 30,
				'offset'           => 0,
				'category'         => '',
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => 'calendar_link',
				'post_parent'      => '',
				'suppress_filters' => true
				);
			$posts_array = get_posts( $args );
			$int_modal_count = 0;
?>
<script>
    $('a.external').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $(".modal-body").html('<iframe width="100%" height="100%" frameborder="0" scrolling="yes" allowtransparency="true" src="'+url+'"></iframe>');

    });
</script>
<?php
			foreach($posts_array as $post_object){
				$str_calendar_link = get_post_meta( $post_object->ID, 'calendar_link', true );
				$str_calendar_add_link = get_post_meta( $post_object->ID, 'calendar_add_link', true );
				if($str_calendar_link != ''){
					$int_modal_count++;
					echo '<p>'."\n";
					echo '<b><a href="'.get_the_permalink($post_object->ID).'">'.$post_object->post_title.'</a></b><br>';
					echo '<a href="'.$str_calendar_link.'" target="_blank">View Google Calendar</a>'."\n";
					if($str_calendar_add_link != ''){
					echo ' - <a href="'.$str_calendar_link.'" target="_blank">Add to calendar</a>'."\n";
					}
					echo '</p>'."\n";
					echo '<hr>'."\n";

				}
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
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

			return $instance;
		}

	} // class Google_Calendar_Widget