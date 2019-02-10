<?php

class SuccessManager {
	private $successMessage;

	public function setMessage($type) {
		if ($type == 'articleAdded') {
			$this->successMessage = 'Article ajouté avec succès';
		}
		if ($type == 'articleEdited') {
			$this->successMessage = 'Article édité avec succès';
		}
		if ($type == 'articleDeleted') {
			$this->successMessage = 'Article supprimé avec succès';
		}
	}

	public function getMessage(){
		return $this->successMessage;
	}
}