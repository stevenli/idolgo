<div class="page_body_b" style="top:0">
	<table class="tinfo">
		<tr>
			<td class="tlabel"><label class="r">项目名称:</label></td>
			<td><input type="text" value="999" /></td>
		</tr>
		<tr>
			<td class="tlabel"><label class="r">项目类型: </label></td>
			<td><select></select></td>
		</tr>
		<tr>
			<td class="tlabel"><label class="r">发起地点: </label></td>
			<td>
				<select></select>
				<select></select>
			</td>
		</tr>
		<tr>
			<td class="tlabel"><label class="r">简要说明: </label></td>
			<td><textarea></textarea></td>
		</tr>
		<tr>
			<td class="tlabel"><label class="r">缩略图: </label></td>
			<td><input type="file" name="thumb"></td>
		</tr>
		<tr>
			<td class="tlabel"><label class="r">目标金额: </label></td>
			<td><input type="text" name="total_amount" /></td>
		</tr>
		<tr>
			<td class="tlabel"><label class="r">上线天数: </label></td>
			<td><input type="text" name="online_days" /></td>
		</tr>
	</table>
</div>
<?=JsUtils::ob_start();?>
<script>
$(function ()
{
	$.ajaxSetup({
		global: false,
		type: "POST",
		dataType: 'json'
	});
});
</script>
<?=JsUtils::ob_end();?>