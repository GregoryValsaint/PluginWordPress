<?php
define('WP_USE_THEMES', false); 
require_once( dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/wp-load.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administration</title> 
	<style>

	/* A mettre dans une feuille de style */
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: left;
}</style>
</head>
<body>
<div class="wrap">
  <h1>Bienvenue sur le panneau d'administration  d'EzDevis !</h1>
  <p>EzDevis est le plugin développé par la société BSWEB</p>
  <br/>
  <p>Il permet d'établir un devis sur mesure, en envoyant un mail contenant toutes les informations utiles pour le faire</p>
    <p> Voici votre shortcode à coller dans une de vos pages <input type="text" name="shortcode" value="[ez_devis_form_shortcode]" style="width: 15%"></p>
</div> 


<div class="wrap">


<form action="#" method="post">
<h2>Entrez les adresses email qui recevrons les demandes de devis</h2>
<p>
	
		    <input type="mail" name="email_Devis" />
    <input type="submit" value="Valider" />

	

</p>
</form>
</br>





</body>
</html>

<?php
 if (!empty($_POST)) {
        global $wpdb;
        $table = wp_ezdevis_admin;
        $data = array(
            'ez_admin_email' => $_POST['email_Devis'] ,
              'date_time' => current_time('mysql')
            
        );
        $format = array(
            '%s' ,
             '%s'
        );



  

        $success=$wpdb->insert( $table, $data, $format );
        if($success){
            echo 'Les données ont étés sauvées !' ; 
        }
    } else {

    	echo "Veuillez renseigner un email";
    }  


?> 


