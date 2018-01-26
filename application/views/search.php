<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>ico/apple-touch-icon-57-precomposed.html">
<link rel="shortcut icon" href="<?php echo base_url();?>assets/ico/favicon.png">
<title>BidStates: Search Result</title>
<!-- include top header -->
<?php include 'includes_top.php';?>
<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>
</head>
<body>
<div id="wrapper"> 
  <!-- include header -->
  <?php include 'header.php';?>
 
  <div class="main-container">
    <div class="container">
      <hgroup class="mb20">
        <h1>Search Results</h1>
        <br>
        <h2 class="lead"><strong class="text-danger"><?php echo count($details); ?></strong> results were found for the search for <strong class="text-danger">(Ads type: <?php echo $this->input->get('ads') ?> & Address :<?php echo $this->input->get('address') ?> )</strong></h2>
      </hgroup>
      <br>
      
   
      <section class="col-xs-12 col-sm-6 col-md-12">
       <?php foreach($details as $detail) {?>
        <article class="search-result row">
          <div class="col-xs-12 col-sm-12 col-md-3"> <a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/abstract" alt="Lorem ipsum" /></a> </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <ul class="meta-search">
              <li><i class="glyphicon glyphicon-calendar"></i> <span><?php  echo $detail->city ?> , <?php  echo $detail->state ?></span></li>
           <?php if($detail->licensed==1){?>   <li><i class="glyphicon glyphicon-time"></i> <span>Licensed & Insured</span></li><?php } ?>
              <li><i class="glyphicon glyphicon-tags"></i> <span><?php echo $this->input->get('ads') ?></span></li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
            <h3><a href="<?php echo base_url();?><?php echo $this->input->get('ads') ?>/profile/<?php echo  $detail->username ?>" title=""><?php  echo $detail->company_name ?></a></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>
            <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span> </div>
          <span class="clearfix borda"></span> 
        </article>
        <?php } ?>
      </section>
    </div>
  </div>
  <!-- include footer-->
  <?php include 'footer.php';?>
</div>
<!-- include footer bottom-->
<?php include 'includes_bottom.php';?>
</body>
</html>
