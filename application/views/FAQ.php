<!--------------------------------------------Jumbotron-----------------------------------
------------------------------------------------------->


   <div class="container">
  <div class="jumbotron"> 
	
     <h1>FAQ</h1>
  </div>
  

<div class="panel panel-color panel-purple" style="margin-top:30px">
				<div class="panel-heading">
				<h2>Frequently asked Question</h2>
				</div>
						

<div class="panel-body">
<?php if(!empty($info)){?>

<?php foreach($info as $info){?>
<div class="col-lg-6 col-md-6 col-sm-6">
<ul style="margin-left:80px;margin-top:20px">
<li><h3><a href="<?=base_url();?>index.php/FAQpg/index/<?=isset ($info->Type_id) ?$info->Type_id:''?>"><?=isset ($info->Type) ?$info->Type:''?></a></h3></li>

</ul>
</div>
<?php }?>

<?php }?>
</div>


<div class="panel-body">
				
<?php if(!empty($info1)){?>

<?php foreach($info1 as $info1show) {?>

<div class="col-lg-6 col-md-6 col-sm-6">
<h4>Question- <?=isset ($info1show->Ques) ?$info1show->Ques:''?></h4>
<p>Answer- <?=isset ($info1show->Ans) ?$info1show->Ans:''?></p>
</div>
<?php }?>
<?php }?>
</div>
</div>
</div>