<?php
/**
 * Created by PhpStorm.
 * Date: 19.12.2017
 * Time: 11:12
 */

class EmployeeForm {
	private $name;
	private $secondname;
	private $idunit;
	private $position;


	/**
	 * @param array $data
	 */
	function __construct( Array $data ) {
		$this->name       = isset( $data['name'] ) ? $data['name'] : null;
		$this->secondname = isset( $data['secondname'] ) ? $data['secondname'] : null;
		$this->idunit     = isset( $data['idunit'] ) ? $data['idunit'] : null;
		$this->position   = isset( $data['position'] ) ? $data['position'] : null;

	}

	public function validate() {
		return ! empty( $this->name ) && ! empty( $this->secondname ) && ! empty( $this->idunit ) && ! empty( $this->position );
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
	public function getSecondname() {
		return $this->secondname;
	}

	/**
	 * @param mixed $secondname
	 */
	public function setSecondname( $secondname ) {
		$this->secondname = $secondname;
	}

	/**
	 * @return mixed
	 */
	public function getIdunit() {
		return $this->idunit;
	}

	/**
	 * @param mixed $idunit
	 */
	public function setIdunit( $idunit ) {
		$this->idunit = $idunit;
	}

	/**
	 * @return mixed
	 */
	public function getPosition() {
		return $this->position;
	}

	/**
	 * @param mixed $position
	 */
	public function setPosition( $position ) {
		$this->position = $position;
	}

}