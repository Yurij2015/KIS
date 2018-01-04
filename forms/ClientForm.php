<?php
/**
 * Created by PhpStorm.
 * Date: 19.12.2017
 * Time: 11:12
 */

class ClientForm {
	private $clientname;
	private $clientemail;
	private $clientphone;

	/**
	 * @param array $data
	 */
	function __construct( Array $data ) {
		$this->clientname     = isset( $data['clientname'] ) ? $data['clientname'] : null;
		$this->clientemail = isset( $data['clientemail'] ) ? $data['clientemail'] : null;
		$this->clientphone     = isset( $data['clientphone'] ) ? $data['clientphone'] : null;
	}

	public function validate() {
		return ! empty( $this->clientname ) && ! empty( $this->clientemail ) && ! empty( $this->clientphone );
	}

	/**
	 * @return mixed
	 */
	public function getClientName() {
		return $this->clientname;
	}

	/**
	 * @param mixed $clientname
	 */
	public function setClientName( $clientname ) {
		$this->clientname = $clientname;
	}

	/**
	 * @return mixed
	 */
	public function getClienteMail() {
		return $this->clientemail;
	}

	/**
	 * @param mixed $clientemail
	 */
	public function setClienteMail( $clientemail ) {
		$this->clientemail = $clientemail;
	}


	/**
	 * @return mixed
	 */
	public function getClientPhone() {
		return $this->clientphone;
	}

	/**
	 * @param mixed $clientphone
	 */
	public function setClientPhone( $clientphone ) {
		$this->clientphone = $clientphone;
	}


}