<?php

namespace Model;

class SuccessManager {
	private $successMessage;

	public function setMessage($type) {
		if ($type == 'articleAdded') {
			$this->successMessage = 'Article ajouté avec succès';
		}
		if ($type == 'articleEdited') {
			$this->successMessage = 'Article édité avec succès';
		}
		if ($type == 'articleTrashed') {
			$this->successMessage = 'Article mis à la corbeille avec succès';
		}
		if ($type == 'articleDeleted') {
			$this->successMessage = 'Article supprimé avec succès';
		}
		if ($type == 'commentAdded') {
			$this->successMessage = 'Commentaire ajouté avec succès';
		}
		if ($type == 'commentSignaled') {
			$this->successMessage = 'Le commentaire a été signalé avec succès. L\'administrateur en a été informé. Merci !';
		}
		if ($type == 'commentApproved') {
			$this->successMessage = 'Le commentaire a été approuvé avec succès. Plus aucun signalement ne vous sera remonté pour celui-ci.';
		}
		if ($type == 'commentDeleted') {
			$this->successMessage = 'Commentaire a été supprimé avec succès.';
		}
	}

	public function getMessage(){
		return $this->successMessage;
	}
}