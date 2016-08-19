<?php

$zh = array(
    'au_subgroups' => "子群",
    'au_subgroups:subgroup' => "子群",
    'au_subgroups:subgroups' => "子群",
    'au_subgroups:parent' => "父群",
    'au_subgroups:add:subgroup' => '创建子群',
    'au_subgroups:nogroups' => '该群没有子群',
    'au_subgroups:needjoinparent' => '这是一个子群，要加入该群，你首先需要加入父群',
    'au_subgroups:error:notparentmember' => "如果不是父群的成员，不能加入子群",
    'au_subtypes:error:create:disabled' => "Subgroup creation has been disabled for this group",
    'au_subgroups:noedit' => "Cannot edit this group",
    'au_subgroups:subgroups:delete' => "Delete Group",
    'au_subgroups:delete:label' => "What should happen to the content of this group?  Any option selected will also apply to any subgroups that will be deleted.",
    'au_subgroups:deleteoption:delete' => 'Delete all content within this group',
    'au_subgroups:deleteoption:owner' => 'Transfer all content to the original creators',
    'au_subgroups:deleteoption:parent' => 'Transfer all content to the parent group',
    'au_subgroups:subgroup:of' => "Sub-Group of %s",
    'au_subgroups:setting:display_alphabetically' => "Display personal group listings alphabetically?",
    'au_subgroups:setting:display_subgroups' => 'Show subgroups in standard group listings?',
    'au_subgroups:setting:display_featured' => 'Show featured groups sidebar on personal group listings?',
    'au_subgroups:error:invite' => "Action has been cancelled - the following users are not members of the parent group and cannot be invited/added.",
    'au_subgroups:option:parent:members' => "Members of the parent group",
    'au_subgroups:subgroups:more' => "查看所有子群",
    'group:setmanager' => "设为管理员",
    'group:removemanager' => "取消管理员",
	
	// group options
	'au_subgroups:group:enable' => '允许创建子群', 
	'au_subgroups:group:memberspermissions' =>'允许任何成员创建子群（选no，则仅管理员可以创建）', 
    
    /*
     * Widget
     */
    'au_subgroups:widget:order' => 'Order results by',
    'au_subgroups:option:default' => 'Time Created',
    'au_subgroups:option:alpha' => 'Alphabetical',
    'au_subgroups:widget:numdisplay' => 'Number of subgroups to display',
    'au_subgroups:widget:description' => 'List subgroups for this group',
	
	/*
	 * Move group
	 */
	'au_subgroups:move:edit:title' => "Make this group a subgroup of another group",
	'au_subgroups:transfer:help' => "You can set this group as a subgroup of any other group you have permissions to edit.  If users are not a member of the new parent group, they will be removed from this group and sent a new invitation that will enroll them in the new parent group and all subgroups leading to this one. <b>This will also transfer any subgroups of this group</b>",
	'au_subgroups:search:text' => "Search Groups",
	'au_subgroups:search:noresults' => "No groups found",
	'au_subgroups:error:timeout' => "Search timed out",
	'au_subgroups:error:generic' => "An error has occurred with the search",
	'au_subgroups:move:confirm' => "确认要将该群设置为所选群的子群?",
	'au_subgroups:error:permissions' => "You must have edit permissions for the subgroup and each parent up to the top.  Additionally, a group cannot move to a subgroup of itself.",
	'au_subgroups:move:success' => "群移动成功",
  'au_subgroups:noparent' => '设置为没有父群',
	'au_subgroups:error:invalid:group' => "Invalid group identifier",
	'au_subgroups:invite:body' => "Hi %s,

The group %s has been moved to a subgroup of the group %s.
As you are not currently a member of the new parent group you have been removed from
the subgroup.  You have been re-invited into the group, accepting the invitation will
automatically join you as a member of all parent groups.

Click below to view your invitations:

%s",
  'au_subgroups:moveto:subject' => '%s, 在群%s被设置为%s的子群时，你成为%s的成员了',
  'au_subgroups:moveto:subject' => "%s,你好， 
  在群%s被设置为%s的子群时，你自动成为%s的成员了
  现在进入群：%s",

);
					
add_translation("zh",$zh);
