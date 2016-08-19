
<input name="image[]" class="upload_input" multiple="multiple" type=file accept="image/jpeg, image/gif, image/png"/>
<input type=submit value="submit form" />
<input name="entity_id" type="hidden" value="<?=$vars['entity']->guid?>"/>
<input name="entity_field" type="hidden" value="<?=$vars['field']?>"/>