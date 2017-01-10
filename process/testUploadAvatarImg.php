
<div id="normalUploadDiv">

	<form id="normalUploadFormcar" method="post"
		action="ajax.php?mod=uploadify&code=image&type=normal"
		enctype="multipart/form-data" target="imageUploadifyIframe"
		onsubmit="return normalUploadFormSubmitcar()">

		<a href="javascript:void(0);" class="btn_addPic"
			style="background: none; border: none; height: auto; text-align: left; margin: 0 0; padding: 0 0;">
			上传图片 <input type="file" title="支持jpg、jpeg、gif、png格式，文件小于2M" size="1"
			style="position: absolute; cursor: pointer; -moz-transform: scale(1.5); opacity: 0; left: -55px; top: 7px; filter: alpha(opacity = 0);"
			name="topic" id="normalUploadFilecar" class="file_Prew"
			onchange="inputUploadChangeSubmitcar();">
		</a>
	</form>
<!-- 
几点对input标签style的说明：
position:absolute    把input标签从文档流中脱离出来，进行定位覆盖到a标签上
cursor:pointer    使得鼠标滑到input标签上时，形状表现为一只手
-moz-transform:scale(1.5)    在火狐浏览器下，将input标签扩大1.5倍
opacity:0    不透明度为0，表示完全透明，即：消失不见（但不同于display:none）（不透明度范围0~1）
filter: alpha(opacity = 0); 代表IE的不透明度，规则和opacity是一致的
 -->
	<p class="normal_layer">支持JPG、JPEG、GIF、PNG图片格式（小于2M）</p>
</div>
<div class="sendStatus" id="sendStatuscar" style="position: static;">
	<div class="sendThumbs uploadPicS" id="sendThumbs">
		<span id="uploadingcar"><img src="images/loading.gif" />&nbsp;上传中，请稍候……</span>
		<span class="preview" id="previewcar"></span>
		<div class="big" id="viewImgDivcar"></div>
	</div>
</div>
<iframe id="imageUploadifyIframecar" name="imageUploadifyIframe"style="display: none;"></iframe>

