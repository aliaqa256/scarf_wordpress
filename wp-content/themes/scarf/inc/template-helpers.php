<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'scarf_placeholder_image' ) ) {

	function scarf_placeholder_image( $context = 'product', $args = array() ) {
		$defaults = array(
			'width'  => 600,
			'height' => 600,
			'class'  => 'scarf-placeholder',
			'label'  => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$context = sanitize_key( $context );
		$width   = absint( $args['width'] );
		$height  = absint( $args['height'] );
		$class   = sanitize_html_class( $args['class'] );
		$label   = sanitize_text_field( $args['label'] );

		if ( empty( $label ) ) {
			$labels = array(
				'product'  => __( 'تصویر محصول', 'scarf' ),
				'hero'     => __( 'تصویر کمپین شال و روسری', 'scarf' ),
				'category' => __( 'تصویر دسته‌بندی', 'scarf' ),
			);

			$label = isset( $labels[ $context ] ) ? $labels[ $context ] : __( 'تصویر', 'scarf' );
		}

		return sprintf(
			'<svg class="%1$s" width="%2$d" height="%3$d" viewBox="0 0 %2$d %3$d" role="img" aria-label="%4$s" xmlns="http://www.w3.org/2000/svg">
				<defs>
					<linearGradient id="scarf-placeholder-grad-%5$s" x1="0%%" y1="0%%" x2="100%%" y2="100%%">
						<stop offset="0%%" stop-color="#fdf2f4" />
						<stop offset="100%%" stop-color="#fef7f0" />
					</linearGradient>
				</defs>
				<rect width="%2$d" height="%3$d" rx="%6$d" fill="url(#scarf-placeholder-grad-%5$s)" />
				<rect width="%2$d" height="%3$d" rx="%6$d" fill="none" stroke="%7$s" stroke-width="1" />
				<text x="50%%" y="50%%" dominant-baseline="middle" text-anchor="middle" font-family="Vazirmatn, IRANSans, Tahoma, Arial, sans-serif" font-size="%8$d" fill="%9$s" dir="rtl">%10$s</text>
			</svg>',
			esc_attr( $class ),
			esc_attr( $width ),
			esc_attr( $height ),
			esc_attr( $label ),
			esc_attr( $context . '-' . $width . 'x' . $height ),
			esc_attr( min( 16, $width * 0.02 ) ),
			esc_attr( '#f0e4e0' ),
			esc_attr( max( 12, min( 24, round( $width * 0.045 ) ) ) ),
			esc_attr( '#b08880' ),
			esc_html( $label )
		);
	}
}

if ( ! function_exists( 'scarf_section_heading' ) ) {

	function scarf_section_heading( $title, $args = array() ) {
		$defaults = array(
			'subtitle'  => '',
			'link_url'  => '',
			'link_label' => '',
			'tag'       => 'h2',
		);

		$args = wp_parse_args( $args, $defaults );

		$title      = esc_html( $title );
		$subtitle   = esc_html( $args['subtitle'] );
		$link_url   = esc_url( $args['link_url'] );
		$link_label = esc_html( $args['link_label'] );
		$tag        = sanitize_key( $args['tag'] );

		if ( ! in_array( $tag, array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'p' ), true ) ) {
			$tag = 'h2';
		}

		$output = '<div class="scarf-section__heading">';
		$output .= '<' . $tag . ' class="scarf-section__title">' . $title . '</' . $tag . '>';

		if ( ! empty( $subtitle ) ) {
			$output .= '<p class="scarf-section__subtitle">' . $subtitle . '</p>';
		}

		if ( ! empty( $link_url ) && ! empty( $link_label ) ) {
			$output .= '<a class="scarf-section__link" href="' . $link_url . '">' . $link_label . '</a>';
		}

		$output .= '</div>';

		return $output;
	}
}
