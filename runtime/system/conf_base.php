<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>后台管理</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/admin.css";?>" />
	<link rel="shortcut icon" href="favicon.ico" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/jquery/jquery-1.9.0.min.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/jquery/jquery-migrate-1.1.1.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/artdialog/artDialog.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/runtime/systemjs/artdialog/skins/default.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/form/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/autovalidate/validate.js"></script><link rel="stylesheet" type="text/css" href="/runtime/systemjs/autovalidate/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/artTemplate/artTemplate-plugin.js"></script>
	<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/common.js";?>"></script>
	<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/admin.js";?>"></script>
	<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/menu.js";?>"></script>
</head>
<body>
	<div class="container">
		<div id="header">
			<div class="logo">
				<a href="<?php echo IUrl::creatUrl("/system/default");?>"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/logo.gif";?>" width="303" height="43" /></a>
			</div>
			<div id="menu">
				<ul name="menu">
				</ul>
			</div>
			<p><a href="<?php echo IUrl::creatUrl("/systemadmin/logout");?>">退出管理</a> <a href="<?php echo IUrl::creatUrl("/system/default");?>">后台首页</a> <a href="<?php echo IUrl::creatUrl("");?>" target='_blank'>商城首页</a> <span>您好 <label class='bold'><?php echo isset($this->admin['admin_name'])?$this->admin['admin_name']:"";?></label>，当前身份 <label class='bold'><?php echo isset($this->admin['admin_role_name'])?$this->admin['admin_role_name']:"";?></label></span></p>
		</div>
		<div id="info_bar">
			<label class="navindex"><a href="<?php echo IUrl::creatUrl("/system/navigation");?>">快速导航管理</a></label>
			<span class="nav_sec">
			<?php $adminId = $this->admin['admin_id']?>
			<?php $query = new IQuery("quick_naviga");$query->where = "admin_id = $adminId and is_del = 0";$items = $query->find(); foreach($items as $key => $item){?>
			<a href="<?php echo isset($item['url'])?$item['url']:"";?>" class="selected"><?php echo isset($item['naviga_name'])?$item['naviga_name']:"";?></a>
			<?php }?>
			</span>
		</div>

		<div id="admin_left">
			<ul class="submenu"></ul>
			<div id="copyright"></div>
		</div>

		<div id="admin_right">
			<script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/editor/kindeditor-min.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/editor/lang/zh_CN.js"></script>
<script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/systemjs/artTemplate/artTemplate-plugin.js"></script>
<div class="headbar">
	<div class="position"><span>系统</span><span>></span><span>网站管理</span><span>></span><span>站点设置</span></div>
	<ul class='tab' name='conf_menu'>
		<li class='selected'><a href="javascript:select_tab('base_conf');">基本设置</a></li>
		<li><a href="javascript:select_tab('guide_conf');">导航设置</a></li>
		<li><a href="javascript:select_tab('index_slide');">首页幻灯设置</a></li>
		<li><a href="javascript:select_tab('site_footer_conf');">站点底部信息</a></li>
		<li><a href="javascript:select_tab('shopping_conf');">购物设置</a></li>
		<li><a href="javascript:select_tab('show_conf');">显示设置</a></li>
		<li><a href="javascript:select_tab('image_conf');">图片设置</a></li>
		<li><a href="javascript:select_tab('mail_conf');">邮箱设置</a></li>
		<li><a href="javascript:select_tab('system_conf');">系统设置</a></li>
	</ul>
