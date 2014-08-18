<?php
class StatusHelper extends AppHelper {
	/*
	 * This function returns a status badge
	 */
	public function getStatus($status) {
		$badge = '';
		switch($status) {
			case 1:
				$badge = "<span class='label label-success'>Activo</span>";
				break;
			case 0:
				$badge = "<span class='label label-danger'>Desactivado</span>";
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
				$badge = "<span class='label label-info'>Arriba</span>";
				break;
			case 'D':
				$badge = "<span class='label label-info'>Abajo</span>";
				break;
			case 'L':
				$badge = "<span class='label label-info'>Izquierda</span>";
				break;
			case 'R':
				$badge = "<span class='label label-info'>Derecha</span>";
				break;
			case 'W':
				$badge = "<span class='label label-info'>Wallpaper</span>";
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
				$badge = "<span class='label label-info'>Zona Norte</span>";
				break;
			case 'S':
				$badge = "<span class='label label-info'>Zona Sur</span>";
				break;
			case 'P':
				$badge = "<span class='label label-info'>Zona Poniente</span>";
				break;
			case 'O':
				$badge = "<span class='label label-info'>Zona Oriente</span>";
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
				$badge = "<span class='label label-primary'>Admin</span>";
				break;
			case 'editor':
				$badge = "<span class='label label-warning'>Editor</span>";
				break;
			default:
				$badge = "<span class='label label-warning'>Editor</span>";
				break;
		}

		return $badge;
	}
}