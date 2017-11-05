<?php
require_once __DIR__ . '/../../../awww_engine/UserData.class.php';
require_once __DIR__ . '/../../session.php';

$userdata = UserData::Instance();

$user   = Session::getUser();
$groups = $userdata->getUserGroups($user->getID());
?>
<link rel="stylesheet" type="text/css" href="css/overview.css" />

<h1>Najnowsze wpisy z grup</h1>

<section class="row posts">
<?php
  foreach ($groups as $group) { 
    $post   = $userdata->getNewestPost($group['group_id']);
    
    if(!$post) {
      continue;
    }
    
    $author = $userdata->getUserByID($post['op_id']);
  ?>
  <div class="col-12 post">
    <h5><a role="button" class="no-refresh" data-ref="group?id=<?php echo $group['group_id']; ?>" href="#!group?id=<?php echo $group['group_id']; ?>"><?php echo $group['group_name']; ?></a></h5>
    <div class="post-info">
      <span class="date"><?php echo $post['date']; ?></span>
      <span class="author"><?php echo $author->getName(); ?></span>
    </div>
    
    <div class="post-content">
      <?php echo $post['post_content']; ?>
    </div>
  
  </div>
    
  <?php } ?>
 
</section>