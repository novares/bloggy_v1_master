<?php require_once("header.inc.php");
    include("../classes/Contact.php");
 ?>

<div class="ts-main-content">
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h2 class="page-title">Contact</h2>

					<table class="display table table-striped table-bordered table-hover table-list" cellspacing="0" width="100%">
						<!-- Entete du tableau, à ne PAS modifier -->
						<thead>
							<tr>
								<th width="10px">#</th>
								<th>E-mail</th>
								<th>Sujet</th>
								<th>Date</th>
								<th width="100px"></th>
							</tr>
						</thead>
						<!-- Début de la liste -->
					<?php 
                      $con = new Contact();	
                      $liste = $con->liste();
                      foreach($liste as $data )
                      {
                      	?>
						<tbody>
							<!-- ** Début de la boucle sur le résultat de la requête SQL ** -->
							<tr>
								<td><?php echo $data->_id; ?></td>
								<td><?php echo $data->_email; ?></td>
								<td><?php echo $data->_sujet; ?></td>
								<td><?php echo $data->_d_ajout; ?></td>
								<td>
									<a href="javascript:confirmDelete('contact_supp_action.php?id=<?php echo $data->_id; ?>')" class="btn btn-danger btn-xs">Suprimer</a>
								</td>
							</tr>
							<!-- ** Fin de la boucle ** -->

						</tbody>
						<!-- Fin de la liste -->
                     <?php  } ?>						
					</table>

				</div>

			</div>
		</div>
<script>
            function confirmDelete(delUrl) {
              if (confirm("Voulez vous vraiment supprimer cette cat ? ?")) {
               document.location = delUrl;
             }
           }
</script>
		<?php require_once("footer.inc.php"); ?>
