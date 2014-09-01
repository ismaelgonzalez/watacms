<?php
class StatusHelper extends AppHelper {
	/*
	 * This function returns a status badge
	 */
	public function getStatus($status) {
		$badge = '';
		switch($status) {
			case 1:
				$badge = "<span class='badge alert-success'>Activo</span>";
				break;
			case 0:
				$badge = "<span class='badge alert-danger'>Desactivado</span>";
				break;
		}

		return $badge;
	}

	/*
	 * This function returns the text position in a badge
	 */
	public function getPosition($position) {
		$badge = '';
		switch($position) {
			case 'U':
				$badge = "<span class='badge alert-info'>Arriba</span>";
				break;
			case 'D':
				$badge = "<span class='badge alert-info'>Abajo</span>";
				break;
			case 'L':
				$badge = "<span class='badge alert-info'>Izquierda</span>";
				break;
			case 'R':
				$badge = "<span class='badge alert-info'>Derecha</span>";
				break;
			case 'W':
				$badge = "<span class='badge alert-info'>Wallpaper</span>";
				break;
		}

		return $badge;
	}

	/*
	 *This function returns a bagde for the store zone
	 */
	public function getZone($zone){
		$badge = '';
		switch ($zone) {
			case 'N':
				$badge = "<span class='badge alert-info'>Zona Norte</span>";
				break;
			case 'S':
				$badge = "<span class='badge alert-info'>Zona Sur</span>";
				break;
			case 'P':
				$badge = "<span class='badge alert-info'>Zona Poniente</span>";
				break;
			case 'O':
				$badge = "<span class='badge alert-info'>Zona Oriente</span>";
				break;
		}

		return $badge;
	}

	/*
		 *This function returns a bagde for the store zone
		 */
	public function getRole($role){
		$badge = '';
		switch ($role) {
			case 'admin':
				$badge = "<span class='badge alert-info'>Admin</span>";
				break;
			case 'editor':
				$badge = "<span class='badge alert-warning'>Editor</span>";
				break;
			default:
				$badge = "<span class='badge alert-warning'>Editor</span>";
				break;
		}

		return $badge;
	}
}