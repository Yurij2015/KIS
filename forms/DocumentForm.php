<?php
/**
 * Created by PhpStorm.
 * Date: 19.12.2017
 * Time: 11:12
 */

class DocumentForm {
	private $name;
	private $doccontent;
	private $link;
	private $employee_idemployee;


	/**
	 * @param array $data
	 */
	function __construct( Array $data ) {
		$this->name                = isset( $data['name'] ) ? $data['name'] : null;
		$this->doccontent          = isset( $data['doccontent'] ) ? $data['doccontent'] : null;
		$this->link                = isset( $data['link'] ) ? $data['link'] : null;
		$this->employee_idemployee = isset( $data['employee_idemployee'] ) ? $data['employee_idemployee'] : null;

	}

	public function validate() {
		return ! empty( $this->name ) && ! empty( $this->doccontent ) && ! empty( $this->link ) && ! empty( $this->employee_idemployee );
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getDoccontent() {
		return $this->doccontent;
	}

	/**
	 * @param mixed $doccontent
	 */
	public function setDoccontent( $doccontent ) {
		$this->doccontent = $doccontent;
	}


	/**
	 * @return mixed
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @param mixed $link
	 */
	public function setLink( $link ) {
		$this->link = $link;
	}

	/**
	 * @return mixed
	 */
	public function getEmployeeIdemployee() {
		return $this->employee_idemployee;
	}

	/**
	 * @param mixed $employee_idemployee
	 */
	public function setEmployeeIdemployee( $employee_idemployee ) {
		$this->employee_idemployee = $employee_idemployee;
	}

}