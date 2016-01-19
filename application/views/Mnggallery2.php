

<!----------------------------------------------main content----------------------------------------------------------
--------------------------------------------------------------------------------------------------------------->
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
	
	
	<!-- Gallery Sidebar ------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------->		
		
		<section class="gallery-env">
			
			<div class="row">
				<div class="col-sm-2 gallery-left">

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
					
					
						
<!--------------------------------------------------- Gallery Album Optipns and Images 
----------------------------------------------------------------------------------------------------->

				<div class="col-sm-9 gallery-right">
						
						<!-- Album Header -->
						<div class="album-header">
							<h2>General</h2>
							
							<ul class="album-options list-unstyled list-inline">
								
								<li>
									<a href="#">
										<i class="fa-upload"></i>
										Add Images
									</a>
								</li>
								<li>
									<a href="#" data-action="sort">
										<i class="fa-arrows"></i>
										Re-order
									</a>
								</li>
								<li>
									<a href="#" data-action="edit">
										<i class="fa-edit"></i>
										Edit
									</a>
								</li>
								<li>
									<a href="#" data-action="trash">
										<i class="fa-trash"></i>
										Trash
									</a>
								</li>
							</ul>
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
			</div>
		</section>
			
</div>