<?php
session_start();

// Create connection
$bdd = new PDO('mysql:host=localhost;dbname=paluma;charset=utf8','root','');

if(isset($_POST["add_to_cart"]))
    {
      if(isset($_SESSION["shopping_cart"]))
      {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
          $count = count($_SESSION["shopping_cart"]);
    //get all item detail
            $item_array = array(
                      'item_id'       =>   $_GET["id"],
                      'item_name'     =>   $_POST["hidden_name"],
                      'item_price'    =>   $_POST['hidden_price'],
                      'item_quantity' =>   $_POST["quantity"]

            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
          //product added then this block 
          echo '<script>alert("Produit Déjà Ajouté, Changer La Quantité !")</script>';
          echo '<script>window.location = "index.php"</script>';
        }
      }
      else
      {
        //cart is empty excute this block
         $item_array = array(
                      'item_id'       =>   $_GET["id"],
                      'item_name'     =>   $_POST["hidden_name"],
                      'item_price'    =>   $_POST['hidden_price'],
                      'item_quantity' =>   $_POST["quantity"]

            );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
    }
//Remove item in cart 
    if(isset($_GET["action"]))
    {
      if($_GET["action"] == "delete")
      {
        foreach($_SESSION["shopping_cart"] as $key=>$value)
            {
              if($value["item_id"] == $_GET["id"])
              {
                unset($_SESSION["shopping_cart"][$key]);
                echo '<script>alert("Produit Supprimer")</script>';
                echo '<script>window.location="index.php</script>';
              }
            }
      }
    }
// ajouter la réservation
?>
           <div style="text-align:center;"> 
                <h3>Liste Menu</h3><br />  
                <a href="../index.php">Retour accueil</a>
                  <?php
                  $stmt = $bdd->query("SELECT * FROM produit");
                  while ($row = $stmt->fetch()) {
                        ?>
            <div>  
                     <form method="post" action="index.php?action=add&id=<?php echo $row["id"];?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:10px; padding:16px;width: 200px;">
                          <?php
                          //image par défaut s'il n'y a pas d'img lié id
                          $defaut=$row['img'];
                          $img=$defaut;
                          print'<img src="'.$img.'"class="img-responsive" style="width: 85px;height: 100px;"/>';
                          ?>
                            <h5 class="text-info"><?php echo $row['nom'];?></h5>  
                            <h4 class="text-danger"><?php echo $row['prix'];?>€</h4>  
                            <input type="text" name="quantity" class="form-control" value="1"/>
                            <input type="hidden" name="hidden_name" value="<?php echo $row['nom'] ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row['prix'];?>">
                            <br>
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Ajouter dans le Panier" />  
                          </div>  
                     </form>  
                </div>  
                  <?php } ?>
                <div style="clear:both"></div>  
                <br/>
                <div id="panier" style="background-color:white">
                <h3>Votre <b style="color: red">Panier</b></h3>
                <a href="historique.php">Historique Commande</a>
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="30%" style="text-align:center;border:2px solid;">Produit</th>  
                               <th width="30%" style="text-align:center;border:2px solid;">Quantité</th>  
                               <th width="30%" style="text-align:center;border:2px solid;">Prix</th>  
                               <th width="30%" style="text-align:center;border:2px solid;">Total</th>  
                               <th width="30%" style="text-align:center;border:2px solid;">Action</th>  
                          </tr>  
                             <?php 
                           if(!empty($_SESSION["shopping_cart"]))
                           {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $key => $value)
                           {

                             ?>
                       
                          <tr> 
                               <td style="text-align:center"><?php echo $value['item_name'];?></td>  
                               <td style="text-align:center"><?php echo $value['item_quantity']; ?></td>  
                               <td style="text-align:center"><?php echo $value['item_price'];?>€</td>  
                               <td style="text-align:center"><?php echo $value["item_quantity"] * $value["item_price"];?>€</td>  
                               <td style="text-align:center"><a href="index.php?action=delete&id=<?php  echo $value['item_id'];?>"><span class="btn btn-danger">Supprimer</span></a></td>  
                            
                            <?php 
                            // mettre l'insert into après c'est bon normalement (pro,pri,q,total)
                            if(isset($_POST['submit']))
                            {
                              $id = $value['item_id'];
                              $prix = $value['item_price'];
                              $quantite=$value['item_quantity'];
                              $total=$_POST['total'];
                              $date = date("Y-m-d")." ".date("H:i:s");
                              $sql="INSERT INTO `commande`(`idProduit`,`quantite`, `prix`, `prixTotal`,`date`) VALUES ('$id','$quantite','$prix','$total','$date')";
                              if($bdd->query($sql) == TRUE)
                              {
                                echo '<script>alert("Commande Acceptée")</script>';
                              }
                              else{
                                echo '<script>alert("Erreur dans la Réservation")</script>';
                              }
                              
                            }
                            ?>
                            
                            <form method="POST">
                              <input type="hidden" name="produit" value="<?php echo $value['item_id'];?>">
                              <input type="hidden" name="quantite" value="<?php echo $value['item_quantity'];?>">
                              <input type="hidden" name="prix" value="<?php echo $value['item_price'];?>"><br>
                          </tr>  
                          <?php $total = $total + ($value["item_quantity"] * $value['item_price']);
                        }
                        ?>
                          <tr>
                               <td colspan="4" style="text-align:right;">Total: <?php echo $total?>€</td>
                               <td>
                              <input type="hidden" name="total" value="<?php echo $total?>">
                              <input type="submit" name="submit" style="margin-top:5px;" class="btn btn-success" value=" Valider Commande" OnClick="return confirm('Confirmez Commande ?');"/>
                          </form>
                          </td>  
                          </tr> 
                          <?php } ?>
                     </table>
                     </div>
                </div>  
           </div>