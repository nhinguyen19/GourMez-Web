
<?php
   session_start();
   ob_start();
   include "../model/connectdb.php";
   connectdb();
   include "../model/danhmuc.php";
   include("../admin/VIEW/Pages/header.php");
?>
<?php
 include("../ADMIN/VIEW/Pages/sidebar.php");
 ?>

 <?php 
   if(isset($_GET['act']))
   { 
    switch($_GET['act'])
    {

      case 'danhmuc':
        //Lấy danh sách danh mục 
        $kq=getall_category();
        include ('../admin/view/pages/danhmuc.php');
        break;    
      case 'delcategory':
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            delcategory($id);
        }
        $kq=getall_category();
        include ('../admin/view/pages/danhmuc.php');
        break;
        
        case 'updatecategory':
            //Lấy 1 record đúng với id truyền vào 
            if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $kqone=getonecategory($id);
            
            $kq=getall_category();
            include ('../admin/view/pages/updatedanhmuc.php');
        }
        if(isset($_POST['id']))
        {
            $id=$_POST['id'];
            $catename=$_POST['categoryname'];
            updatecategory($id,$catename);
            $kq=getall_category();
            include ('../admin/view/pages/danhmuc.php');
        }
           break;   
            case 'addcategory':
              if(isset($_POST['themmoi'])&&($_POST['themmoi']))
              {
                $catename=$_POST['namecategory'];
                addcategory($catename);
              }
              //Lấy danh sách danh mục 
              $kq=getall_category();
              include ('../admin/view/pages/danhmuc.php');
              break; 



  }
}
  else 
  {
    include ('../admin/view/pages/home.php');
  }
?>


<?php 
include ('../admin/view/pages/footer.php');
?>