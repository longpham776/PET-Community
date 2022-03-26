<?php 
$sql='select * from donhang';//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$n = $objStatament->rowCount();
// echo "Co $n ket qua";
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);


?>
<div class="content-box-header">
    
    <h3>Co <?php echo $n ?> ket qua</h3>
    
    <ul class="content-box-tabs">
        <li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
    </ul>
    
    <div class="clear"></div>
    
</div> <!-- End .content-box-header -->

<div class="content-box-content">
    
    <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
        
        <div class="notification attention png_bg">
            <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>
                This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
            </div>
        </div>
        
        <table>
            
            <thead>
                <tr>
                    <th><input class="check-all" type="checkbox" /></th>
                    <th>Mã Đơn</th>
                    <th>Họ Tên</th>
                    <th>Địa Chỉ</th>
                    <th>Điện Thoại</th>
                    <th>Email</th>
                    <th>Thanh Toán</th>
                    <th>Trạng Thái</th>
                    <th>Chức năng</th>
                </tr>
                
            </thead>
            
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="bulk-actions align-left">
                            <select name="dropdown">
                                <option value="option1">Choose an action...</option>
                                <option value="option2">Edit</option>
                                <option value="option3">Delete</option>
                            </select>
                            <a class="button" href="#">Apply to selected</a>
                        </div>
                        
                        <div class="pagination">
                            <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
                            <a href="#" class="number  current" title="1">1</a>
                            <a href="#" class="number" title="2">2</a>
                            <a href="#" class="number" title="3">3</a>
                            <a href="#" class="number" title="4">4</a>
                            <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
                        </div> <!-- End .pagination -->
                        <div class="clear"></div>
                    </td>
                </tr>
            </tfoot>
            
            <tbody>
                <?php 
                foreach($data as $dh)
                {
                    ?>
                     <tr>
                    <td><input type="checkbox" name="check-box" /></td>
                    <td><h3><?php echo $dh->madon ?><h3></td>
                    <td><h3><?php echo $dh->hoten ?></h3></td>
                    <td><h3><?php echo $dh->diachi ?></h3></td>
                    <td><h3><?php echo $dh->dienthoai ?></h3></td>
                    <td><h3><?php echo $dh->email ?></h3></td>
                    <td><h3><?php if($dh->pttt == 0){echo "Trực tiếp";} else{echo "Online";} ?></h3></td>
                    <td>
                        <form method="post" action="update_donhang.php">
                            <input type="hidden" name="madon" value="<?php echo $dh->madon ?>">
                            <input type="hidden" name="trangthai" value="<?php echo $dh->trangthai ?>">
                            <?php if($dh->trangthai == 0)
                            {
                                ?>
                                <input type="submit" style="background-color: #FF0000;font-size: 20px;" onclick="return confirm('Bạn có chắc muốn đổi không?')" name="sm" 
                                value="<?php echo "Chờ xác nhận";?>"
                                <?php
                            }
                            else if($dh->trangthai == 1)
                            {
                                ?>
                                <input type="submit" style="background-color: #FFA500;font-size: 20px;" onclick="return confirm('Bạn có chắc muốn đổi không?')" name="sm" 
                                value="<?php echo "Chờ lấy hàng";?>"
                                <?php
                            }
                            else if($dh->trangthai == 2)
                            {
                                ?>
                                <input type="submit" style="background-color: #FFA500;font-size: 20px;" onclick="return confirm('Bạn có chắc muốn đổi không?')" name="sm" 
                                value="<?php echo "Đang giao";?>"
                                <?php
                            }
                            else if($dh->trangthai == 3)
                            {
                                ?>
                                <input type="submit" style="background-color: #4CAF50;font-size: 20px;" onclick="return confirm('Bạn có chắc muốn đổi không?')" name="sm" 
                                value="<?php echo "Đã giao";?>"
                                <?php
                            }
                            else if($dh->trangthai == 4)
                            {
                                ?>
                                <input type="submit" style="background-color: #FF0000;font-size: 20px;"  name="sm" value="<?php echo "Đã hủy";?>"
                                <?php
                            }
                            ?>">
                        </form>
                        
                    </td>
                    <td>
                        <!-- Icons -->
                            <!-- <a href="edit_1.php?mapet=" 
                            onclick="return confirm('Bạn muốn sửa thú cưng có tên là  ?')"
                            title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a> -->
                            <a href="huydonhang.php?madon=<?php echo $dh->madon ?>&tt=<?php echo $dh->trangthai ?>" 
                            onclick="return confirm('Bạn muốn hủy đơn hàng có mã là <?php echo $dh->madon ?> ?')"
                            title="Hủy đơn"><img src="resources/images/icons/cross.png" alt="Hủy đơn" /></a> 
                            <a href="thongtindonhang.php?madon=<?php echo $dh->madon ?>" 
                            title="Thông tin đơn hàng"><img src="resources/images/icons/information.png" alt="Thông tin đơn hàng" /></a> 
                    </td>
                </tr>
                    <?php
                }
                ?>
               
                

            </tbody>
            
        </table>
        
    </div> <!-- End #tab1 -->
    
    <div class="tab-content" id="tab2">
    
        <form action="#" method="post">
            
            <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                
                <p>
                    <label>Small form input</label>
                        <input class="text-input small-input" type="text" id="small-input" name="small-input" /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
                        <br /><small>A small description of the field</small>
                </p>
                
                <p>
                    <label>Medium form input</label>
                    <input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" /> <span class="input-notification error png_bg">Error message</span>
                </p>
                
                <p>
                    <label>Large form input</label>
                    <input class="text-input large-input" type="text" id="large-input" name="large-input" />
                </p>
                
                <p>
                    <label>Checkboxes</label>
                    <input type="checkbox" name="checkbox1" /> This is a checkbox <input type="checkbox" name="checkbox2" /> And this is another checkbox
                </p>
                
                <p>
                    <label>Radio buttons</label>
                    <input type="radio" name="radio1" /> This is a radio button<br />
                    <input type="radio" name="radio2" /> This is another radio button
                </p>
                
                <p>
                    <label>This is a drop down list</label>              
                    <select name="dropdown" class="small-input">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                        <option value="option4">Option 4</option>
                    </select> 
                </p>
                
                <p>
                    <label>Textarea with WYSIWYG</label>
                    <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
                </p>
                
                <p>
                    <input class="button" type="submit" value="Submit" />
                </p>
                
            </fieldset>
            
            <div class="clear"></div><!-- End .clear -->
            
        </form>
        
    </div> <!-- End #tab2 -->        
    
</div> <!-- End .content-box-content -->
