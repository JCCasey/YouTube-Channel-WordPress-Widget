<?php 
/**
 * Adds YouTube Subs widget.
 */
 class YouTube_Subs_Widget extends WP_Widget {
    
        /**
         * Register widget with WordPress.
         */
        function __construct() {
            parent::__construct(
                'youtubesubs_widget', // Base ID
                esc_html__( 'YouTube Subs', 'yts_domain' ), // Name
                array( 'description' => esc_html__( 'Widger to display YouTube Subs', 'text_domain' ), ) // Args
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
            echo $args['before_widget']; //Whatever you want to display before widget (<div>, etc.)
            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
            }

            //Widget Content Output
            echo '<div class="g-ytsubscribe" data-channelid="'.$instance['channel'].'" data-layout="full" data-count="default"></div>';
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
            $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'YouTube Subs', 'yts_domain' );
           
            $channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( '', 'yts_domain' );
            ?>

            <!-- Channel -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
                    <?php esc_attr_e( 'Channel:', 'yts_domain' ); ?>
                </label> 
                <input 
                    class="widefat" 
                    id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
                    name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
                    type="text" 
                    value="<?php echo esc_attr( $channel ); ?>">
            </p>

            <!-- Title -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                    <?php esc_attr_e( 'Title:', 'yts_domain' ); ?>
                </label> 
                <input 
                    class="widefat" 
                    id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
                    name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
                    type="text" 
                    value="<?php echo esc_attr( $title ); ?>">
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
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            
            $instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? strip_tags( $new_instance['channel'] ) : '';
    
            return $instance;
        }
    
    } // class Foo_Widget