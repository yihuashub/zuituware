<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('pay'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>支付方式</h2></div>
                <div class="sect">
                    <form method="post">
					<?php $index=0;; ?>
					<!-- Alipay -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?>、支付宝（支持即时到帐或担保交易）</h3></div>
                        <div class="field">
							<label>交易类型</label>
							<select name="alipay[guarantee]" class="f-input" style="width:160px;" onchange="changealitype(this.options[this.options.selectedIndex].value);"><?php echo Utility::Option($option_guarantee, $INI['alipay']['guarantee']); ?></select><span class="inputtip">商户申请：<a href="http://act.life.alipay.com/systembiz/zuitu/" target="_blank"><font color="red">最土免费签约支付宝</font></a></span>
						</div>
						<div class="field">
                            <label  style="width:110px;padding-right:0px;text-align:left;">合作者身份(PID)</label>
                            <input type="text" size="30" name="alipay[mid]" class="f-input" style="width:200px;" value="<?php echo $INI['alipay']['mid']; ?>"/><span class='inputtip' id='alichange'> <a href="https://b.alipay.com/order/pidKey.htm?pid=2088401958539222&product=<?php if($INI['alipay']['guarantee']=='N'){?>fastpay<?php } else if($INI['alipay']['guarantee']=='Y') { ?>escrow<?php } else { ?>dualpay<?php }?>" target="_blank"><font color='red'>获取PID,KEY</font></a> </span>
                        </div>
                        <div class="field">
                            <label  style="width:110px;padding-right:0px;text-align:left;">安全校验码(KEY)</label>
                            <input type="password" size="30" name="alipay[sec]" class="f-input" value="<?php echo $INI['alipay']['sec']; ?>"/>
                        </div>
                        <div class="field">
                            <label>支付宝账户</label>
                            <input type="text" size="30" name="alipay[acc]" class="f-input" style="width:200px;" value="<?php echo $INI['alipay']['acc']; ?>"/><span class="inputtip">支付宝登录帐户名</span>
                        </div>
                        <div class="field">
                            <label>交易超时</label>
							<select name="alipay[itbpay]" class="f-input" style="width:160px;"><?php echo Utility::Option($option_alipayitbpay, $INI['alipay']['itbpay'], '------未开通------'); ?></select><span class="inputtip">未开通超功能，请不要选择</span>
						</div>
						<!--<div class="field">
						    <label>自动发货</label>
							<select name="alipay[autosendgoods]" class="f-input" style="width:160px;"><?php echo Utility::Option($option_autosendgoods, $INI['alipay']['autosendgoods']); ?></select><span class="inputtip">是否自动发货, 担保交易与双功能用户可选</span>
						</div>-->
                        <div class="field">
                            <label>成交条件</label>
							<select name="alipay[guaranteesuccess]" class="f-input" style="width:160px;"><?php echo Utility::Option($option_guaranteesuccess, $INI['alipay']['guaranteesuccess']); ?></select><span class="inputtip">(如果选择支付宝成功放款需要在支付宝发货,买家确认付款后站点才会显示付款成功)</span>
						</div>
                         <div class="field">
                             <label>快捷登陆</label>
                            <select name="alipay[alifast]" class="f-input" style="width:160px;"><?php echo Utility::Option($option_alifast, $INI['alipay']['alifast']); ?></select><span class="inputtip">使用支付宝大快捷登陆</span>                                                 </div>
                        <div class="field">
                            <label>物流地址</label>
							<select name="alipay[aliaddress]" class="f-input" style="width:160px;"><?php echo Utility::Option($option_aliaddress, $INI['alipay']['aliaddress']); ?></select><span class="inputtip">使用支付宝物流地址 / 关闭支付宝物流地址 (大快捷登录用户) </span>
						</div>
					<!-- Alipay/End -->

					<!-- Tenpay -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?>、财付通（支持网银直连）</h3></div>
                        <div class="field">
                            <label>商户ID号</label>
                            <input type="text" size="30" name="tenpay[mid]" class="f-input" value="<?php echo $INI['tenpay']['mid']; ?>" style="width:200px;"/><span class="inputtip">商户申请：<a href="http://www.zuitu.com/value_tenpay.html">签约财付通</a></span>
                        </div>
                        <div class="field">
                            <label>交易密钥</label>
                            <input type="password" size="30" name="tenpay[sec]" class="f-input" value="<?php echo $INI['tenpay']['sec']; ?>"/>
                        </div>
						<div class="field">
							<label>交易类型</label>
							<select name="tenpay[guarantee]" class="f-input" style="width:160px;"><?php echo Utility::Option($option_tenpayguarantee, $INI['tenpay']['guarantee']); ?></select><span class="inputtip">财付通担保交易／即时到帐交易 </span>
						</div>
                        <div class="field">
                            <label>网银直连</label>
							<select name="tenpay[direct]" class="f-input" style="width:200px;"><?php echo Utility::Option($option_yn, $INI['tenpay']['direct']); ?></select>
							<span class="inputtip">直接显示网银支付选项</span>
                        </div>
					<!-- Tenpay/END -->
                                        
					<!-- Sdopay -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?>、盛付通支付（支持网银直连）</h3></div>
                        <div class="field">
                            <label>商户ID号</label>
                            <input type="text" size="30" name="sdopay[mid]" class="f-input" value="<?php echo $INI['sdopay']['mid']; ?>" style="width:200px;"/><span class="inputtip">商户申请：<a href="http://www.zuitu.com/value_yeepay.html">签约盛付通支付</a></span>
                        </div>
                        <div class="field">
                            <label>交易密钥</label>
                            <input type="password" size="30" name="sdopay[sec]" class="f-input" value="<?php echo $INI['sdopay']['sec']; ?>"/>
                        </div>
                        <div class="field">
                            <label>网银直连</label>
							<select name="sdopay[direct]" class="f-input" style="width:200px;"><?php echo Utility::Option($option_yn, $INI['sdopay']['direct']); ?></select>
							<span class="inputtip">直接显示网银支付选项</span>
                        </div>
					<!-- Sdopay/END -->
 
					<!-- Yeepay -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?>、易宝支付（支持网银直连）</h3></div>
                        <div class="field">
                            <label>商户ID号</label>
                            <input type="text" size="30" name="yeepay[mid]" class="f-input" value="<?php echo $INI['yeepay']['mid']; ?>" style="width:200px;"/><span class="inputtip">商户申请：<a href="http://www.zuitu.com/value_yeepay.html">签约易宝支付</a></span>
                        </div>
                        <div class="field">
                            <label>交易密钥</label>
                            <input type="password" size="30" name="yeepay[sec]" class="f-input" value="<?php echo $INI['yeepay']['sec']; ?>"/>
                        </div>
                        <div class="field">
                            <label>网银直连</label>
							<select name="yeepay[direct]" class="f-input" style="width:200px;"><?php echo Utility::Option($option_yn, $INI['yeepay']['direct']); ?></select>
							<span class="inputtip">直接显示网银支付选项</span>
                        </div>
					<!-- Yeepay/END -->

					<!-- Chinabank -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?>、网银在线（没有的话，保留为空）</h3></div>
                        <div class="field">
                            <label>商户ID号</label>
                            <input type="text" size="30" name="chinabank[mid]" class="f-input" value="<?php echo $INI['chinabank']['mid']; ?>" style="width:200px;"/><span class="inputtip">商户申请：<a href="http://www.zuitu.com/value_chinabank.html">签约网银在线</a></span>
                        </div>
                        <div class="field">
                            <label>交易密钥</label>
                            <input type="password" size="30" name="chinabank[sec]" class="f-input" value="<?php echo $INI['chinabank']['sec']; ?>"/>
                        </div>
					<!-- Chinabank/End -->

					<!-- 99BILL -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?>、快钱（没有的话，保留为空）</h3></div>
                        <div class="field">
                            <label>商户ID号</label>
                            <input type="text" size="30" name="bill[mid]" class="f-input" value="<?php echo $INI['bill']['mid']; ?>" style="width:200px;"/><span class="inputtip">商户申请：<a href="http://www.zuitu.com/value_99bill.html">签约快钱支付</a></span>
                        </div>
                        <div class="field">
                            <label>交易密钥</label>
                            <input type="password" size="30" name="bill[sec]" class="f-input" value="<?php echo $INI['bill']['sec']; ?>"/>
                        </div>
					<!-- 99BILL/End -->

					<!-- Paypal -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?>、Paypal（没有的话，保留为空）</h3></div>
                        <div class="field">
                            <label>Account Email</label>
                            <input type="text" size="30" name="paypal[mid]" class="f-input" value="<?php echo $INI['paypal']['mid']; ?>" style="width:200px;" /><span class="inputtip">Email of paypal account.</span>
                        </div>
                        <div class="field">
                            <label>Location</label>
                            <input type="text" size="30" name="paypal[loc]" class="f-input" value="<?php echo $INI['paypal']['loc']; ?>" style="width:200px;"/><span class="inputtip">Location, such as: US,CA,CN</span>
                        </div>
					<!-- Paypal/End -->
                                        <!-- cmpay -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?>、手机支付（没有的话，保留为空）</h3></div>
                        <div class="field">
                            <label>商户ID号</label>
                            <input type="text" size="30" name="cmpay[mid]" class="f-input" value="<?php echo $INI['cmpay']['mid']; ?>" style="width:200px;"/><span class="inputtip">商户申请：<a href="http://www.zuitu.com/value_tenpay.html">签约手机支付</a></span>
                        </div>
                        <div class="field">
                            <label>交易密钥</label>
                            <input type="password" size="30" name="cmpay[sec]" class="f-input" value="<?php echo $INI['cmpay']['sec']; ?>"/>
                        </div>
					<!-- cmpay/End -->
                    <!-- gopay -->
					    <div class="wholetip clear"><h3><?php echo ++$index; ?>、国付宝支付（没有的话，保留为空）</h3></div>
					    <div class="field">
						     <label>商户代号</label>
						     <input type="text" size="30" name="gopay[mid]" class="f-input" value="<?php echo $INI['gopay']['mid']; ?>" style="width:200px;"/><span class="inputtip">商户申请：<a href="http://www.gopay.com.cn/">签约国付宝支付</a></span>
					     </div>
						 <div class="field">
						      <label>国付宝账号</label>
						      <input type="text" size="30" name="gopay[acc]" class="f-input" style="width:200px;" value="<?php echo $INI['gopay']['acc']; ?>"/><span class="inputtip">国付宝转入账号</span>
			             </div>
						 <div class="field">
						      <label>商户识别码</label>
							  <input type="text" size="30" name="gopay[code]" class="f-input" style="width:200px;" value="<?php echo $INI['gopay']['code']; ?>"/><span class="inputtip">国付宝商户识别码</span>
				         </div>
						 <div class="field">
						      <label>网银直连</label>
							  <select name="gopay[direct]" class="f-input" style="width:200px;"><?php echo Utility::Option($option_yn, $INI['gopay']['direct']); ?></select><span class="inputtip">直接显示网银支付选项</span>
						 </div>
				    <!-- gopay/End -->
                    <!-- other -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?>、其他支付手段</h3></div>
                        <div class="field">
                            <label>支付信息</label>
                            <div style="float:left;"><textarea cols="45" rows="5" name="other[pay]" class="f-textarea editor"><?php echo htmlspecialchars($INI['other']['pay']); ?></textarea></div>
                        </div>
                        <div class="act">
                            <input type="submit" value="保存" name="commit" class="formbutton"/>
                        </div>
					<!-- other/End -->
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>
<script language="javascript">
	function changealitype(type){
		if(type == 'Y'){
			$("#alichange").replaceWith("<span class='inputtip' id='alichange'><a href='https://b.alipay.com/order/pidKey.htm?pid=2088401958539222&product=escrow' target='_bacnk'><font color='red'>获取PID,KEY</font></a> </span>");
		}
		else if(type=='N'){
			$("#alichange").replaceWith("<span class='inputtip' id='alichange'><a href='https://b.alipay.com/order/pidKey.htm?pid=2088401958539222&product=fastpay' target='_bacnk'><font color='red'>获取PID,KEY</font></a> </span>");
		}
		else if(type=='S'){
			$("#alichange").replaceWith("<span class='inputtip' id='alichange'><a href='https://b.alipay.com/order/pidKey.htm?pid=2088401958539222&product=dualpay' target='_bacnk'><font color='red'>获取PID,KEY</font></a> </span>");
		}	
	}

</script>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
