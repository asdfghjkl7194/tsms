<ul class="nav nav-list">
						<li class="active">
							<a href="/admin/index">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 后台控制台 </span>
							</a>
						</li>

						<li>
							<a href="#" class="dropdown-toggle" title="brand">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 品牌管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/admin/brand/add">
										<i class="icon-double-angle-right"></i>
										增加品牌
									</a>
								</li>

								<li>
									<a href="/admin/brand/list">
										<i class="icon-double-angle-right"></i>
										品牌展示
									</a>
								</li>

								
							</ul>
						</li>

<!--愁死我了不动脑,嗷嗷嗷商品的展示和添加都是针对用户gun-->
						<li>
							<a href="#" class="dropdown-toggle" title="goods">
								<i class="icon-edit"></i>
								<span class="menu-text"> 商品管理  </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/admin/goods/add">
										<i class="icon-double-angle-right"></i>
										添加
									</a>
								</li>

								<li>
									<a href="/admin/goods/list">				<!-- 这里和商品管理展示换一下,大脑短路计划不足做的不对-->
										<i class="icon-double-angle-right"></i>
										展示
									</a>
								</li>

							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text" title="category"> 分类管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/admin/category/add">
										<i class="icon-double-angle-right"></i>
										分类添加
									</a>
								</li>

								<li>
									<a href="/admin/category/list">
										<i class="icon-double-angle-right"></i>
										分类展示
									</a>
								</li>

							</ul>
						</li>



<!--愁死我了不动脑,嗷嗷嗷商品的展示和添加都是针对用户gun-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text" title="user"> 管理员管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/admin/user/add">
										<i class="icon-double-angle-right"></i>
										管理员添加
									</a>
								</li>

								<li>
									<a href="/admin/user/list">		<!--{:url('goods/list')} 这里短路写错了写的是用户信息所以和管理员展示切换一下,-->
										<i class="icon-double-angle-right"></i>
										管理员展示
									</a>
								</li>
                                
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text" title="users"> 管理员2 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="/admin/users/add">
										<i class="icon-double-angle-right"></i>
										不要问我我都不知道怎么做的
									</a>
								</li>


							</ul>
						</li>

					</ul><!-- /.nav-list -->
