<?php


    require("session_start.php");
    
    if(isset($_GET['created']))
    {
        echo '<script>alert("Request Created!");</script>';
    }

    else if(isset($_GET['request_notadded']))
    {
        echo '<script>alert("Incomplete Details! Try again.");</script>';
    }

    
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
            });
        </script>

</head>

<body>    
        <?php require("databaseconnect_addrequest.php"); ?>
        <div id="requesttool">
        <center><h3>Request Form</h3></center>
        
        
                <form action="saverequest.php" method="POST" name="details">
                <table border="0" width="100%" class="table">                 
                    <tr>
                        <?php
                            $sql = "SELECT * FROM printer_family ORDER BY family";
                            $vendor_sql = "SELECT * FROM target_vendor ORDER BY vendor";

                            $query_vendordetails = mysqli_query($con, $vendor_sql);
                            $query = mysqli_query($con, $sql);

                        ?>    

                             <td>Family :</td>
                        <td>
                            
                            <select required name="family" id="select_family" >
                            <option value="" default selected disabled="" style="color:#A9A9A9;">Select Family...</option>                  
                            <?php 
                                while ($rs = mysqli_fetch_array($query, MYSQLI_ASSOC )) { 
                            ?>
                            <option value="<?php echo $rs['id']; ?>"><?php echo $rs['family']; ?></option>

                            <?php
                                } 
                            ?>
                            </select>                                                 
                        </td>
                    </tr>

                    <tr>
                        <td>Product: </td>
                        <td id="product">
                            <select name="product" id="select_product">
                                
                            </select>
                        </td>    
                    </tr>

                    <tr>
                    <td>Target: </td>
                        <td id="target">
                            <select name="target" id="select_target">
                                
                            </select>
                        </td>             
                    </tr>                                     

                    <tr>
                    <td>Base Code Level: </td>
                    <td id="basecodelevel">
                        <select name="basecodelevel" id="select_basecodelevel">
                            
                        </select>
                    </td>
                             
                    </tr>

                    <tr>

                            <td>Target Vendor :</td>
                        <td>
                            <select required name="target_vendor"></div>        
                                <option value="" default selected disabled="">Target Vendor...</option>
                                <?php 
                                while ($query_vendor = mysqli_fetch_array($query_vendordetails, MYSQLI_ASSOC )) {
                                ?>
                                <option value="<?php echo $query_vendor['vendor']; ?>" ><?php echo $query_vendor['vendor']; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </td>
                     </tr>

                     <tr>
                            <td>PE/SPR# :</td>
                        <td>
                             <input required type="number" name ="pe_spr_number"  maxlength="15" size="15" placeholder="PE/SPR#" style="width: 170px;">
                        </td>
                     </tr>
                    
                     <tr>
                            <td>Comments/Notes :</td>
                        <td>
                             <br><textarea name="comments" maxlength="150" rows="5" cols="45" placeholder="Comments/Notes here.." style="resize:none;"></textarea>
                        </td>
                     </tr>

                     <tr>
                        <td colspan="2">
                            <center>
                                 <input type="submit" value="Create Request" name="submit" style="margin-top:15px;cursor:pointer;">
                                 <input type="button" value="Reset" name="reset" onclick="location.reload(true);" style="cursor:pointer;">
                            </center>
                        </td>
                     </tr>  
                </table>
                </form>


</body>
</html>