</div>
<div class="content_box">

	<div class="content form_content">
		<form action="<?php echo IUrl::creatUrl("/system/save_conf/form_index/base_conf");?>"  method="post" enctype='multipart/form-data' name='base_conf'>
			<!--基本设置!-->
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>商店名称：</th>
					<td><input type='text' class='normal' name='name' pattern='required' alt='商店名称必须填写' /><label>* 网店名称</label></td>
				</tr>
				<tr>
					<th>商店网址：</th>
					<td>
						<input type='text' class='normal' name='url' pattern='url' alt='商店网址必须填写' />
						<label>* 网站完整的URL访问地址</label>
					</td>
				</tr>
				<tr>
					<th>商店logo：</th>
					<td>
						<div style="height:53px;overflow:hidden;">
							<img src='<?php echo IUrl::creatUrl("")."image/logo.gif";?><?php echo "?random=".time();?>' onload="if(this.height>50)this.height=50" />
						</div>
						<input type='file' class='normal' name='logo' /><label>直接从本地上传图片覆盖原有的网站logo</label>
					</td>
				</tr>
				<tr>
					<th>联系人：</th>
					<td><input type='text' class='normal' name='master' /></td>
				</tr>
				<tr>
					<th>QQ：</th>
					<td><input type='text' class='normal' pattern='qq' name='qq' empty alt='请填写正确的QQ号' /></td>
				</tr>
				<tr>
					<th>Email：</th>
					<td><input type='text' class='normal' pattern='email' name='email' empty alt='请填写正确的email地址' /></td>
				</tr>
				<tr>
					<th>手机：</th>
					<td><input type='text' class='normal' pattern='mobi' name='mobile' empty alt='请填写正确的手机号码' /></td>
				</tr>
				<tr>
					<th>固定电话：</th>
					<td><input type='text' class='normal' pattern='phone' name='phone' empty alt='请填写正确的固定电话' /></td>
				</tr>
				<tr>
					<th>具体地址：</th>
					<td><input type='text' class='normal' pattern='required' name='address' empty alt='商店名称必须填写' /></td>
				</tr>
				<tr>
					<th>商品货号前缀：</th>
					<td><input type='text' class='normal' pattern='required' name='goods_no_pre' empty alt='商品货号前缀' /><label>只取前两位</label></td>
				</tr>
				<tr>
					<th>首页title后缀：</th>
					<td><input type='text' class='normal' pattern='required' name='index_seo_title' empty alt='首页title后缀' /></td>
				</tr>
				<tr>
					<th>首页keywords：</th>
					<td><input type='text' class='normal' pattern='required' name='index_seo_keywords' empty alt='首页keywords' /></td>
				</tr>
				<tr>
					<th>首页description：</th>
					<td><input type='text' class='normal' pattern='required' name='index_seo_description' empty alt='首页description' /></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>保存基本设置</span></button>
					</td>
				</tr>
			</table>
		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/guide_conf");?>' method='post' name='guide_conf'>
			<table class='form_table'>
				<col width="150px" />
				<col />

				<tr>
					<th>首页导航设置：</th>
					<td>

						<table class='border_table' id='guide_box'>
							<col width="150px" />
							<col width="250px" />
							<col width="120px" />
							<thead>
							<tr>
								<th>名称</th>
								<th>链接地址</th>
								<th>操作</th>
							</tr>
							</thead>

							<tbody></tbody>

							<tfoot>
							<tr>
								<td colspan='3'>
									<button type='button' class='btn' onclick="add_guide();"><span>添加导航</span></button>
								</td>
							</tr>
							</tfoot>

							<!--导航行模板-->
							<script type='text/html' id='guideTrTemplate'>
							<tr class='td_c'>
								<td><input type='text' name='guide_name[]' class='small' value='<%=name%>' pattern='required' alt='请填写导航名' /></td>
								<td><input type='text' name='guide_link[]' class='middle' value='<%=link%>' pattern='required' alt='请填写URL，如：http://www.jooyea.cn' /></td>
								<td>
									<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_asc.gif";?>' alt='向上' title='向上' />
									<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_desc.gif";?>' alt='向下' title='向下' />
									<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>' alt='删除' title='删除' />
								</td>
							</tr>
							</script>
						</table>
						<label>设置首页顶部导航条内容和链接地址</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><button type='submit' class='submit'><span>保存导航栏配置</span></button></td>
				</tr>
			</table>
		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/index_slide");?>' method='post' name='index_slide' enctype="multipart/form-data">
			<table class='form_table'>
				<col width="150px" />
				<col />

				<tr>
					<th>首页幻灯设置：</th>
					<td>

						<table class='border_table' id='slide_box'>
							<col width="150px" />
							<col width="250px" />
							<col width="250px" />
							<col width="120px" />
							<thead>
							<tr>
								<th>名称</th>
								<th>链接地址</th>
								<th>图片文件</th>
								<th>操作</th>
							</tr>
							</thead>

							<tbody></tbody>

							<tfoot>
								<tr>
									<td colspan='4'>
										<button type='button' class='btn' onclick="add_slide();"><span>添加幻灯</span></button>
									</td>
								</tr>
							</tfoot>

							<script type='text/html' id='slideTrTemplate'>
							<tr class='td_c'>
								<td><input type='text' name='slide_name[]' class='middle' value='<%=name%>' pattern='required' /></td>
								<td><input type='text' name='slide_url[]' class='middle' value='<%=url%>' pattern='url' /></td>
								<td>
									<%if(img){%>
									<img src="<?php echo IUrl::creatUrl("");?><%=img%>" width="150px" /><br />
									<%}%>
									<input type='file' name='slide_pic[]' class='middle' />
									<input type="hidden" value="<%=img%>" name="slide_img[]" />
								</td>
								<td>
									<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_asc.gif";?>' alt='向上' title='向上' />
									<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_desc.gif";?>' alt='向下' title='向下' />
									<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>' alt='删除' title='删除' />
								</td>
							</tr>
							</script>
						</table>
						<label>设置首页幻灯片图片与名称</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><button type='submit' class='submit'><span>保存幻灯片配置</span></button></td>
				</tr>
			</table>
		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/site_footer_conf");?>' method='post' name='site_footer_conf'>

			<table class='form_table'>
				<col width="150px" />
				<col />
				<tr>
					<th>站点底部信息：</th>
					<td>
						<textarea id="site_footer_code" name='site_footer_code' style='width:95%;height:300px;'><?php echo IFilter::stripSlash($this->confRow['site_footer_code']);?></textarea>
						<label>设置站点底部页面信息，您可以点源代码试图直接进行代码编辑</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><button type='submit' class='submit'><span>保存站点底部信息</span></button></td>
				</tr>
			</table>

		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/shopping_conf");?>' method='post' name='shopping_conf'>
			<!--购物设置!-->
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>税率：</th>
					<td><input type='text' name='tax' class='small' empty pattern='float' alt='请输入正确的整数或者浮点数' />%</td>
				</tr>
				<tr>
					<th>默认备货时间：</th>
					<td><input type='text' class='small' name='stockup_time' pattern='int' alt='请填写整数' />天 <label>* 订单确认后需要备货的时间</label></td>
				</tr>
				<tr>
					<th>团购过期时间：</th>
					<td><input type='text' class='small' name='regiment_time_limit' pattern='int' alt='请填写整数' />分钟 <label>* 报名参加团购后多长时间不付款则视为过期，默认为60分钟</label></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>保存购物配置</span></button>
					</td>
				</tr>
			</table>
		</form>
		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/show_conf");?>' method='post' name='show_conf'>
			<!--显示设置!-->
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>默认的排序依据：</th>
					<td>
						<select name='order_by' class='normal'>
							<option value='new' selected=selected>上架时间</option>
							<option value='price' selected=selected>价格</option>
							<option value='sale'>销量</option>
							<option value='cpoint'>评分</option>
						</select>
						<label>* 在商品列表页中商品的排序依据条件</label>
					</td>
				</tr>
				<tr>
					<th>默认的排序方式：</th>
					<td>
						<select name='order_type' class='normal'>
							<option value='desc'>降序</option>
							<option value='asc'>升序</option>
						</select>
						<label>* 在商品列表页中商品的排序方式</label>
					</td>
				</tr>
				<tr>
					<th>列表默认展示方式：</th>
					<td>
						<select name='list_type' class='normal'>
							<option value='list' selected=selected>普通列表</option>
							<option value='win'>橱窗形式</option>
						</select>
						<label>* 在商品列表页中商品的展示样式</label>
					</td>
				</tr>
				<tr>
					<th>列表展示商品数量：</th>
					<td><input type='text' class='small' name='list_num' pattern='int' /><label>* 在商品列表页中商品的展示数量</label></td>
				</tr>
				<tr>
					<th>智能提示开启的字符数：</th>
					<td>
						<input type='text' class='small' name='auto_finish' pattern='int' alt='请填写整数' empty />
						<label>当输入若干个字符后，会出现智能提示信息</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit' onclick='add_guide();'><span>保存显示设置</span></button>
					</td>
				</tr>
			</table>
		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/image_conf");?>' method='post' enctype='multipart/form-data' name='image_conf'>
			<!--图片设置-->
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>列表页缩略图：</th>
					<td>
						宽：<input type='text' class='small' name='list_thumb_width' empty pattern='int' alt='请填写一个数字' />
						高：<input type='text' class='small' name='list_thumb_height' empty pattern='int' alt='请填写一个数字' />
					</td>
				</tr>
				<tr>
					<th>详细页缩略图：</th>
					<td>
						宽：<input type='text' name='show_thumb_width' class='small' empty pattern='int' alt='请填写一个数字' />
						高：<input type='text' name='show_thumb_height' class='small' empty pattern='int' alt='请填写一个数字' />
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>保存图片设置</span></button>
					</td>
				</tr>
			</table>
		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/mail_conf");?>' method='post' name='mail_conf'>
			<!--邮箱设置-->
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>发送Email方式：</th>
					<td>
						<label class='attr'><input type='radio' name='email_type' value='1' checked='checked' onclick="show_mail(1);" />第三方SMTP方式</label>
						<label class='attr'><input type='radio' name='email_type' value='2' onclick="show_mail(2)" />本地mail邮箱</label>
						<label>* 如果本地已经搭建好邮件服务，请选择 "本地mail邮箱"，否则选择" 第三方SMTP方式 "来发送邮件</label>
					</td>
				</tr>
				<tr>
					<th>发送邮件的地址：</th>
					<td>
						<input type='text' name='mail_address' pattern='email' alt='填写正确的email地址' class='normal' />
						<label>* 发送邮件所使用的email地址，邮件内容中的收件人信息就是显示此信息</label>
					</td>
				</tr>
				<tr name='smtp'>
					<th>SMTP地址：</th>
					<td>
						<input type='text' name='smtp' class='normal' pattern='required' empty alt='填写正确的email地址' />
						<label>第三方的SMTP的URL地址</label>
					</td>
				</tr>
				<tr name='smtp'>
					<th>用户名：</th>
					<td>
						<input type='text' name='smtp_user' class='normal' pattern='required' alt='发送邮件' empty />
						<label>SMTP用户名</label>
					</td>
				</tr>
				<tr name='smtp'>
					<th>密码：</th>
					<td><input type='password' name='smtp_pwd' class='normal' value='<?php echo isset($this->confRow['smtp_pwd'])?$this->confRow['smtp_pwd']:"";?>' empty /><label>SMTP密码</label></td>
				</tr>
				<tr name='smtp'>
					<th>端口号：</th>
					<td><input type='text' name='smtp_port' class='small' empty /><label>SMTP端口号(默认：25)</label></td>
				</tr>
				<tr>
					<th>测试邮件地址：</th>
					<td><input type='text' name='test_address' pattern='email' class='normal' empty alt='填写正确的email地址' /><label>用于测试邮件发送的功能【可选】</label></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>保存邮箱设置</span></button>
						<button class="submit" type='button' onclick="test_mail(this);"><span id='testmail'>测试邮件发送</span></button>
					</td>
				</tr>
			</table>
		</form>

		<form action="<?php echo IUrl::creatUrl("/system/save_conf/form_index/system_conf");?>" method="post" name='system_conf'>
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>清理模板缓存：</th>
					<td>
						<button class='btn' type='button' onclick="clearCache();"><span>开始清理</span></button>
						<label>清理系统编译生成的模板缓存文件</label>
					</td>
				</tr>

				<tr>
					<th>私密信息存储策略：</th>
					<td>
						<select name='safe' class='normal' pattern='required' alt='请选择一种语言'>
							<option value='cookie'>COOKIE方案(存放于客户端)</option>
							<option value='session'>SESSION方案(存放于服务器端)</option>
						</select>
						<label>注意：修改此设置后，用户会被强制退出。默认：COOKIE方案</label>
					</td>
				</tr>

				<tr>
					<th>私密信息防窃取级别：</th>
					<td>
						<select name='safeLevel' class='normal' pattern='required' alt='请选择一种级别'>
							<option value='none'>低(不进行校验)</option>
							<option value='normal' selected=selected>中(校验IP地址的一致性)</option>
							<option value='advance'>高(校验IP地址和用户浏览器一致性)</option>
						</select>
						<label>可以有效的防止cookie和session的窃取。注意：当修改了此设置，用户会被强制退出，浏览器需要清空缓存。默认：中</label>
					</td>
				</tr>

				<tr>
					<th>设置语言包：</th>
					<td>
						<?php $langList = $this->getSitePlan('lang')?>
						<select class='normal' name='lang' pattern='required' alt='请选择一种语言'>
							<?php foreach($langList as $key => $item){?>
							<option value='<?php echo isset($key)?$key:"";?>'><?php echo isset($item['name'])?$item['name']:"";?></option>
							<?php }?>
						</select>
						<label>切换整站语言</label>
					</td>
				</tr>

				<tr>
					<th>伪静态：</th>
					<td>
						<label class='attr'><input type='radio' name='rewriteRule' value="pathinfo" />开启</label>
						<label class='attr'><input type='radio' name='rewriteRule' value="url" />关闭</label>
						<label>开启伪静态前请先确保你的服务器环境支持伪静态规则，如果开启后出现问题，则需手动修改config/config.php中的url参数，设定为：url</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><button class="submit" type='submit'><span>保存系统设置</span></button></td>
				</tr>
			</table>
		</form>
	</div>
