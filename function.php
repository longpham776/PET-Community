<?php
function showgiohang(){
    if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
        if(sizeof($_SESSION['giohang'])>0){
            $tong=0;
            for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][4];
                $tong+=$tt;
                echo '<tr>
                        <td>'.($i+1).'</td>
                        <td>'.$_SESSION['giohang'][$i][0].'</td>
                        <td>'.$_SESSION['giohang'][$i][1].'</td>
                        <td>'.$_SESSION['giohang'][$i][2].'</td>
                        <td><img src="admin/resources/images/'.$_SESSION['giohang'][$i][3].'" style="width:100px;height:100px;" alt=""></td>
                        <td>'.$_SESSION['giohang'][$i][4].'</td>
                        <td><div>'.$tt.'</div></td>
                        <td><a href="cart.php?delid='.$i.'">Xóa</a></td>
                    </tr>';
            }
            echo '<tr>
                    <th colspan="6">Tổng đơn hàng</th>
                    <th>
                        <div>'.$tong.'</div>
                    </th>

                </tr>';
        }else{
            echo "Giỏ hàng rỗng!";
        }    
    }
}