<!--------------------------------------------Jumbotron-----------------------------------
------------------------------------------------------->


   <div class="container">
  <div class="jumbotron"> 
	
     <h1>Institute</h1>
  </div>
  
</div>

<!-------------------search button-----------
---------------------------------------------->
<div class="container">
					<!---<div class="col-sm-3 col-md-3 pull-right">
							<form class="search" >
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
										<div class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
										</div>
										
								</div>
										<div class="input-group-btn">
												<a href="javascript" class="btn btn-default btn-md" type="button" style="background-color:#8079C9;color:white;
												margin-top:10px; margin-left:120px;" id="srch-term">Mentors advice</a>
										</div>
								
					</div>--->


					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1" style="margin-left:20px" "margin-top:0px">
									<li><a href="<?=base_url();?>"><i class="fa-home"></i>Home</a></li>
									<li class="active"><a href="<?=base_url();?>/../index.php/Institutepg">Institute</a></li>
								</ol>
								
					</div>
	


<!-----------------------------body----------------
-------------------------------------------------------------->


	
	<div class="row">
		<div class="col-md-4">
					<?php if(!empty($notify)){?>
					<!-- Default panel -->
			<div class="panel panel-color panel-purple" style="margin-top:30px">
				<div class="panel-heading">
					RECENT NOTIFICATION
				</div>
						
			<div class="panel-body">
			
				<marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
							<?php foreach($notify as $notifyshow) {?>
							<i class="fa-star"style="color:#C979C2;margin-top:15px;margin-bottom:5px; font-size:15px"> <?=isset ($notifyshow->Description) ?$notifyshow->Description:''?></i></br>
							<a href="<?=isset ($notifyshow->Link_url) ?$notifyshow->Link_url:''?>"><?=isset ($notifyshow->Link_url) ?$notifyshow->Link_url:''?></a>
							<?php }?>
				</marquee>
			</div>
			</div>
					
		</div>
					<?php }?>		
		

	
