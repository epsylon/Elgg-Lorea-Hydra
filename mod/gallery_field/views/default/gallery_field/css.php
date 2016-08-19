/*<style>*/

	
.gallery-field-images-list{
	padding-top: 5px;

}
.gallery-field-images-list .images .image{
	margin: 10px;
	display: inline-block;
	vertical-align:top;
	margin-right: 5px;	
	height: 141px;
}
.gallery-field-images-list.edit_list .images .image{
	display: block;
	float: left;
	vertical-align:top;
	margin-right: 5px;
}
.gallery-field-images-list .images .image a{
	display: inline-block;
	width: 200px;
	height: 140px;
}
.gallery-field-images-list .images a.deleting img{
	opacity: 0.5;
}
.gallery-field-images-list .images a.deleting{
	background: red;
}
.gallery-field-images-list .clear{
	clear: both;
}
.gallery-field-images-list .images{
	height: 180px;
	overflow-x: scroll;
	overflow-y: hidden;
	white-space: nowrap;
}
.gallery-field-images-list.edit_list .images{
	height: auto;
	overflow-x: auto;
	overflow-y: auto;
	white-space: initial;
}
.gallery-field-images-list.collapsed .images .dragger{
	width: auto;
	margin-top: 5px;
}
.gallery-field-images-list .image_full img{
	width: 100%;
	margin-top: 10px;
}
.gallery-field-images-list.edit_list .image_full{
	display: none;
}
.gallery-field-images-list .images a:focus img{
	outline: 2px solid #5097CF;
}
.gallery-field-images-list .editor{
	margin-top: 10px;
}