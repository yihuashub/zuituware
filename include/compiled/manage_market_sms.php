<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('sms'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
				<div class="head"><h2>短信群发</h2>
				<ul class="filter"><?php echo mcurrent_market_sms('sms'); ?></ul>
				</div>
                <div class="sect">
                    <form method="post" class="validator">
                        <div class="field">
                            <label>手机号码</label>
							<div style="float:left;"><textarea cols="45" rows="5" name="phones" class="f-textarea" datatype="require" require="true"><?php echo htmlspecialchars($_POST['phones']); ?></textarea></div>
							<span class="hint">使用半角逗号或空格或者换行隔开多个手机号码，一次最多发送300个手机号码</span>
                        </div>

                        <div class="field">
                            <label>短信内容</label>
							<div style="float:left;"><textarea id="sms-content-id" cols="45" rows="5" name="content" class="f-textarea" datatype="require" require="true" onkeyup='return X.misc.smscount();'><?php echo htmlspecialchars($_POST['content']); ?></textarea></div>
							<span class="hint">长度67个字以内，1个字母和1个汉字都认为是1个字，当前&nbsp;<span id="span-sms-length-id" style="color:red;font-weight:bold;font-size:14px;">0</span>&nbsp;字符，拆分为&nbsp;<span id="span-sms-split-id" style="color:red;font-weight:bold;font-size:14px;">0</span>&nbsp;条短信</span>
                        </div>

                        <div class="act">
                            <input type="submit" value="发送" name="commit" class="formbutton"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