</div>

<script type='text/javascript'>
	//DOM加载完毕
	$(function(){
		//默认系统定义
		select_tab("<?php echo isset($this->confRow['form_index'])?$this->confRow['form_index']:"";?>");
		show_mail(1);

		//生成导航
		<?php $query = new IQuery("guide");$guideList = $query->find(); foreach($guideList as $key => $item){?><?php }?>
		<?php if($guideList){?>
		var guideList = <?php echo JSON::encode($guideList);?>;
		for(var index in guideList)
		{
			add_guide(guideList[index]);
		}
		<?php }else{?>
			add_guide();
		<?php }?>

		//生成幻灯片
		<?php if(isset($this->confRow['index_slide']) && $this->confRow['index_slide'] && $slide = unserialize($this->confRow['index_slide'])){?>
		var slideList = <?php echo JSON::encode($slide);?>;
		for(var index in slideList)
		{
			add_slide(slideList[index]);
		}
		<?php }else{?>
			add_slide();
		<?php }?>

		//全部表单自动填入值
		var formNameArray = ['base_conf','image_conf','shopping_conf','show_conf','mail_conf','system_conf'];
		for(var index in formNameArray)
		{
			var formObject = new Form(formNameArray[index]);
			formObject.init(<?php echo JSON::encode($this->confRow);?>);
		}

		//装载编辑器
		KindEditor.ready(function(K){
			K.create('#site_footer_code',{uploadJson:'<?php echo IUrl::creatUrl("/block/upload_img_from_editor");?>'});
		});
	});

	//测试邮件发送
	function test_mail(obj)
	{
		$('form[name="mail_conf"] input:text').each(function(){
			$(this).trigger('change');
		});

		if($('form[name="mail_conf"] input:text.invalid-text').length > 0)
		{
			return;
		}

		//按钮控制
		obj.disabled = true;
		$('#testmail').html('正在测试发送请稍后...');

		var ajaxUrl = '<?php echo IUrl::creatUrl("/system/test_sendmail/@random@");?>';
		ajaxUrl     = ajaxUrl.replace('@random@',Math.random());

		$.getJSON(ajaxUrl,$('form[name="mail_conf"]').serialize(),function(content){
			obj.disabled = false;
			$('#testmail').html('测试邮件发送');
			alert(content.message);
		});
	}

	//添加导航
	function add_guide(data)
	{
		var data = data ? data : {};
		var guideTrHtml = template.render('guideTrTemplate',data);
		$('#guide_box tbody').append(guideTrHtml);
		var last_index = $('#guide_box tbody tr').size()-1;
		buttonInit(last_index);
	}

	//增加幻灯片
	function add_slide(data)
	{
		var data = data ? data : {};
		var slideTrHtml = template.render('slideTrTemplate',data);
		$('#slide_box tbody').append(slideTrHtml);
		var last_index = $('#slide_box tbody tr').size()-1;
		buttonInit(last_index,'#slide_box');
	}

	//操作按钮绑定
	function buttonInit(indexValue,ele)
	{
		ele = ele || "#guide_box";
		if(indexValue == undefined || indexValue === '')
		{
			var button_times = $(ele+' tbody tr').length;

			for(var item=0;item < button_times;item++)
			{
				buttonInit(item,ele);
			}
		}
		else
		{
			var obj = $(ele+' tbody tr:eq('+indexValue+') .operator')

			//功能操作按钮
			obj.each(
				function(i)
				{
					switch(i)
					{
						//向上排序
						case 0:
						{
							$(this).click(
								function()
								{
									var insertIndex = $(this).parent().parent().prev().index();
									if(insertIndex >= 0)
									{
										$(ele+' tbody tr:eq('+insertIndex+')').before($(this).parent().parent());
									}
								}
							)
						}
						break;

						//向上排序
						case 1:
						{
							$(this).click(
								function()
								{
									var insertIndex = $(this).parent().parent().next().index();
									$(ele+' tbody tr:eq('+insertIndex+')').after($(this).parent().parent());
								}
							)
						}
						break;

						//删除排序
						case 2:
						{
							$(this).click(
								function()
								{
									var obj = $(this);
									art.dialog.confirm('确定要删除么？',function(){obj.parent().parent().remove()});
								}
							)
						}
						break;
					}
				}
			)
		}
	}

	//清理缓存
	function clearCache()
	{
		art.dialog({
			id:'clearCache',
			content:'<img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/loading.gif";?>" />请稍候，系统正在清理缓存文件...'
		});

		jQuery.get('<?php echo IUrl::creatUrl("/system/clearCache");?>',function(content)
		{
			art.dialog({id:'clearCache'}).close();
			var content = $.trim(content);
			if(content == 1)
				art.dialog.tips('清理成功！', 1.5);
			else
				art.dialog.tips('清理失败！', 1.5);
		});
	}

	//滑动门
	function select_tab(indexVal)
	{
		//设置默认值
		if(indexVal == '')
		{
			indexVal = 'base_conf';
		}

		var formObj  = $('form[name="'+indexVal+'"]');
		var li_index = $('form').index(formObj);

		//切换form
		$('form').hide();
		$('form:eq('+li_index+')').show();

		//切换li
		$('ul[name="conf_menu"] li').attr('class','');
		$('ul[name="conf_menu"] li:eq('+li_index+')').attr('class','selected');
	}

	//切换邮箱设置
	function show_mail(checkedVal)
	{
		if(checkedVal==1)
			$('table tr[name="smtp"] *').show();
		else
			$('table tr[name="smtp"] *').hide();
	}
</script>
		</div>
		<div id="separator"></div>
	</div>

	<script type='text/javascript'>
		//DOM加载完毕执行
		$(function(){
			//隔行换色
			$(".list_table tr:nth-child(even)").addClass('even');
			$(".list_table tr").hover(
				function () {
					$(this).addClass("sel");
				},
				function () {
					$(this).removeClass("sel");
				}
			);

			//后台菜单创建
			<?php $menu = new Menu();?>
			var data = <?php echo $menu->submenu();?>;
			var current = '<?php echo $menu->current;?>';
			var url='<?php echo IUrl::creatUrl("/");?>';
			initMenu(data,current,url);
		});
	</script>
</body>
</html>