<html>
<head>
    <style>tr:nth-child(even) {background: #B8D1F3}
        tr:nth-child(odd) {background: #DAE5F4}
        th { background-color:#0A819C; color:black; text-align:center; height:30px; }
        table,th,td { border:1px solid green;}
        table { width:30%; color:black; text-align:center; }
    </style>
    </head>
    <body>
    <div style="margin-top:30px;width:75%">
        <form method="post" action="">
            <table class="widefat">
                <thead>
                    <th style="text-align: center; font-weight: bold;">ID</th>
                    <th style="text-align: center;font-weight: bold;">Email</th>
                    <th style="text-align: center;font-weight: bold;">Date</th>
                    <th style="text-align: center;font-weight: bold;">Action</th>
                </thead>
                <tbody>
                <?php
             
                global $wpdb;
                    $sql = "SELECT * from wp_ezdevis_admin ORDER BY ez_id ASC";
                    $results = $wpdb->get_results($sql);
                $i=1;
                foreach ($results as $result) {
                    ?>
                    <tr id="row<?php echo $result->ez_id;?>">
                        <td><?php echo $result->ez_id ?></td>
                       
                        <td><?php echo $result->ez_admin_email ?></td>
                        <td><?php echo $result->date_time ?></td>
                    
                        <td style="text-align: center; ">
                            <a href="#" id="delete_button<?php echo $result->ez_id;?>" onclick="delete_row('<?php echo $result->ez_id;?>');">Supprimer</a>
                        </td>
                    </tr>
                <?php
                    $i++;
                } ?>
                </tbody>
            </table>
        </form>
    </div>

<h1>Les nouveaux clients</h1>
<a href="<?php echo admin_url(); ?>admin-ajax.php?action=csv_pull">Exportez tout en Excel (.csv)</a>
</br>
  </html><a href= "<?php echo admin_url(); ?>admin.php?page=ezd-first-acp-page.php" id="delete_button_cli_all" onclick="delete_all_cli();">Supprimez tout</a>
</br>
</br>

</br>



  <form method="post" action="">
            <table class="widefat">
                <thead>
                    <th style="text-align: center; font-weight: bold;">ID</th>
                  <th style="text-align: center; font-weight: bold;">Email</th>
                  <th style="text-align: center; font-weight: bold;">Societé</th>
                  <th style="text-align: center; font-weight: bold;">Numéro</th>
                  <th style="text-align: center; font-weight: bold;">Nb sites</th>
                  <th style="text-align: center; font-weight: bold;">REF</th>
                    <th style="text-align: center;font-weight: bold;">O stock</th>
                    <th style="text-align: center;font-weight: bold;">O pub</th>
                    <th style="text-align: center;font-weight: bold;">O news</th>
                    <th style="text-align: center;font-weight: bold;">O trend</th>
                    <th style="text-align: center; font-weight: bold;">secteur</th>
                    <th style="text-align: center; font-weight: bold;">site Web</th>
                     <th style="text-align: center; font-weight: bold;">nom</th>
                    <th style="text-align: center; font-weight: bold;">prénom</th>
                   <th style="text-align: center; font-weight: bold;">poste</th>
                    <th style="text-align: center;font-weight: bold;">Date</th>
                    <th style="text-align: center;font-weight: bold;">Action</th>
                </thead>
                <tbody>
                <?php
             
                global $wpdb;
                    $sql = "SELECT * from wp_ezdevis_client ORDER BY cli_id ASC";
                    $results = $wpdb->get_results($sql);
                $i=1;
                foreach ($results as $result) {
                    ?>
                    <tr id="row<?php echo $result->cli_id;?>">
                        <td><?php echo $result->cli_id ?></td>
                        <td><?php echo $result->cli_email ?></td>
                         <td><?php echo $result->cli_e_name ?></td>
                          <td><?php echo $result->cli_numero_tel ?></td>
                        <td><?php echo $result->cli_nb_magasin ?></td>
                        <td><?php echo $result->cli_nb_url ?></td>
                        <td><?php echo $result->cli_opt_stock ?></td>
                        <td><?php echo $result->cli_opt_campub ?></td>
                        <td><?php echo $result->cli_opt_new ?></td>
                        <td><?php echo $result->cli_opt_trend ?></td>
                        <td><?php echo $result->cli_sect_act ?></td>
                        <td><?php echo $result->cli_site_web ?></td>
                        <td><?php echo $result->cli_nom ?></td>
                        <td><?php echo $result->cli_prenom ?></td>
                        <td><?php echo $result->cli_poste ?></td>
                        <td><?php echo $result->date_time ?></td>
                      
                        <td style="text-align: center; ">
                            <a href="#" id="delete_button_cli<?php echo $result->cli_id;?>" onclick="delete_row_cli('<?php echo $result->cli_id;?>');">Supprimer</a>
                        </td>
                    </tr>
                <?php
                    $i++;
                } ?>
                </tbody>
            </table>
        </form>
    </div>






    </body>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
  
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
<!-- Script permettant la suppression d'adresses email administrateurs AJAX/PHP -->
  <script type="text/javascript">
    var jq = jQuery.noConflict(true);
</script>
  <script type="text/javascript">
            function delete_row(id) {
            var lnk = "<?php ABSPATH . 'remove.php'; ?>";
            if(confirm("Vous êtes sur de vouloir supprimer l'adresse administrateur séléctionnée ?")){
                $.ajax
                ({
                    type:'post',
                    url:lnk,
                    data:{
                        delete_row:'delete_row',
                        row_id:id
                    },
                    success:function(data) {
                            $("#row" + id).remove();
                    }
                });
            }
        }
    </script>
<!-- Script permettant la suppression de fiches clients AJAX/PHP -->
    <script type="text/javascript">
            function delete_row_cli(id) {
            var lnk = "<?php ABSPATH . 'remove.php'; ?>";
            if(confirm("Vous êtes sur de vouloir supprimer la fiche client séléctionnée ?")){
                $.ajax
                ({
                    type:'post',
                    url:lnk,
                    data:{
                        delete_row_cli:'delete_row_cli',
                        row_id:id
                    },
                    success:function(data) {
                            $("#row" + id).remove();

                    }
                });
            }
        }
    </script>

<!-- Script permettant la suppression de TOUTES les fiches clients AJAX/PHP -->

    <script type="text/javascript">
            function delete_all_cli(id) {
            var lnk = "<?php ABSPATH . 'remove.php'; ?>";
            if(confirm("Vous êtes sur de vouloir supprimer TOUTES les fiches clients séléctionnée ? Vous ne pourrez pas revenir en arrière !")){
                $.ajax
                ({
                    type:'post',
                    url:lnk,
                    data:{
                        delete_all_cli:'delete_all_cli',
                        row_id:id
                    },
                    success:function(data) {
                            $("#row" + id).remove();

                    }
                });
            }
        }
    </script>





    <?php 


global $wpdb;
if(isset($_POST['delete_row']))
 {   
     $id = $_POST['row_id'];
    $result = $wpdb->delete('wp_ezdevis_admin', array( 'ez_id' => $id ), array('%d'));

     if($result){
    echo "success";
 
    exit();
     }
}



if(isset($_POST['delete_row_cli']))
 {   
     $id = $_POST['row_id'];
    $result = $wpdb->delete('wp_ezdevis_client', array( 'cli_id' => $id ), array('%d'));

     if($result){
    echo "success";
 
    exit();
     }
}



if(isset($_POST['delete_all_cli']))
 {   
global $wpdb;
$result = $wpdb->query("TRUNCATE TABLE `wp_ezdevis_client`");

     if($result){
    echo "success";
 
    exit();
     }
}
  













?>