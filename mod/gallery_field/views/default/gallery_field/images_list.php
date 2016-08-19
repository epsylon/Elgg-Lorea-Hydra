<?php

elgg_load_library('elgg:gallery_field');
elgg_load_js('gallery_field_editor');

$entity = elgg_extract('entity', $vars, '');
$field = elgg_extract('field', $vars, 'images');
$full_view = elgg_extract('full_view', $vars, null);
if($full_view === false)
{
	return;
}

$image_ids = gallery_field_image_ids_from_value($entity->$field);
$canEdit = $entity->canEdit();

$class = 'gallery-field-images-list';

if($canEdit)
{
	$class .= " gallery-field-editor";
}
?>

<div class="<?=$class?>" data-entity-id='<?=$entity->guid?>' data-entity-field="<?=$field?>">
		
	
<?php if($canEdit) { 
		
	//	echo "<a class='editor_toggler' name='editor_{$field}' href='#'>".elgg_echo("gallery_field:edit_images")."</a>";
		
		echo "<div class='editor elgg-box' style='display:none;'>";
		{			
			/**
			 * Main editor menu
			 */
			echo "<div class='editor_main'>";
			{
				echo "<p>".elgg_echo("gallery_field:editor_preview").":</p>";
				
				echo elgg_view_form('gallery_field/upload', array(
					'enctype' => 'multipart/form-data',
					'style' => 'height: 0; overflow: hidden;'
				), array(
					'entity' => $entity,
					'field' => $field
				));
				
					echo elgg_view('input/button', array(
						'value' => elgg_echo('upload'),
						'class' => 'elgg-button-submit upload-btn'
					));		
					
				if(count($image_ids) > 0)
				{					

					echo elgg_view('input/button', array(
						'value' => elgg_echo('sort'),
						'class' => 'elgg-button-submit sort-btn'
					));								

					echo elgg_view('input/button', array(
						'value' => elgg_echo('delete'),
						'class' => 'elgg-button-delete delete-btn'
					));	
				}

				echo elgg_view('input/button', array(
					'value' => elgg_echo('cancel'),
					'class' => 'elgg-button-cancel edit-cancel-btn'
				));		
			}
			echo "</div>";

			/**
			 * Image deleting
			 */
			echo "<div class='delete_images' style='display:none;'>";
			{	
				echo "<p>".elgg_echo('gallery_field:delete_info')."</p>";

				echo elgg_view('input/button', array(
					'value' => elgg_echo('delete'),
					'class' => 'elgg-button-delete delete-confirm-btn',
					'data-confirm-text' => elgg_echo('gallery_field:delete_confirm'),
					'data-empty-text' => elgg_echo('gallery_field:delete_empty')
				));				

				echo elgg_view('input/button', array(
					'value' => elgg_echo('cancel'),
					'class' => 'elgg-button-cancel delete-cancel-btn'
				));							

			}
			echo "</div>";
			
			/**
			 * Image sorting
			 */
			echo "<div class='sort_images' style='display:none;'>";
			{	
				echo "<p>".elgg_echo('gallery_field:sort_info')."</p>";		

				echo elgg_view('input/button', array(
					'value' => elgg_echo('save'),
					'class' => 'elgg-button-submit sort-success-btn'
				));							

			}
			echo "</div>";
			
			/**
			 * Loading panel
			 */
			echo "<h2 class='loading' style='display: none;'>".elgg_echo('gallery_field:loading')."</h2>";
		}
		echo "</div>";
	} ?>	
	
	<?php if(count($image_ids) > 0) { ?>
	<div class="images">
		<div class='dragger'>
		<?php 
			foreach($image_ids as $image_id){ 				
		?>
			<div class="image">
				<a href="/gallery_field_image/<?=$image_id?>" data-image-id="<?=$image_id?>">
					<img src="/gallery_field_image/<?=$image_id?>/thumb"/>
				</a>
			</div>
		<?php 			
			} 
		?>
		</div>
		<div class='clear'></div>
	</div>	
	<div class="image_full"></div>
	<?php } ?>
			
</div>

