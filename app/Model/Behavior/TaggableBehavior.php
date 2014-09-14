<?php
class TaggableBehavior extends ModelBehavior
{
	public function afterSave(Model $model, $created, $options = array()) {
		App::import('Model', 'Tag');
		App::import('Model', 'Tagged');
		
		$obj_tag = new Tag();
		$obj_tagged = new Tagged();

		if (!empty($model->data[$model->alias]['tagged'])) {
			//create array from tagged string and then do a foreach
			$arrTags = array_unique(explode(',',$model->data[$model->alias]['tagged']));
			foreach($arrTags as $tag) {
				//if tag is number then check and see if already tagged, if not add tag
				$obj_tagged->create();

				if (is_numeric($tag)) {
					$is_tag = $obj_tagged->find('all',
						array(
							'conditions' => array(
								'Tagged.tag_id' => $tag,
								'Tagged.model' => $model->alias,
								'Tagged.model_id' => $model->getInsertId()
							)
						)
					);

					if(!$is_tag) {
						$tagged = array(
							'Tagged' => array(
								'tag_id' => $tag,
								'model' => $model->alias,
								'model_id' => $model->getInsertId()
							)
						);

						$obj_tagged->save($tagged);
					}
				} else {
					//if tag is string then add tag, get id, then send to tagged
					$new_tag = array(
						'Tag' => array(
							'tag' => $tag
						)
					);
					$obj_tag->save($new_tag);

					$tagged = array(
						'Tagged' => array(
							'tag_id' => $obj_tag->getInsertId(),
							'model' => $model->alias,
							'model_id' => $model->getInsertId()
						)
					);

					$obj_tagged->save($tagged);
				}
			}
		}

	}
}