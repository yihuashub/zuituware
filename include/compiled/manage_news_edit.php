<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_news('news'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
				<?php if($news['id']){?>
					<h2>编辑新闻</h2>
					<ul class="filter"><?php echo current_managenews('edit', $news['id']); ?></ul>
				<?php } else { ?>
					<h2>新建新闻</h2>
				<?php }?>
				</div>
                <div class="sect">
				<form id="-user-form" method="post" action="/manage/news/edit.php?id=<?php echo $news['id']; ?>" enctype="multipart/form-data" class="validator">
					<input type="hidden" name="id" value="<?php echo $news['id']; ?>" />
					<div class="field">
						<label>新闻标题</label>
						<input type="text" size="30" name="title" id="team-create-title" class="f-input" value="<?php echo htmlspecialchars($news['title']); ?>" datatype="require" require="true" />
					</div>
					<div class="field">
						<label>新闻时间</label>
						<input type="text" size="10" name="begin_time" id="team-create-begin-time" class="date" xd="<?php echo date('Y-m-d', $news['begin_time']); ?>" xt="<?php echo date('H:i:s', $news['begin_time']); ?>" value="<?php echo date('Y-m-d H:i:s', $news['begin_time']); ?>" maxLength="10" />
					</div>
					<div class="field">
						<label>新闻内容</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="detail" id="team-create-detail" class="f-textarea editor"><?php echo htmlspecialchars($news['detail']); ?></textarea></div>
					</div>
					</div>
					<input type="submit" value="提交" name="commit" id="leader-submit" class="formbutton" style="margin:10px 0 0 120px;"/>
				</form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->
<script type="text/javascript">
window.x_init_hook_teamchangetype = function(){
	X.team.changetype("<?php echo $team['team_type']; ?>");
};
window.x_init_hook_page = function() {
	X.team.imageremovecall = function(v) {
		jQuery('#team_image_'+v).remove();
	};
	X.team.imageremove = function(id, v) {
		return !X.get(WEB_ROOT + '/ajax/misc.php?action=imageremove&id='+id+'&v='+v);
	};
};
</script>
<?php include template("manage_footer");?>
