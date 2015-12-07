<?php

class crud
{
 private $db;
 
 function __construct($DB_con)
 {
  $this->db = $DB_con;
 }
 
public function insert($user_id,$program_id)
{
	try{
		
		$stmt = $this->db->prepare("insert into selected (select m.id_user, n.id_program , m.user_name
									from user m
									join program n 
									where m.id_user=:id_user and n.id_program=:program_id)");
		$stmt->bindparam(":id_user",$user_id);
		$stmt->bindparam(":program_id",$program_id);
		$stmt->execute();
		return true;
	}
	catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
}

public function insert_to_logs($id){
	$stmt = $this->db->prepare("insert into table_logs (id,time_login)values(:id,now())");
	$stmt->bindparam(":id",$id);
	$stmt->execute();
}

public function delete($user_id,$program_id)
{
		$stmt = $this->db->prepare("DELETE FROM selected WHERE user_id=:user_id and program_id=:program_id");
		$stmt->bindparam(":user_id",$user_id);
		$stmt->bindparam(":program_id",$program_id);
		$stmt->execute();
		return true;
}


 public function update_number_watch($program_id){
	$stmt = $this->db->prepare("update program set number_watch=number_watch+1 where id_program=:id_program");
	$stmt->bindparam(":id_program",$program_id);
	$stmt->execute();
	return true;
 }
 
 /* paging */
 /* home */
 public function dataviewhome($query)
 {
  $stmt = $this->db->prepare($query);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                <tr>
                <td><?php print($row['name_chanel']); ?></td>
                <td><?php print($row['name_program']); ?></td>
				<td><?php print($row['date_show']); ?></td>
				<td><?php print($row['start_show']); ?></td>
				<td><?php print($row['genre']); ?></td>
				<td><?php print($row['rate_age']); ?></td>
				<td><?php print($row['number_watch']); ?></td>
				<td><?php print($row['description_program']); ?></td>
				</td>
                <td align="center">
                <a href="insert.php?id_program=<?php print($row['id_program']); ?>"><i class="glyphicon glyphicon-bell"></i></a>
                </td>
                <?php
   }
  }
  else
  {
   ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
  }
  
 }
 
 
  public function dataviewmyschedule($user_id)
 {
  $stmt = $this->db->prepare("SELECT m.id_program, n.name_chanel,m.name_program,o.date_show, o.start_show,m.genre,m.rate_age,m.number_watch,m.description_program
		from program m
		join chanel n
		on m.chanel_id=n.id_chanel
		join time_show o
		on o.id_time=m.id
        join selected a
        on a.program_id=m.id_program
        where a.user_id=:user_id");
	$stmt->bindparam(":user_id",$user_id);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                <tr>
                <td><?php print($row['name_chanel']); ?></td>
                <td><?php print($row['name_program']); ?></td>
				<td><?php print($row['date_show']); ?></td>
				<td><?php print($row['start_show']); ?></td>
				<td><?php print($row['genre']); ?></td>
				<td><?php print($row['rate_age']); ?></td>
				<td><?php print($row['number_watch']); ?></td>
				<td><?php print($row['description_program']); ?></td>
				</td>
                <td align="center">
                <a href="delete.php?programid=<?php print($row['id_program']); ?>"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
                <?php
   }
  }
  else
  {
   ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
  }
  
 }
 
 
 public function paging($query,$records_per_page)
 {
  $starting_position=0;
  if(isset($_GET["page_no"]))
  {
   $starting_position=($_GET["page_no"]-1)*$records_per_page;
  }
  $query2=$query." limit $starting_position,$records_per_page";
  return $query2;
 }
 
 public function paginglink($query,$records_per_page)
 {
  
  $self = $_SERVER['PHP_SELF'];
  
  $stmt = $this->db->prepare($query);
  $stmt->execute();
  
  $total_no_of_records = $stmt->rowCount();
  
  if($total_no_of_records > 0)
  {
   ?><ul class="pagination"><?php
   $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
   $current_page=1;
   if(isset($_GET["page_no"]))
   {
    $current_page=$_GET["page_no"];
   }
   if($current_page!=1)
   {
    $previous =$current_page-1;
    echo "<li><a href='".$self."?page_no=1'>First</a></li>";
    echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
   }
   for($i=1;$i<=$total_no_of_pages;$i++)
   {
    if($i==$current_page)
    {
     echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
    }
    else
    {
     echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
    }
   }
   if($current_page!=$total_no_of_pages)
   {
    $next=$current_page+1;
    echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
    echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
   }
   ?></ul><?php
  }
 }
 
 /* paging */
 
}