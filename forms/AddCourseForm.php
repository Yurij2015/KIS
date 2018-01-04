<?php
/**
 * Created by PhpStorm.
 * Date: 19.12.2017
 * Time: 11:12
 */

class AddCourseForm {
	private $coursename;
	private $courseduration;
	private $courseinfo;
	private $coursecost;

	/**
	 * @param array $data
	 */
	function __construct( Array $data ) {
		$this->coursename     = isset( $data['coursename'] ) ? $data['coursename'] : null;
		$this->courseduration = isset( $data['courseduration'] ) ? $data['courseduration'] : null;
		$this->courseinfo     = isset( $data['courseinfo'] ) ? $data['courseinfo'] : null;
		$this->coursecost     = isset( $data['coursecost'] ) ? $data['coursecost'] : null;
	}

	public function validate() {
		return ! empty( $this->coursename ) && ! empty( $this->courseduration ) && ! empty( $this->courseinfo ) && ! empty( $this->coursecost );
	}

	/**
	 * @return mixed
	 */
	public function getCourseName() {
		return $this->coursename;
	}

	/**
	 * @param mixed $coursename
	 */
	public function setCourseName( $coursename ) {
		$this->coursename = $coursename;
	}

	/**
	 * @return mixed
	 */
	public function getCourseDuration() {
		return $this->courseduration;
	}

	/**
	 * @param mixed $courseduration
	 */
	public function setCourseDuration( $courseduration ) {
		$this->courseduration = $courseduration;
	}


	/**
	 * @return mixed
	 */
	public function getCourseinfo() {
		return $this->courseinfo;
	}

	/**
	 * @param mixed $courseinfo
	 */
	public function setCourseinfo( $courseinfo ) {
		$this->courseinfo = $courseinfo;
	}

	/**
	 * @return mixed
	 */
	public function getCoursecost() {
		return $this->coursecost;
	}

	/**
	 * @param mixed $coursecost
	 */
	public function setCoursecost( $coursecost ) {
		$this->coursecost = $coursecost;
	}

}