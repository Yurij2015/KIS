<?php
/**
 * Created by PhpStorm.
 * Date: 19.12.2017
 * Time: 20:20
 */

class RegoncourseForm {
	private $fio;
	private $passportdata;
	private $course;

	/**
	 * @param array $data
	 */
	function __construct( Array $data ) {
		$this->fio          = isset( $data['fio'] ) ? $data['fio'] : null;
		$this->passportdata = isset( $data['passportdata'] ) ? $data['passportdata'] : null;
		$this->course       = isset( $data['course'] ) ? $data['course'] : null;
	}

	public function validate() {
		return ! empty( $this->fio ) && ! empty( $this->passportdata ) && ! empty( $this->course );
	}

	/**
	 * @return mixed
	 */
	public function getFio() {
		return $this->fio;
	}

	/**
	 * @param mixed $fio
	 */
	public function setFio( $fio ) {
		$this->fio = $fio;
	}

	/**
	 * @return mixed
	 */
	public function getPassportdata() {
		return $this->passportdata;
	}

	/**
	 * @param mixed $passportdata
	 */
	public function setPassportdata( $passportdata ) {
		$this->passportdata = $passportdata;
	}

	/**
	 * @return mixed
	 */
	public function getCourse() {
		return $this->course;
	}

	/**
	 * @param mixed $course
	 */
	public function setCourse( $course ) {
		$this->course = $course;
	}

}