<div class="col-md-8">
<?php if(!empty($intro)){?>	
	<div class="panel panel-color panel-purple" style="margin-top:30px">
				<div class="panel-heading">
					INTRODUCTION
				</div>
				<div class="panel-body">
						<?php 
					
							foreach($intro as $introshow) {?>
							<p style="color:grey"><?=isset ($introshow->Description) ?$introshow->Description:''?></p>
							<?php }?>
					
				
				</div>
	</div>	
<?php }?>
	
		<?php if(!empty($option)){?>
	<div class="panel panel-color panel-purple" style="margin-top:30px">
				<div class="panel-heading">
						INSTITUTE OPTION
				</div>		
		<div class="panel-body">
		<h4>Alphabetical institute List</h4>
		
				<!--<div class "row" id="exam">
							
					
							
						<Table><tr><td>A</td>
								<td>B</td>
								<td>C</td>
								<td>D</td>
								<td>E</td>
								<td>F</td>
								<td>G</td>
								<td>H</td>
								<td>I</td>
								<td>J</td>
								<td>K</td>
								<td>L</td>
								<td>M</td>
								<td>N</td>
								<td>O</td>
								<td>P</td>
								<td>Q</td>
								<td>R</td>
								<td>S</td>
								<td>T</td>
								<td>U</td>
								<td>V</td>
								<td>W</td>
								<td>X</td>
								<td>Y</td>
								<td>Z</td>
								</tr>
							
						</table>
				</div>--->
							
			
					
			<div class="row" id="exam">	
			
				<div class="col-sm-4" name="A" id="Alphabet" >
					<p style="color:black">A</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="A"){ ?>
							
							
					<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></li></a>
								
							
					<?php }}?>	
									
				</div>	
				
				<div class="col-sm-4" name="B" id="Alphabet" >
					<p style="color:black">B</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="B"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></li></a>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="C"id="Alphabet" >
					<p style="color:black">C</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="C"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				
				<div class="col-sm-4" name="D" id="Alphabet">
					<p style="color:black">D</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="D"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="E" id="Alphabet">
					<p style="color:black">E</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="E"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="F"id="Alphabet" >
					<p style="color:black">F</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="F"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="G"id="Alphabet" >
					<p style="color:black">G</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="G"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="H"id="Alphabet" >
					<p style="color:black">H</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="H"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="I" id="Alphabet">
					<p style="color:black">I</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="I"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="J" id="Alphabet">
					<p style="color:black">J</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="J"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="K" id="Alphabet">
					<p style="color:black">K</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="K"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="L" id="Alphabet">
					<p style="color:black">L</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="L"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="M" id="Alphabet">
					<p style="color:black">M</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="M"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="N" id="Alphabet">
					<p style="color:black">N</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="N"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="O" id="Alphabet">
					<p style="color:black">O</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="O"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="P" id="Alphabet">
					<p style="color:black">P</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="P"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="Q" id="Alphabet">
					<p style="color:black">Q</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="Q"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
								
				</div>
				
				<div class="col-sm-4" name="R" id="Alphabet">
					<p style="color:black">R</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="R"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="S" id="Alphabet">
					<p style="color:black">S</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="S"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="T" id="Alphabet">
					<p style="color:black">T</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="T"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
								
				</div>
				
				<div class="col-sm-4" name="U" id="Alphabet">
					<p style="color:black">U</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="U"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Career_id) ?$optionshow->Career_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="V" id="Alphabet">
					<p style="color:black">V</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="V"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
								
				</div>
				
				<div class="col-sm-4" name="W"id="Alphabet" >
					<p style="color:black">W</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="W"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="X"id="Alphabet" >
					<p style="color:black">X</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="X"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
								
				</div>
				
				<div class="col-sm-4" name="Y" id="Alphabet">
					<p style="color:black">Y</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="Y"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
									
				</div>
				
				<div class="col-sm-4" name="Z" id="Alphabet">
					<p style="color:black">Z</p>
						
					<?php foreach($option as $optionshow) { if($optionshow->Alphabet_id=="Z"){ ?>
							
							
							<li><a href="<?=base_url();?>index.php/Institutepg/Index/<?=isset ($optionshow->Institute_id) ?$optionshow->Institute_id:''?>"><?=isset ($optionshow->Institute_name) ?$optionshow->Institute_name:''?></a></li>
								
							
					<?php }}?>	
								
				</div>
		
			</div>
		</div>
	</div>
	<?php }?>
</div> 

</div>
</div>

	
	
			
<div class="container">
	<div class="row">
						
				<?php if(!empty($detail1)){?>
		<div class="col-md-12">				
			<div class="panel panel-color panel-purple">
				<div class="panel-heading">
					<?php foreach ($detail1 as $detail1show){?>
						
						<H3><?=isset ($detail1show->Institute_name) ?$detail1show->Institute_name:''?></H3>
						<?php }?>
				</div>	
				
				<div class="panel-body">
					
						<?php foreach ($detail1 as $detail1show){?>
						
						<p style="color:grey"><img src="<?=base_url();?>/uploaded_images/<?=isset ($detail1show->Image) ?$detail1show->Image:''?>"height="350px" width="1095px"></p>
				
						<h4 style="color:#8079C9;margin-top:15px">Description</h4>
						<p style="color:grey"><?=isset ($detail1show->Description) ?$detail1show->Description:''?>
						 </p>
				
						<h4 style="color:#8079C9;margin-top:15px">Group</h4>
						<p style="color:grey"><?=isset ($detail1show->Group1) ?$detail1show->Group1:''?></p>
				
						<h4 style="color:#8079C9;margin-top:15px">Official link</h4>
						<p style="color:grey"><?=isset ($detail1show->Official_link) ?$detail1show->Official_link:''?></p>
				
						
						<h4 style="color:#8079C9;margin-top:15px">Address</h4>
						<p style="color:grey"><?=isset ($detail1show->Address) ?$detail1show->Address:''?></p>
						
						<h4 style="color:#8079C9;margin-top:15px">Contact no</h4>
						<p style="color:grey"><?=isset ($detail1show->Contact_no) ?$detail1show->Contact_no:''?></p>
						
				<?php }?>
						
					
				</div>
			</div>	
		
			
		</div>
<?php }?>		
		</div>		
</div>