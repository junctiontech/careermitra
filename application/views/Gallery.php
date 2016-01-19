
<!--------------------------------------------Jumbotron-----------------------------------
------------------------------------------------------->


   <div class="container">
  <div class="jumbotron"> 
	
     <h1>GALLERY</h1>
  </div>
  
</div>

<!-------------------search button-----------
---------------------------------------------->
<div class="container">
					<div class="col-sm-3 col-md-3 pull-right">
							<form class="search" >
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
										<div class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
										</div>
								</div>
					</div>


					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1" style="margin-left:20px" "margin-top:0px">
									<li><a href="javascript"><i class="fa-home"></i>Home</a></li>
									<li class="active"><a href="tables-basic.html">Gallery</a></li>
								</ol>
								
					</div>
	</div>


<!-----------------------------body----------------
-------------------------------------------------------------- gallery------->


<div class="container">
<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Gallery</h1>
					<p class="description">Gallery albums and images list</p>
				</div>
				
				
					
			</div>
			<script type="text/javascript">
			// Sample Javascript code for this page
			jQuery(document).ready(function($)
			{
				// Sample Select all images
				$("#select-all").on('change', function(ev)
				{
					var is_checked = $(this).is(':checked');
					
					$(".album-image input[type='checkbox']").prop('checked', is_checked).trigger('change');
				});
				
				// Edit Modal
				$('.gallery-env a[data-action="edit"]').on('click', function(ev)
				{
					ev.preventDefault();
					$("#gallery-image-modal").modal('show');
				});
				
				// Delete Modal
				$('.gallery-env a[data-action="trash"]').on('click', function(ev)
				{
					ev.preventDefault();
					$("#gallery-image-delete-modal").modal('show');
				});
				
				
				// Sortable
				
				$('.gallery-env a[data-action="sort"]').on('click', function(ev)
				{
					ev.preventDefault();
					
					var is_sortable = $(".album-images").sortable('instance');
					
					if( ! is_sortable)
					{
						$(".gallery-env .album-images").sortable({
							items: '> div'
						});
						
						$(".album-sorting-info").stop().slideDown(300);
					}
					else
					{
						$(".album-images").sortable('destroy');
						$(".album-sorting-info").stop().slideUp(300);
					}
				});
			});
			</script>
			
			<section class="gallery-env">
			
				<div class="row">
					<div class="col-sm-3 gallery-left">
						
<!-- Gallery Sidebar ------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------->


						<div class="gallery-sidebar">			
							
							<div class="btn btn-block btn-secondary" style="background-color:#8079C9; margin-top:20px";>
								<i class="linecons-photo"></i>
								<span>Album</span>
							</div>
							
							<ul class="list-unstyled">
								<li class="active">
									<a href="#">
										<i class="fa-folder-open-o"></i>
										<span>General</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa-folder-o"></i>
										<span>Workshop images</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa-folder-o"></i>
										<span>Institute images</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa-folder-o"></i>
										<span>Student</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa-folder-o"></i>
										<span>Mentors</span>
									</a>
								</li>
							</ul>
							
						</div>
						
					</div>
					<!-- Gallery Album Optipns and Images -->
					<div class="col-sm-9 gallery-right">
						
						<!-- Album Header -->
						<div class="album-header">
							<h2>General</h2>
							
							
						</div>
						
						
						
						<!-- Album Images -->
						<div class="album-images row">
							
							<!-- Album Image -->
						<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="album-image">
									
										<img src="assets/images/album-img-8.png" class="img-responsive" />
									
									
									<a href="#" class="name">
										<span>IMG_002.jpg</span>
										<em>24 August 2013</em>
									</a>
									
							
							</div>
							
						</div>
							
							<!-- Album Image -->
							<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="album-image">
									
										<img src="assets/images/album-img-8.png" class="img-responsive" />
									
									
									<a href="#" class="name">
										<span>IMG_002.jpg</span>
										<em>24 August 2013</em>
									</a>
									
							
							</div>
							
						</div>
							
							<!-- Album Image -->
						<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="album-image">
									
										<img src="assets/images/album-img-8.png" class="img-responsive" />
									
									
									<a href="#" class="name">
										<span>IMG_002.jpg</span>
										<em>24 August 2013</em>
									</a>
									
							
							</div>
							
						</div>
							
							<!-- Album Image -->
							<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="album-image">
									
										<img src="assets/images/album-img-8.png" class="img-responsive" />
									
									
									<a href="#" class="name">
										<span>IMG_002.jpg</span>
										<em>24 August 2013</em>
									</a>
									
							
							</div>
							
						</div>
							
							<!-- Album Image -->
							<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="album-image">
									
										<img src="assets/images/album-img-8.png" class="img-responsive" />
									
									
									<a href="#" class="name">
										<span>IMG_002.jpg</span>
										<em>24 August 2013</em>
									</a>
									
							
							</div>
							
						</div>
							
							<!-- Album Image -->
						<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="album-image">
									
										<img src="assets/images/album-img-8.png" class="img-responsive" />
									
									
									<a href="#" class="name">
										<span>IMG_002.jpg</span>
										<em>24 August 2013</em>
									</a>
									
							
							</div>
							
						</div>
							<!-- Album Image -->
							<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="album-image">
									
										<img src="assets/images/album-img-7.png" class="img-responsive" />
									</a>
									
									<a href="#" class="name">
										<span>IMG_207.jpg</span>
										<em>25 November 2015</em>
									</a>
									
									
									
									
								</div>
							</div>
							
							<!-- Album Image -->
							<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="album-image">
									
										<img src="assets/images/album-img-8.png" class="img-responsive" />
									
									
									<a href="#" class="name">
										<span>IMG_002.jpg</span>
										<em>24 August 2013</em>
									</a>
									
							
							</div>
							
						</div>
						
						
						<button class="btn btn-white btn-block">
							<i class="fa-bars"></i>
							Load More Images
						</button>
						
					</div>
					
				
				
				
				
				</div>
				
			</section>
			