<?php

class WPNotify_BaseSender implements WPNotify_Sender, WPNotify_JsonUnserializable {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var WPNotify_BaseImage
	 */
	protected $image;

	/**
	 * WPNotify_BaseSender constructor.
	 *
	 * @param string                  $name
	 * @param WPNotify_BaseImage|null $image
	 */
	public function __construct( $name, $image = null ) {
		$this->name  = $name;
		$this->image = $image;
	}

	/**
	 * @return array
	 */
	public function jsonSerialize() {
		return array(
			'name'  => $this->name,
			'image' => $this->image,
		);
	}

	/**
	 * Creates a new instance from JSON-encoded data.
	 *
	 * @param string $json JSON-encoded data to create the instance from.
	 *
	 * @return self
	 */
	public static function json_unserialize( $json ) {

		$data = json_decode( $json, true );

		$name = ! empty( $data['name'] ) ? $data['name'] : '';

		return new self( $name );
	}

	/**
	 * @return string
	 */
	public function get_name() {

		return $this->name;
	}
}
