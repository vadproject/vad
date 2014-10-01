<?php

    require("session_start.php");

    if(isset($_GET['request_notupdated']))
    {
        echo '<script>alert("Incomplete Details! Try again.");</script>';
    }
    
    $request_id = $_GET['id'];
    $_SESSION['id'] = $request_id;
    
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <script type="text/javascript" src="js/dropdown.js"/></script>
    <script src="js/jquery-1.9.0.min.js"></script>
    
        <script type="text/javascript">
            $(document).ready(function(){
                $("select#select_family").change(function(){

                    var family_id =  $("select#select_family option:selected").attr('value'); 
                    //alert(family_id);    
                    $("#product select").html( "" );
                    $("#target select").html( "" );
                    $("#basecodelevel select").html( "" );
                    if (family_id.length > 0 ) { 
                        
                     $.ajax({
                            type: "POST",
                            url: "fetch_product.php",
                            data: "family_id="+family_id,
                            cache: false,
                            success: function(html) {    
                                $("#product").html( html );
                            }
                        });
                    } 
                });

                $("select#select_product").change(function(){

                    var product_id = $("select#select_product option:selected").attr('value');
                    //alert(product_id);
                    $("#target select").html( "" );
                    $("#basecodelevel select").html( "" );
                    
                    if (product_id.length > 0 ) { 
                     $.ajax({
                            type: "POST",
                            url: "fetch_target.php",
                            data: "product_id="+product_id,
                            cache: false,
                            success: function(html) {    
                                $("#target").html( html );
                            }
                        });
                    } else {
                        $("#target").html( "" );
                    }
                });

                $("select#select_target").change(function(){

                    var target_id = $("select#select_target option:selected").attr('value');
                    //alert(target_id);
                    $("#basecodelevel select").html( "" );
                    
                    if (target_id.length > 0 ) { 
                     $.ajax({
                            type: "POST",
                            url: "fetch_basecodelevel.php",
                            data: "target_id="+target_id,
                            cache: false,
                            success: function(html) {    
                                $("#basecodelevel").html( html );
                            }
                        });
                    } else {
                        $("#basecodelevel").html( "" );
                    }
                });
            });
        </script>

</head>

