<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">关闭</span>发送短信：<?php echo $mobile; ?></h3>
	<div style="overflow-x:hidden;padding:10px;">
		<p style="margin:10px 0;">请输入短信内容</p>
		<textarea id="dialog_content" style="width:340px;margin-bottom:10px;padding:4px;" rows="8"></textarea>
		<input type="submit" value="发送" class="formbutton" onclick="misc_smssend();" />
	</div>
</div>
<script>
function misc_smssend() {
	var content = jQuery.trim(jQuery('#dialog_content').val());
	if (!content) return alert('请输入短信内容');
	X.get(WEB_ROOT + '/ajax/misc.php?action=smssend&v=<?php echo $mobile; ?>&content=' + encodeURIComponent(content));
}

function call_succ() {
	alert('短信发送到：<?php echo $mobile; ?>成功！');
	X.boxClose();
}

function call_fail(c) {
	alert('短信发送到：<?php echo $mobile; ?>失败，错误码：' + c);
}
</script>
