<?php 
$sql='select * from gopy where xoa=0';//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$n = $objStatament->rowCount();
// echo "Co $n ket qua";
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);
// $data = $objStatament->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';print_r($data);
?>
<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
    
    <h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
    
    <!-- Logo (221px wide) -->
    <a href="#"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>
    
    <!-- Sidebar Profile links -->
    <div id="profile-links">
        Hello, <a href="#" title="Edit your profile"><?php if(isset($_SESSION['admin'])){foreach($_SESSION['admin'] as $a){echo $a->username;}} ?>
    
                </a>, you have <a href="#messages" rel="modal" title="3 Messages"><?php echo $n ?> Messages</a><br />
        <br />
        <a href="http://localhost/20211029/" title="View the Site">View the Site</a> | <a href="logout.php" title="Sign Out">Sign Out</a>
    </div>        
    
    <ul id="main-nav">  <!-- Accordion Menu -->
        
        <li> 
            <a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
            Thú cưng
            </a>
            <ul>
                <li><a class="current" href="index.php">View</a></li> <!-- Add class "current" to sub menu items also -->
                
            </ul>
        </li>
        
        <li> 
            <a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
            Bé ngoan trong tuần
            </a>
            <ul>
                <li><a class="current" href="bengoantrongtuan.php">View</a></li> <!-- Add class "current" to sub menu items also -->
                
            </ul>
        </li>
        
        <li> 
            <a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
            Sản phẩm
            </a>
            <ul>
                <li><a class="current" href="sanpham.php">View</a></li> <!-- Add class "current" to sub menu items also -->
                
            </ul>
        </li>
        
        <li> 
            <a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
            Sản phẩm nổi bật
            </a>
            <ul>
                <li><a class="current" href="sanphamnoibat.php">View</a></li> <!-- Add class "current" to sub menu items also -->
                
            </ul>
        </li>
        
        <li> 
            <a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
            Đơn hàng
            </a>
            <ul>
                <li><a class="current" href="donhang.php">View</a></li> <!-- Add class "current" to sub menu items also -->
                
            </ul>
        </li>

        <li> 
            <a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
            Thương hiệu
            </a>
            <ul>
                <li><a class="current" href="thuonghieu.php">View</a></li> <!-- Add class "current" to sub menu items also -->
                
            </ul>
        </li> 
        <li> 
            <a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
            Loại thú cưng
            </a>
            <ul>
                <li><a class="current" href="loaipet.php">View</a></li> <!-- Add class "current" to sub menu items also -->
                
            </ul>
        </li>
        <li> 
            <a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
            Loại sản phẩm
            </a>
            <ul>
                <li><a class="current" href="loaisp.php">View</a></li> <!-- Add class "current" to sub menu items also -->
                
            </ul>
        </li>
        <li> 
            <a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
            Tạo tài khoản admin
            </a>
            <ul>
                <li><a class="current" href="taotaikhoan.php">View</a></li> <!-- Add class "current" to sub menu items also -->
                
            </ul>
        </li>      
        <li> 
            <a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
            Danh sách khôi phục
            </a>
            <ul>
                <li><a  href="danhsachkhoiphuc.php">Danh sách xóa bengoantrongtuan</a></li> <!-- Add class "current" to sub menu items also -->
                <li><a  href="delthucung.php">Danh sách xóa thú cưng</a></li>
                <li><a  href="delsanpham.php">Danh sách xóa sản phẩm</a></li>
                <li><a href="delloaipet.php">Danh sách xóa loại thú cưng</a></li>
                <li><a href="deltaikhoan.php">Danh sách xóa tài khoản</a></li>
            </ul>
        </li> 
    </ul> <!-- End #main-nav -->
    
    <div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
        
        <h3>Có <?php echo $n ?> phản hồi</h3>
        <?php 
                foreach($data as $gy)
                {
                    ?>
                    <p>
                        <strong><?php echo $gy->tieude ?></strong> by <?php echo $gy->hoten ?> |<strong> Email:</strong> <?php echo $gy->email ?><br />
                        <?php echo $gy->noidung ?>
                        <small><a href="delete_gopy.php?magopy=<?php echo $gy->magopy ?>" class="remove-link" title="Remove message">Remove</a></small>
                    </p>
                    <?php
                }
            ?>
        <form action="index.php?ac=dosendmail" method="post">
            
            <h4>New Message</h4>
            
            <fieldset>
                <textarea class="textarea" name="message" id="message" cols="79" rows="5"></textarea>
            
                <select name="email" id="email" class="small-input">
                    <option value="option1">Send to...</option>
                    <?php 
                        foreach($data as $e)
                        {
                            ?>
                                <option value="<?php echo $e->email ?>"><?php echo $e->email ?></option>
                            <?php
                        }
                    ?>
                </select>
                
                <input class="button" type="submit" value="Send" />
                
            </fieldset>
            
        </form>
        <?php
        $ac = isset($_GET['ac'])?$_GET['ac']:'';
        if ($ac=="dosendmail")
        {
                include ROOT."/admin/resources/lib/PHPMailerAutoload.php";
                $mail = new PHPMailer();
                $mail->IsSMTP(); // set mailer to use SMTP
                $mail->Host = "smtp.gmail.com"; // specify main and backup server
                $mail->Port = 465; // set the port to use
                $mail->SMTPAuth = true; // turn on SMTP authentication
                $mail->SMTPSecure = 'ssl';
                $mail->Username = "kevilmitnick09@gmail.com"; //your SMTP username or your gmail username
                $mail->Password = "Famuron.74"; // your SMTP password or your gmail password
                $from = "kevilmitnick09@gmail.com"; // Reply to this email
                $to=$_REQUEST["email"]; // Email người nhận
                $name="Test Send mail"; // Tên người nhận
                $mail->From = $from;
                $mail->FromName = "Pet online"; // Tên người gửi 
                $mail->AddAddress($to,$name);
                $mail->AddReplyTo($from,"Phong cham soc dong gop nguoi ung ho");
                $mail->WordWrap = 50; // set word wrap
                $mail->IsHTML(true); // send as HTML
                $mail->Subject = "Tin xac nhan!";
                $mail->Body = "Noi dung .". $_REQUEST["message"] ."<hr> Chi tiet xem tai: <a href='". BASE_URL."'>".BASE_URL."</a>";
                //$mail->SMTPDebug = 2;
                if(!$mail->Send())
                {
                    echo "<h3>Err: " . $mail->ErrorInfo . '</h3>';
                }
                else
                {
                    echo "<h3>Send mail thành công</h3>";
                }

        }

        if($ac=="finish")
        {
        echo "Thong bao";	
        }
        ?>
    </div> <!-- End #messages -->
    
</div></div> <!-- End #sidebar -->