<body>    
        <?php require("databaseconnect_addrequest.php"); ?>
        <div id="requesttool">
        <center><h3>Edit Request Form</h3></center>
        
        
                <form action="updaterequest.php" method="POST" name="details">
                <table border="0" width="100%" class="table">                 
                    <tr>
                        <?php

                        $sql = "SELECT * FROM printer_family ORDER BY family";
                        $requestinfo_sql = "SELECT * FROM request WHERE ID =".$request_id;
                        $vendor_sql = "SELECT * FROM target_vendor ORDER BY vendor";


                        $query_family = mysqli_query($con, $sql);
                        $query_vendordetails = mysqli_query($con, $vendor_sql);
                        $query_requestinfo =  mysqli_query($con, $requestinfo_sql);
                        
                         while ($queryinfo = mysqli_fetch_array($query_requestinfo, MYSQLI_ASSOC )){
                        ?>    
                             <td>Family :</td>
                        <td>
                            
                            <select required name="family" id="select_family">                  
                            <?php 
                                while ($rs = mysqli_fetch_array($query_family, MYSQLI_ASSOC )){
                                    if($rs['family']==$queryinfo['Family']){
                                    $family_id = $rs['id'];
                             ?>
                            <option selected value="<?php echo $rs['id'];?>"><?php echo $rs['family'];?></option>

                            <?php
                                    }
                                    else{
                            ?>
                            <option value="<?php echo $rs['id'];?>"><?php echo $rs['family']; ?></option>   
                            <?php
                                    }
                                } 
                            ?>
                            </select>                                                 
                        </td>
                    </tr>

                    <tr>
                        <td>Product: </td>
                        <td id="product">
                            <select name="product" id="select_product">
                            <?php
                                $product_sql = "SELECT * FROM productlist WHERE product_id = ".$family_id." ORDER BY product";
                                $product_query = mysqli_query($con, $product_sql);

                                while ($queryproduct = mysqli_fetch_array($product_query, MYSQLI_ASSOC)){ 
                                    if($queryproduct['product']==$queryinfo['ProductName']){
                                    $product_id = $queryproduct['id'];
                            ?>
                                <option selected value="<?php echo $queryproduct['id'];?>"><?php echo $queryproduct['product']; ?></option>
                            <?php
                                    }
                                    else{
                            ?>
                                <option value="<?php echo $queryproduct['id'];?>"><?php echo $queryproduct['product']; ?></option>
                            <?php
                                    }
                                }
                            ?>
                            </select>
                        </td>    
                    </tr>

                    <tr>
                    <td>Target: </td>
                        <td id="target">
                            <select name="target" id="select_target">
                            <?php
                                $sql_target = "SELECT * FROM targetlist WHERE target_id = ".$product_id." ORDER BY target";
                                $target_query = mysqli_query($con, $sql_target);

                                while ($querytarget = mysqli_fetch_array($target_query, MYSQLI_ASSOC)){ 
                                    if($querytarget['target']==$queryinfo['PanelSize']){
                                    $target_id = $querytarget['id'];
                            ?>
                                <option selected value="<?php echo $querytarget['id'];?>"><?php echo $querytarget['target']; ?></option>
                            <?php
                                    }
                                    else{
                            ?>
                                <option value="<?php echo $querytarget['id'];?>"><?php echo $querytarget['target']; ?></option>
                            <?php
                                    }
                                }
                            ?>
                            </select>
                        </td>             
                    </tr>                                     

                    <tr>
                    <td>Base Code Level: </td>
                    <td id="basecodelevel">
                        <select name="basecodelevel" id="select_basecodelevel">
                            <?php
                                $sql_release = "SELECT * FROM releaselist WHERE release_id = ".$target_id;
                                $release_query = mysqli_query($con, $sql_release);

                                while ($queryrelease = mysqli_fetch_array($release_query, MYSQLI_ASSOC)){ 
                                    if($queryrelease['release']==$queryinfo['BaseCodelevel']){
                                    
                            ?>
                                <option selected value="<?php echo $queryrelease['id'];?>"><?php echo $queryrelease['release']; ?></option>
                            <?php
                                    }
                                    else{
                            ?>
                                <option value="<?php echo $queryrelease['id'];?>"><?php echo $queryrelease['release']; ?></option>
                            <?php
                                    }
                                }
                            ?>     
                        </select>
                    </td>
                             
                    </tr>

                    <tr>

                            <td>Target Vendor :</td>
                        <td>
                            <select required name="target_vendor"></div>  
                            <?php 
                            while ($query_vendor = mysqli_fetch_array($query_vendordetails, MYSQLI_ASSOC )){
                                if( $query_vendor['vendor'] == $queryinfo['TargetVendor']){
                            ?>      
                                <option selected value="<?php echo $query_vendor['vendor']; ?>" ><?php echo $query_vendor['vendor']; ?></option>
                            <?php
                                }
                                else{
                            ?>
                                <option value="<?php echo $query_vendor['vendor']; ?>" ><?php echo $query_vendor['vendor']; ?></option>
                            <?php
                                }
                            }
                            ?>
                            </select>
                        </td>
                     </tr>

                     <tr>
                            <td>PE/SPR# :</td>
                        <td>
                             <input value="<?php echo $queryinfo['PE_SPR']; ?>" required type="number" name ="pe_spr_number"  maxlength="15" size="15" placeholder="PE/SPR#" style="width: 170px;">
                        </td>
                     </tr>
                    
                     <tr>
                            <td>Comments/Notes :</td>
                        <td>
                             <br><textarea name="comments" maxlength="150" rows="5" cols="45" placeholder="Comments/Notes here.." style="resize:none;"><?php echo $queryinfo['Comments']; ?></textarea>
                        </td>
                     </tr>

                    <?php 
                        }
                    ?>

                     <tr>
                        <td colspan="2">
                            <center>
                                 <input type="submit" value="Create Request" name="submit" style="margin-top:15px;cursor:pointer;">
                                 <input type="button" value="Back to original" name="reset" onclick="location.reload(true);" style="cursor:pointer;">
                            </center>
                        </td>
                     </tr>  
                </table>
                </form>


</body>
</html>

