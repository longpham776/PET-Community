<?php 
$sql='select * from bengoantrongtuan where xoa=1';//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$n = $objStatament->rowCount();
// echo "Co $n ket qua";
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);
// $data = $objStatament->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';print_r($data);
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
                    <th>Mã Pet</th>
                    <th>Tên Pet</th>
                    <th>Giới Tính</th>
                    <th>Tuổi</th>
                    <th>Ảnh</th>
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
                foreach($data as $pet)
                {
                    ?>
                     <tr>
                    <td><input type="checkbox" name="check-box" /></td>
                    <td><h3><?php echo $pet->mapet ?><h3></td>
                    <td><h3><?php echo $pet->tenpet ?></h3></td>
                    <td><h3><?php echo $pet->gioitinh ?></h3></td>
                    <td><h3><?php echo $pet->tuoi ?></h3></td>
                    <td><img src='./resources/images/<?php echo $pet->hinh ?>' style="width:100px;height:100px;"> </td>
                    <td>
                        <!-- Icons -->
                            <a href="khoiphuc_petonweek.php?mapet=<?php echo $pet->mapet ?>" 
                            onclick="return confirm('Bạn muốn khôi phục thú cưng có tên là <?php echo $pet->tenpet ?> ?')"
                            title="Restore"><img src="resources/images/icons/hammer_screwdriver.png" alt="Restore" /></a> 
                            <a href="delete_rpetonweek.php?mapet=<?php echo $pet->mapet ?>" 
                            onclick="return confirm('Bạn muốn xóa thú cưng có tên là <?php echo $pet->tenpet ?> ?')"
                            title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
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
