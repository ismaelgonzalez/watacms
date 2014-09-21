<?php
class TaggableBehavior extends ModelBehavior
{
	public function afterSave(Model $model, $created, $options = array())
	{
		//set up globals and import the Tag & Tagged models
		App::import('Model', 'Tag');
		App::import('Model', 'Tagged');

		$obj_tag = new Tag();
		$obj_tagged = new Tagged();
		$model_name = strtolower($model->alias);

		//delete all tags for this model and model->id
		$obj_tagged->deleteAll(array(
			'model' => strtolower($model->alias),
			'model_id' => $model->id,
		));

		//if we have tagged, split it and create arrTags
		if (!empty($model->data[$model->alias]['tagged'])) {
			//create array from tagged string and then do a foreach
			$arrTags = array_unique(explode(',', $model->data[$model->alias]['tagged']));

			//run a foreach on arrTags
			foreach ($arrTags as $tag) {
				////create tagged object
				$obj_tagged->create();

				//if tag is number then check and see if already tagged, if not add tag
				if (is_numeric($tag)) {
					//////add Tagged record
					$tagged = array(
						'Tagged' => array(
							'tag_id' => $tag,
							'model' => $model_name,
							'model_id' => $model->id
						)
					);

					$obj_tagged->save($tagged);
				} else { //if tag is string then add tag, get id, then send to tagged
					//////create Tag object
					$obj_tag->create();
					//////add Tag record
					$new_tag = array(
						'Tag' => array(
							'tag' => $tag
						)
					);
					$obj_tag->save($new_tag);

					//////add Tagged record
					$tagged = array(
						'Tagged' => array(
							'tag_id' => $obj_tag->getInsertId(),
							'model' => $model_name,
							'model_id' => $model->id
						)
					);

					$obj_tagged->save($tagged);
				}
			}
		}
	}
}